<?php
require('controler/frontend/frontend.php');
require('controler/frontend/frontendMessage.php');

require('controler/backend/backend.php');
require('controler/backend/backendText.php');
require('controler/backend/backendPhoto.php');


try {
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'accueil') {
            accueil();
        }

        elseif ($_GET['action'] == 'laFerme') {
            laFerme();
        }

        elseif ($_GET['action'] == 'brebisVaches') {
            brebisVaches();
        }

        elseif ($_GET['action'] == 'porcs') {
            porcs();
        }

        elseif ($_GET['action'] == 'jusConfitures') {
            jusConfitures();
        }

        elseif ($_GET['action'] == 'tractionAnimale') {
            tractionAnimale();
        }

        elseif ($_GET['action'] == 'roulottes') {
            roulottes();
        }

        elseif ($_GET['action'] == 'contact') {
            contact();
        }

        elseif ($_GET['action'] == 'sendMessage') {
            if (isset($_POST['messageName']) && isset($_POST['messageFirstName']) && isset($_POST['messageSenderEmail']) && isset($_POST['messageSubject']) && isset($_POST['messageText'])) {
                if (!empty($_POST['messageName']) && !empty($_POST['messageFirstName']) && !empty($_POST['messageSenderEmail']) && !empty($_POST['messageSubject']) && !empty($_POST['messageText'])) {


                    sendMessage($_POST['messageName'], $_POST['messageFirstName'], $_POST['messageSenderEmail'], $_POST['messageSubject'], $_POST['messageText']);
                    contact();
                }
            }
        }

        /* ------------------------ ACCES BACKEND ------------------------- */


        elseif ($_GET['action'] == 'adminLog') {
            adminLog();
        }

        
    }
    else {
        accueil();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}