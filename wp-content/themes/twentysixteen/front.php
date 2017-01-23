<?php
/**
 * Created by PhpStorm.
 * User: hrvoejantunovic
 * Date: 05.12.16.
 * Time: 19:36
 */
/**
 * Template Name: Front page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

require_once($GLOBALS['t24_plugin_dir'] . 'admin/lib/TicketsController.php');
$tcc = new TicketsController();
 get_header('front');

?>

    <header style="min-height: 60%;">
        <div class="header-content">
            <div class="header-content-inner">
                <h2 id="homeHeading">Ovjereni prijevod sudskog tumača na Vašoj adresi <br>u roku od 24h (sata)<br><br>Samo
                    26 KM po stranici</h2>
                <hr>
                <!--<p>Dostava prijevoda u roku od 24 sata Jednu do tri stranice prijevoda, dostavljamo u roku od 24 sata. Prijevod24 uključuje uslugu brze pošte. Plaćanje pouzećem, kod isporuke pošiljke na Vašoj adresi.</p>
                -->
                <div style="height:50px;   border-radius:10px; " id="translate"
                     class="btn btn-primary btn-xl page-scroll">Želim prijevod!
                </div>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about" style="padding: 30px 0;">

        <div class="container modal-wrapper">

        </div>

        <div class="container">
            <div class="row">
                <div>
                    <div class="dd_container">
                        <form id="draganddrop_form" method="post" action="http://localhost/libar/api"
                              enctype="multipart/form-data" novalidate class="box">


                            <div class="box__input">
                                <svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43"
                                     viewBox="0 0 50 43">
                                    <path
                                        d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"/>
                                </svg>
                                <input type="file" name="files[]" id="file" class="box__file"
                                       data-multiple-caption="{count} files selected" multiple/>
                                <label for="file"><strong>Izaberi dokument(e)</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                            </div>


                            <div class="box__uploading">Uploading&hellip;</div>
                            <div class="box__success">Done! <a
                                    href="https://css-tricks.com/examples/DragAndDropFileUploading//?submit-on-demand"
                                    class="box__restart" role="button">Upload more?</a></div>
                            <div class="box__error">Error! <span></span>. <a
                                    href="https://css-tricks.com/examples/DragAndDropFileUploading//?submit-on-demand"
                                    class="box__restart" role="button">Try again!</a></div>
                        </form>
                        <button type="submit" id="submit_button"
                                class="box__button">Prevedi
                        </button>


                    </div>
                </div>

            </div>
        </div>
    </section>
    <section id="services" style="    padding: 0px 0;">

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center text-box">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h4>Dostava prijevoda u roku od 24 sata</h4>
                        <p class="text-muted">Jednu do tri stranice prijevoda, dostavljamo u roku od 24 sata. Prijevod24
                            uključuje uslugu brze pošte. Plaćanje pouzećem, kod isporuke pošiljke na Vašoj adresi.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center text-box">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                        <h4>Plaćanje usluge pouzećem, samo 26 KM / stranici</h4>
                        <p class="text-muted">Kod isporuke pošiljke na Vašoj adresi, obavljate plaćanje. Ukoliko
                            korisnik nije zadovoljan, garantiramo povrat novca.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center text-box">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h4>Svi sudski tumači na jednom mjestu</h4>
                        <p class="text-muted">Nudimo mogućnost prijevoda na/sa više od 30 stranih jezika</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center text-box">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h4>Preko 4.000 zadovoljnih kupaca</h4>
                        <p class="text-muted">Mi se brinemo za Vaše potrebe. Imamo preko 4.000 zadovoljnh korisnika
                            usluga.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Kontakt</h2>
                    <hr class="primary">
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:your-email@your-domain.com">test@test.test</a></p>
                </div>
            </div>
        </div>
    </section>
    <div id="modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div class="modal-body-step-one">
                        <p id="modal-body-file_count_message"></p>
                        <p id="modal-body-file_names_list"></p>
                    </div>
                    <div class="modal-body-step-two">
                        <div class="upload-form col-xs-12">
                            <div class="form-group">
                                <label for="name_surname">Ime i prezime</label>
                                <input id="name_surname" required class="form-control" type="text" name="name_surname"
                                       placeholder="Ime i prezime"/>
                            </div>
                            <div class="form-group">
                                <label for="address">Adresa</label>
                                <input id="address" required class="form-control" type="text" name="adress"
                                       placeholder="Vaša adresa (e.g. Trg 154)"/>
                            </div>

                            <div class="form-group"> 
                                <label for="city">Grad</label>
                                <select id="city" required class="form-control" name="city">
                                    <option value="1">Mostar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">E mail adresa</label>
                                <input id="email" class="form-control" type="text" name="email"
                                       placeholder="E-mail adresa"/>
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefon</label>
                                <input id="phone" required class="form-control" type="number" name="phone"
                                       placeholder="Broj telefona"/>
                            </div>

                            <div class="form-group">
                                <label for="language">Odaberite jezike</label>
                                <select id="language" required multiple class="form-control" name="language">
                                    <?php  $tcc->getLanguages();?>
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button id="modal_btn" type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                    <button id="modal_btn_next" type="button" class="btn btn-default" style="color:#76cbff;">Dalje
                    </button>
                    <button id="modal_btn_send" type="button" class="btn btn-default" style="color:#76cbff;">Pošalji
                    </button>

                </div>
            </div>

        </div>
    </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/3.3.2/scrollreveal.min.js"></script>

    <!-- Plugin JavaScript -->

    <script>

        var modal = jQuery('#modal');
        var modal_body = jQuery('.modal-body');
        var modal_body_step_one = jQuery('.modal-body-step-one');
        var modal_file_count_message = jQuery('#modal-body-file_count_message');
        var modal_file_names_list = jQuery('#modal-body-file_names_list');
        var files;


        var name_surname = jQuery('#name_surname');
        var address = jQuery('#address');
        var city = jQuery('#city');
        var email = jQuery('#email');
        var phone = jQuery('#phone');
        var language = jQuery('#language');

        var _file = jQuery('#file');


        jQuery('#translate').on('click', function () {

            jQuery('.bg-primary').show(110, function () {
                jQuery('.dd_container').css('visibility', 'visible');

            });
        });


        // Grab the files and set them to our variable
        function prepareUpload(event) {
            files = event.target.files;
        }

        jQuery(document).on('click', '#modal_btn', function () {


            jQuery('.modal-wrapper').html('');
            modal.css('display', 'none');
            modal.removeClass('in');
        });

        jQuery(document).on('click', '#modal_btn_send', function () {

            var data = {
                name_surname: name_surname.val(),
                address: address.val(),
                city: city.val(),
                email: email.val(),
                phone: phone.val(),
                language: language.val()
            };

            uploadFiles();

        });
        jQuery(document).on('click', '#modal_btn_next', function () {

            var step_2_html = '<h3 class="step-heading">Korak 2</h3>';

            modal_body.append(step_2_html);
            modal_body.append(jQuery('.modal-body-step-two'));
            jQuery('.modal-body-step-one').css('opacity', '0.4');
            jQuery('#modal_btn_next').hide();
            jQuery('#modal_btn_send').show();
            jQuery('.upload-form').show();
        });


        jQuery('#submit_button').on('click', function () {

            // var file contains formData content, if empty - no file picked, user must pick a file to proceed

            var file = jQuery('input[type="file"]').val().trim();

            if (file) {

                //If file - show user info form

                var modal_added_files_html = '';  //String that collects name of every picked file
                var modal_added_file_count = 0;   //Picked file count
                var _files = _file[0].files;      //Array of file objects

                for (var i = 0, f; f = _files[i]; i++) {

                    modal_added_files_html += '<p style="padding-left:20px;"> - ' + f.name + '</p>';
                    modal_added_file_count = i + 1;
                }

                modal_body_step_one.append('<h3 class="step-heading">Korak 1</h3>');
                modal_body_step_one.append('<p class="file-count">  Broj odabranih datoteka: ' + modal_added_file_count + '</p>').css('color', 'black');
                modal_body_step_one.append('<p  class="file-count">Datoteke: </p>' + modal_added_files_html).css('color', 'black');

                jQuery('.modal-wrapper').html(modal);
                modal.css('display', 'block');
                modal.addClass('in');

            } else {
                //If file == 0 - show warning message
                modal.css('display', 'block');
                modal.addClass('in');
                modal_file_names_list.text('Nijedna datoteka nije odabrana!  Molimo odaberite datoteku da bi poslali zahtjev!').css('color', 'black').css('text-align', 'center');

            }
        });


        function uploadFiles(event) {
            //  event.stopPropagation(); // Stop stuff happening
            //   event.preventDefault(); // Totally stop stuff happening
            // START A LOADING SPINNER HERE
            // Create a formdata object and add the files

            var form = new FormData();

            jQuery.each(jQuery('#file')[0].files, function (key, value) {

                form.append(key, value);
                console.log('key' + key + ' value ' + value);
            });

            jQuery.ajax({
                url: 'api',
                type: 'POST',
                data: form,
                cache: false,
                async: false,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                success: function (data, textStatus, jqXHR) {

                    console.log("DLID: " + data.lid);

                    if(typeof data.lid === 'undefined'){
                        console.log("DLID andefajnd: " + data.lid);



                    }else{
                        console.log("DLID defajnd: " + data.lid);

                        finishUpload(data.lid);
                    }


                    if (typeof data.error === 'undefined') {
                        var json = parseJSON(data);
                        // Success so call function to process the form
                        submitForm(event, data);
                    }
                    else {
                        
                        // Handle errors here

                        /*
                         console.log('ERRORS: ' + data.error);
                         modal_body.empty();
                         for(let i = 0; i<data.error.length; i++){
                         modal_body.append('<p>'+data.error[i]+'</p>')

                         }
                         */
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle errors here
                    console.log('ERRORS: ' + textStatus);
                    // STOP LOADING SPINNER
                }
            });
        }

        function finishUpload(lid) {

            var data = {
                name_surname: name_surname.val(),
                address: address.val(),
                city: city.val(),
                email: email.val(),
                phone: phone.val(),
                language: language.val(),
                lid: lid
            };

            console.log('jesamnisam' + data.lid);


            jQuery.ajax({
                url: 'api',
                type: 'POST',
                data: data,
                cache: false,
                dataType: 'json',
                contentType: 'application/x-www-form-urlencoded', // Set content type to false as jQuery will tell the server its a query string request
                success: function (data, textStatus, jqXHR) {


                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle errors here
                    console.log('ERRORS: ' + textStatus);
                    // STOP LOADING SPINNER
                }
            });
        }
        (function ($) {
            "use strict"; // Start of use strict

            // jQuery for page scrolling feature - requires jQuery Easing plugin
            $('a.page-scroll').bind('click', function (event) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: ($($anchor.attr('href')).offset().top - 50)
                }, 1250, 'easeInOutExpo');
                event.preventDefault();
            });

            // Highlight the top nav as scrolling occurs
            $('body').scrollspy({
                target: '.navbar-fixed-top',
                offset: 51
            });

            // Closes the Responsive Menu on Menu Item Click
            $('.navbar-collapse ul li a').click(function () {
                $('.navbar-toggle:visible').click();
            });

            // Offset for Main Navigation
            $('#mainNav').affix({
                offset: {
                    top: 100
                }
            })

            // Initialize and Configure Scroll Reveal Animation
            window.sr = ScrollReveal();
            sr.reveal('.sr-icons', {
                duration: 600,
                scale: 0.3,
                distance: '0px'
            }, 200);
            sr.reveal('.sr-button', {
                duration: 1000,
                delay: 200
            });
            sr.reveal('.sr-contact', {
                duration: 600,
                scale: 0.3,
                distance: '0px'
            }, 300);

            // Initialize and Configure Magnific Popup Lightbox Plugin
            $('.popup-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                }
            });

        })(jQuery);

        'use strict';

        ( function (document, window, index) {
            // feature detection for drag&drop upload
            var isAdvancedUpload = function () {
                var div = document.createElement('div');
                return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
            }();


            // applying the effect for every form
            var forms = document.querySelectorAll('.box');
            Array.prototype.forEach.call(forms, function (form) {
                var input = form.querySelector('input[type="file"]'),
                    label = form.querySelector('label'),
                    errorMsg = form.querySelector('.box__error span'),
                    restart = form.querySelectorAll('.box__restart'),
                    droppedFiles = false,
                    showFiles = function (files) {
                        label.textContent = files.length > 1 ? ( input.getAttribute('data-multiple-caption') || '' ).replace('{count}', files.length) : files[0].name;
                    },
                    triggerFormSubmit = function () {
                        var event = document.createEvent('HTMLEvents');
                        event.initEvent('submit', true, false);
                        form.dispatchEvent(event);
                    };

                // letting the server side to know we are going to make an Ajax request
                var ajaxFlag = document.createElement('input');
                ajaxFlag.setAttribute('type', 'hidden');
                ajaxFlag.setAttribute('name', 'ajax');
                ajaxFlag.setAttribute('value', 1);
                form.appendChild(ajaxFlag);

                // automatically submit the form on file select
                input.addEventListener('change', function (e) {
                    showFiles(e.target.files);


                });

                // drag&drop files if the feature is available
                if (isAdvancedUpload) {
                    form.classList.add('has-advanced-upload'); // letting the CSS part to know drag&drop is supported by the browser

                    ['drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop'].forEach(function (event) {
                        form.addEventListener(event, function (e) {
                            // preventing the unwanted behaviours
                            e.preventDefault();
                            e.stopPropagation();
                        });
                    });
                    ['dragover', 'dragenter'].forEach(function (event) {
                        form.addEventListener(event, function () {
                            form.classList.add('is-dragover');
                        });
                    });
                    ['dragleave', 'dragend', 'drop'].forEach(function (event) {
                        form.addEventListener(event, function () {
                            form.classList.remove('is-dragover');
                        });
                    });
                    form.addEventListener('drop', function (e) {
                        droppedFiles = e.dataTransfer.files; // the files that were dropped
                        showFiles(droppedFiles);

                    });
                }


                // if the form was submitted
                form.addEventListener('submit', function (e) {
                    // preventing the duplicate submissions if the current one is in progress
                    if (form.classList.contains('is-uploading')) return false;

                    form.classList.add('is-uploading');
                    form.classList.remove('is-error');

                    if (isAdvancedUpload) // ajax file upload for modern browsers
                    {
                        e.preventDefault();

                        // gathering the form data
                        var ajaxData = new FormData(form);
                        if (droppedFiles) {
                            Array.prototype.forEach.call(droppedFiles, function (file) {
                                ajaxData.append(input.getAttribute('name'), file);
                            });
                        }

                        // ajax request
                        var ajax = new XMLHttpRequest();
                        ajax.open(form.getAttribute('method'), form.getAttribute('action'), true);

                        ajax.onload = function () {
                            form.classList.remove('is-uploading');
                            if (ajax.status >= 200 && ajax.status < 400) {
                                var data = JSON.parse(ajax.responseText);
                                form.classList.add(data.success == true ? 'is-success' : 'is-error');
                                if (!data.success) errorMsg.textContent = data.error;
                            }
                            else alert('Error. Please, contact the webmaster!');
                        };

                        ajax.onerror = function () {
                            form.classList.remove('is-uploading');
                            alert('Error. Please, try again!');
                        };

                        ajax.send(ajaxData);
                    }
                    else // fallback Ajax solution upload for older browsers
                    {
                        var iframeName = 'uploadiframe' + new Date().getTime(),
                            iframe = document.createElement('iframe');

                        $iframe = $('<iframe name="' + iframeName + '" style="display: none;"></iframe>');

                        iframe.setAttribute('name', iframeName);
                        iframe.style.display = 'none';

                        document.body.appendChild(iframe);
                        form.setAttribute('target', iframeName);

                        iframe.addEventListener('load', function () {
                            var data = JSON.parse(iframe.contentDocument.body.innerHTML);
                            form.classList.remove('is-uploading')
                            form.classList.add(data.success == true ? 'is-success' : 'is-error')
                            form.removeAttribute('target');
                            if (!data.success) errorMsg.textContent = data.error;
                            iframe.parentNode.removeChild(iframe);
                        });
                    }
                });


                // restart the form if has a state of error/success
                Array.prototype.forEach.call(restart, function (entry) {
                    entry.addEventListener('click', function (e) {
                        e.preventDefault();
                        form.classList.remove('is-error', 'is-success');
                        input.click();
                    });
                });

                // Firefox focus bug fix for file input
                input.addEventListener('focus', function () {
                    input.classList.add('has-focus');
                });
                input.addEventListener('blur', function () {
                    input.classList.remove('has-focus');
                });

            });
        }(document, window, 0));

    </script>
<?php
get_footer('front');
