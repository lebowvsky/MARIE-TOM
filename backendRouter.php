<?php
session_start();

//if(!$_SESSION['nom']) {
//    header('Location: index.php');
//}

require('controler/backend/backend.php');
require('controler/backend/backendText.php');
require('controler/backend/backendPhoto.php');
require('controler/backend/backendAdmin.php');

try {
	if(isset($_GET['action'])) {

		if ($_GET['action'] == 'administration') {
            administration();
        }

        elseif ($_GET['action'] == 'administrationLaFerme') {
            administrationLaFerme();
        }

        elseif ($_GET['action'] == 'administrationBrebisVaches') {
            administrationBrebisVaches();
        }

        elseif ($_GET['action'] == 'administrationPorcs') {
            administrationPorcs();
        }

        elseif ($_GET['action'] == 'administrationJusConfitures') {
            administrationJusConfitures();
        }

        elseif ($_GET['action'] == 'administrationTraction') {
            administrationTraction();
        }

        elseif ($_GET['action'] == 'administrationRoulotte') {
            administrationRoulotte();
        }

        elseif ($_GET['action'] == 'adminLog') {
            adminLog();
        }




        elseif ($_GET['action'] == 'addText') {

            if (isset($_POST['table']) && isset($_POST['texteAccueil'])) {
                if (!empty($_POST['table']) && !empty($_POST['texteAccueil'])) {
                    addText($_POST['table'], $_POST['texteAccueilGras'], $_POST['texteAccueil'], $_POST['idPhoto']);
                } else {
                    addText($_POST['table'], ' ', ' ', $_POST['idPhoto']);
                }
            }  

            if (isset($_FILES['photo_a_envoyer']['tmp_name'])) {
                if (!empty($_FILES['photo_a_envoyer']['tmp_name'])) {
                    addPhoto($_FILES['photo_a_envoyer']['tmp_name'], $_FILES['photo_a_envoyer']['name'], $_FILES['photo_a_envoyer']['size'], $_POST['sizeMax'], $_FILES['photo_a_envoyer']['error'], $_POST['path'], $_POST['idPhoto'], $_POST['height']);
                }
            }
            
            $_POST['place']();
        }


        elseif ($_GET['action'] == 'updateUniqText') {
            updateUniqText($_POST['table'], $_POST['texteAccueilGras'], $_POST['texteAccueil']);

            if (isset($_FILES['photo_a_envoyer']['tmp_name'])) {
                if (!empty($_FILES['photo_a_envoyer']['tmp_name'])) {
                    addPhoto($_FILES['photo_a_envoyer']['tmp_name'], $_FILES['photo_a_envoyer']['name'], $_FILES['photo_a_envoyer']['size'], $_POST['sizeMax'], $_FILES['photo_a_envoyer']['error'], $_POST['path'], $_POST['idPhoto'], $_POST['height']);
                }
            }

            $_POST['place']();
        }

        elseif ($_GET['action'] == 'updateMultiText') {
            updateMultiText($_POST['table'], $_POST['texteAccueilGras'], $_POST['texteAccueil'], $_POST['id']);

            $_POST['place']();
        }


        elseif ($_GET['action'] == 'deleteText') {
            deleteText($_POST['table'], $_POST['idPhoto']);

            if (isset($_POST['idPhoto']) && !empty($_POST['idPhoto'])) {
                deletePhoto($_POST['idPhoto']);
            }
            
            $_POST['place']();
        }


        elseif ($_GET['action'] == 'addPhoto') {
            if (isset($_FILES['photo_a_envoyer']['tmp_name'])) {
                if (!empty($_FILES['photo_a_envoyer']['tmp_name'])) {
                    addPhoto($_FILES['photo_a_envoyer']['tmp_name'], $_FILES['photo_a_envoyer']['name'], $_FILES['photo_a_envoyer']['size'], $_POST['sizeMax'], $_FILES['photo_a_envoyer']['error'], $_POST['path'], $_POST['idPhoto'], $_POST['height']);
                }
            }
            
            $_POST['place']();
        }

        elseif ($_GET['action'] == 'addOnlyPhoto') {
            if (isset($_FILES['photo_a_envoyer']['tmp_name'])) {
                if (!empty($_FILES['photo_a_envoyer']['tmp_name'])) {
                    addOnlyPhoto($_FILES['photo_a_envoyer']['tmp_name'], $_FILES['photo_a_envoyer']['name'], $_FILES['photo_a_envoyer']['size'], $_POST['sizeMax'], $_FILES['photo_a_envoyer']['error'], $_POST['path'], $_POST['height'], $_POST['finalNamePhoto']);
                }
            }
            
            $_POST['place']();
        }

        elseif ($_GET['action'] == 'updateAPhoto') {
            if (isset($_FILES['photo_a_envoyer']['tmp_name'])) {
                if (!empty($_FILES['photo_a_envoyer']['tmp_name'])) {
                    updateAPhoto($_FILES['photo_a_envoyer']['tmp_name'], $_FILES['photo_a_envoyer']['name'], $_FILES['photo_a_envoyer']['size'], $_POST['sizeMax'], $_FILES['photo_a_envoyer']['error'], $_POST['path'], $_POST['idPhoto'], $_POST['height']);
                }
            }
            
            $_POST['place']();
        }

        elseif($_GET['action'] == 'deletePhoto') {
            if (isset($_POST['idPhoto']) && !empty($_POST['idPhoto'])) {
                deletePhoto($_POST['idPhoto']);
            }
            
            $_POST['place']();
        }


        // Verif Admin

        elseif($_GET['action'] == 'verifAdmin'){
        	if(isset($_POST['login']) && isset($_POST['password'])) {
        		if(!empty($_POST['login']) && !empty($_POST['password'])) {
        			verifAdmin($_POST['login'], $_POST['password']);
        		}
        	}
        }




	}

	else {
		administration();
	}



}

catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}








