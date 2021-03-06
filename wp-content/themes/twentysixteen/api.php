<?php
/*
* Template Name: API
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

//echo json_encode($_FILES );
global $wpdb;


if (isset($_POST['name_surname']) && isset($_POST['lid']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['language'])) {


    //sanitize the hell out of the inputs

    $name_surname = strip_tags(trim($_POST['name_surname']));
    $address = strip_tags(trim($_POST['address']));
    $city_id = intval(strip_tags(trim($_POST['city'])));  // city_id -> city!!!!!!!!!!!!!!!!!!!
    $email = strip_tags(trim($_POST['email']));
    $phone = strip_tags(trim($_POST['phone']));
    $languages = ($_POST['language']); //needs sanitation
    $lid = intval(strip_tags(trim($_POST['lid'])));
    $customer_id = 0;
    //first we should check if the customer with same data already exists
    $query = "SELECT * FROM t24_customer WHERE fullname = '" . $name_surname . "' AND city_id = " . $city_id . " AND email_address = '" . $email . "'";

    $results = $wpdb->get_results($query);

    //if next count is true then we have a new customer and we need to add it to the t24_customer


    if (count($results) > 0) {

        $query = "UPDATE t24_tickets SET customer_id = " . $results[0]->id . " WHERE id_ticket = " . $lid;

        $wpdb->query($wpdb->prepare($query, NULL));


    } else {
        $query = "INSERT INTO t24_customer (id, fullname, city_id, address, zipcode, phone, email_address, type) VALUES (NULL, '" . $name_surname . "'," . $city_id . ", '" . $address . "', 't24_city!!', '" . $phone . "', '" . $email . "', 1 )";
        $wpdb->query($wpdb->prepare($query, NULL));
        $customer_id = $wpdb->insert_id;
        $query = "UPDATE t24_tickets SET customer_id = " . $customer_id . " WHERE id_ticket = " . $lid;
        $wpdb->query($wpdb->prepare($query));
    }

    $sql_input = '';
    //enter languages
    foreach ($languages as $language) {
        $sql_input .= '(NULL,' . $lid . ', ' . $language . '),';
    }

    $sql_input = rtrim($sql_input, ',');

    //this table is a referenital table that shows us all ticket langugaes
    $query = "INSERT INTO t24_ticket_language (ticket_language_id, ticket_id, language_id) VALUES" . $sql_input;
    $wpdb->query($query);
    $query = "SELECT * FROM t24_docs_tickets WHERE id_ticket =  " . $lid;

    $ticketDocs = $wpdb->get_results($query);
    $queryValues = '';

    foreach ($ticketDocs as $ticketDoc) {


        foreach ($languages as $language) {
            $queryValues .= "(NULL," . $ticketDoc->id . "," . $language . ", 0, 0, NULL, NULL),";
        }


    }
    $queryValues = rtrim($queryValues, ',');

    $query = "INSERT INTO t24_docs_languages (id_doc_language, id_document, id_language, id_operator, status, dateCompleted, date_assigned) VALUES " . $queryValues;
    $wpdb->query($query);

    $args = array(
        'role' => 'administrator'
    );
    $users = get_users($args);



    wp_mail( $users[0]->user_email, 'Prevedi24 - novi ticket (#'.$lid.')', '<h1>Imate novi ticket</h1>',  'From: Prevedi24 Bot<system@prevedi24.ba> ' );



}


if (isset($_FILES) && !isset($_POST['name_surname'])) {


    $query = "INSERT INTO t24_tickets (id_ticket, dateTime, customer_id, original_language_id, status, amount, note, doc_url) VALUES (NULL, NOW(), NULL, NULL, '1', NULL, NULL, NULL)";

    $wpdb->query($wpdb->prepare($query, NULL));

    $last_inserted_ticket_id = $wpdb->insert_id;

    foreach ($_FILES as $file) {
        $file['name'] = str_replace(' ', '_', $file['name']);

        $upFile['name'] = $last_inserted_ticket_id . '_' . $file ['name'];
        $upFile['tmp_name'] = $file ['tmp_name'];
        $upFile['size'] = $file ['size'];
        $upFile['type'] = $file ['type'];
        $upFile['error'] = $file ['error'];

        if (!function_exists('wp_handle_upload')) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
        }

        $upload_overrides = array('test_form' => false);
        $movefile = wp_handle_upload($upFile, $upload_overrides);

        $response = new stdClass();

        if ($movefile && !isset($movefile['error'])) {
            $error[] = 'Dokument ' . $file['name'] . ' je uspješno poslan';
            $wpdb->query("INSERT INTO t24_docs_tickets (id, id_ticket, doc_url, doc_name) VALUES (NULL, " . $last_inserted_ticket_id . ", '/uploads/" . date('Y') . "/" . date('m') . "/" . $last_inserted_ticket_id . '_' . $file ['name'] . "', '" . $file['name'] . "')");
            //echo "File is valid, and was successfully uploaded.\n";
        } else {
            //echo "File is not valid, and was successfully uploaded.\n";
            $error[] = 'Dokument ' . $file['name'] . ' nije poslan uspjšeno.';

            /**
             * Error generated by _wp_handle_upload()
             * @see _wp_handle_upload() in wp-admin/includes/file.php
             */

            echo $movefile['error'];
            ///ovdje treba log!!!!

        }

    }
    $response->error = $error;
    $response->lid = $last_inserted_ticket_id;

    echo json_encode($response);


}


?>

