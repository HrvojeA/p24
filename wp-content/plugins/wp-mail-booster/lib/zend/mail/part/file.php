<?php
/**
* Zend Framework
*
* LICENSE
*
* This source file is subject to the new BSD license that is bundled
* with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://framework.zend.com/license/new-bsd
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@zend.com so we can send you a copy immediately.
*
* @category Zend
* @package  mail_booster_Zend_Mail
* @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
* @license http://framework.zend.com/license/new-bsd	  New BSD License
* @version $Id$
*/

if(!defined("ABSPATH")) exit; // Exit if accessed directly
/**
* @see mail_booster_Zend_Mime_Decode
*/
if(file_exists(MAIL_BOOSTER_DIR_PATH.'lib/zend/mime/decode.php'))
require_once MAIL_BOOSTER_DIR_PATH.'lib/zend/mime/decode.php';

/**
* @see mail_booster_Zend_Mail_Part
*/
if(file_exists(MAIL_BOOSTER_DIR_PATH.'lib/zend/mail/part.php'))
require_once MAIL_BOOSTER_DIR_PATH.'lib/zend/mail/part.php';


/**
* @category Zend
* @package  mail_booster_Zend_Mail
* @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
* @license  http://framework.zend.com/license/new-bsd New BSD License
*/
class mail_booster_Zend_Mail_Part_File extends mail_booster_Zend_Mail_Part
{
	protected $_contentPos = array();
	protected $_partPos = array();
	protected $_fh;

	/**
	* Public constructor
	*
	* This handler supports the following params:
	* - file	  filename or open file handler with message content (required)
	* - startPos start position of message or part in file (default: current position)
	* - endPos	end position of message or part in file (default: end of file)
	*
	* @param array $params  full message with or without headers
	* @throws  mail_booster_Zend_Mail_Exception
	*/
	public function __construct(array $params)
	{
		if (empty($params['file']))
		{
			/**
			* @see mail_booster_Zend_Mail_Exception
			*/
			if(file_exists(MAIL_BOOSTER_DIR_PATH.'lib/zend/mail/exception.php'))
			require_once MAIL_BOOSTER_DIR_PATH.'lib/zend/mail/exception.php';

			throw new mail_booster_Zend_Mail_Exception('no file given in params');
		}

		if (!is_resource($params['file']))
		{
			$this->_fh = fopen($params['file'], 'r');
		}
		else
		{
			$this->_fh = $params['file'];
		}
		if (!$this->_fh)
		{
			/**
			* @see mail_booster_Zend_Mail_Exception
			*/
			if(file_exists(MAIL_BOOSTER_DIR_PATH.'lib/zend/mail/exception.php'))
			require_once MAIL_BOOSTER_DIR_PATH.'lib/zend/mail/exception.php';

			throw new mail_booster_Zend_Mail_Exception('could not open file');
		}
		if (isset($params['startPos']))
		{
			fseek($this->_fh, $params['startPos']);
		}
		$header = '';
		$endPos = isset($params['endPos']) ? $params['endPos'] : null;
		while (($endPos === null || ftell($this->_fh) < $endPos) && trim($line = fgets($this->_fh)))
		{
			$header .= $line;
		}

		mail_booster_Zend_Mime_Decode::splitMessage($header, $this->_headers, $null);

		$this->_contentPos[0] = ftell($this->_fh);
		if ($endPos !== null)
		{
			$this->_contentPos[1] = $endPos;
		}
		else
		{
			fseek($this->_fh, 0, SEEK_END);
			$this->_contentPos[1] = ftell($this->_fh);
		}
		if (!$this->isMultipart())
		{
			return;
		}

		$boundary = $this->getHeaderField('content-type', 'boundary');
		if (!$boundary)
		{
			/**
			* @see mail_booster_Zend_Mail_Exception
			*/
			if(file_exists(MAIL_BOOSTER_DIR_PATH.'lib/zend/mail/exception.php'))
			require_once MAIL_BOOSTER_DIR_PATH.'lib/zend/mail/exception.php';

			throw new mail_booster_Zend_Mail_Exception('no boundary found in content type to split message');
		}

		$part = array();
		$pos = $this->_contentPos[0];
		fseek($this->_fh, $pos);
		while (!feof($this->_fh) && ($endPos === null || $pos < $endPos))
		{
			$line = fgets($this->_fh);
			if ($line === false)
			{
				if (feof($this->_fh))
				{
					break;
				}
				/**
				* @see mail_booster_Zend_Mail_Exception
				*/
				if(file_exists(MAIL_BOOSTER_DIR_PATH.'lib/zend/mail/exception.php'))
				require_once MAIL_BOOSTER_DIR_PATH.'lib/zend/mail/exception.php';

				throw new mail_booster_Zend_Mail_Exception('error reading file');
			}

			$lastPos = $pos;
			$pos = ftell($this->_fh);
			$line = trim($line);

			if ($line == '--' . $boundary)
			{
				if ($part)
				{
					// not first part
					$part[1] = $lastPos;
					$this->_partPos[] = $part;
				}
				$part = array($pos);
			}
			else if ($line == '--' . $boundary . '--')
			{
				$part[1] = $lastPos;
				$this->_partPos[] = $part;
				break;
			}
		}
		$this->_countParts = count($this->_partPos);
	}

	/**
	* Body of part
	*
	* If part is multipart the raw content of this part with all sub parts is returned
	*
	* @return string body
	* @throws mail_booster_Zend_Mail_Exception
	*/
	public function getContent($stream = null)
	{
		fseek($this->_fh, $this->_contentPos[0]);
		if ($stream !== null)
		{
			return stream_copy_to_stream($this->_fh, $stream, $this->_contentPos[1] - $this->_contentPos[0]);
		}
		$length = $this->_contentPos[1] - $this->_contentPos[0];
		return $length < 1 ? '' : fread($this->_fh, $length);
	}

	/**
	* Return size of part
	*
	* Quite simple implemented currently (not decoding). Handle with care.
	*
	* @return int size
	*/
	public function getSize()
	{
		return $this->_contentPos[1] - $this->_contentPos[0];
	}

	/**
	* Get part of multipart message
	*
	* @param  int $num number of part starting with 1 for first part
	* @return mail_booster_Zend_Mail_Part wanted part
	* @throws mail_booster_Zend_Mail_Exception
	*/
	public function getPart($num)
	{
		--$num;
		if (!isset($this->_partPos[$num]))
		{
			/**
			* @see mail_booster_Zend_Mail_Exception
			*/
			if(file_exists(MAIL_BOOSTER_DIR_PATH.'lib/zend/mail/exception.php'))
			require_once MAIL_BOOSTER_DIR_PATH.'lib/zend/mail/exception.php';

			throw new mail_booster_Zend_Mail_Exception('part not found');
		}

		return new self(array('file' => $this->_fh, 'startPos' => $this->_partPos[$num][0],
							'endPos' => $this->_partPos[$num][1]));
	}
}
