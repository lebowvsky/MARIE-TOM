<?php

// Chargement des Classes

require_once('model/messageManager.php');



// Fonctions
function sendMessage($messageName, $messageFirstName, $messageSenderEmail, $messageSubject, $messageText) {
	$messageManager = new messageManager($messageName, $messageFirstName, $messageSenderEmail, $messageSubject, $messageText);
	$sendedMessage = $messageManager->sendEmail();
}
