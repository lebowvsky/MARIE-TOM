<?php

class messageManager {

	private $_messageName;
	private $_messageFirstName;
	private $_messageSenderEmail;
	private $_messageSubject;
	private $_messageText;
	private $_emailLouviere = 'brice.legallo@free.fr';


// constructeur
	public function __construct($messageName, $messageFirstName, $messageSenderEmail, $messageSubject, $messageText) {
		$this->setMessageName($messageName);
		$this->setMessageFirstName($messageFirstName);
		$this->setMessageSenderEmail($messageSenderEmail);
		$this->setMessageSubject($messageSubject);
		$this->setMessageText($messageText);
	}


// Setters
	public function setMessageName($messageName) {
		$this->_messageName = htmlspecialchars($messageName);
	}

	public function setMessageFirstName($messageFirstName) {
		$this->_messageFirstName = htmlspecialchars($messageFirstName);
	}

	public function setMessageSenderEmail($messageSenderEmail) {
		$this->_messageSenderEmail = htmlspecialchars($messageSenderEmail);
	}

	public function setMessageSubject($messageSubject) {
		$this->_messageSubject = htmlspecialchars($messageSubject);
	}

	public function setMessageText($messageText) {
		$this->_messageText = htmlspecialchars($messageText);
	}


// Fonction utile
	public function sendEmail() {

		$mail = $this->_emailLouviere; // Déclaration de l'adresse de destination.
		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
		{
		    $passage_ligne = "\r\n";
		}
		else
		{
		    $passage_ligne = "\n";
		}
		//=====Déclaration des messages au format texte et au format HTML.
		$message_txt = $this->_messageText;
		$message_html = "<html><head></head><body style=\"background-color : rgba(120, 224, 143,0.3); height : 90vh; padding : 50px;\"><p>" . $this->_messageText . "</p><br><p>" . $this->_messageFirstName . " " . $this->_messageName ."</p></body></html>";
		//==========
		 
		//=====Création de la boundary
		$boundary = "-----=".md5(rand());
		//==========
		 
		//=====Définition du sujet.
		$sujet = $this->_messageSubject;
		//=========
		 
		//=====Création du header de l'e-mail.
		$header = "From: " . $this->_emailLouviere.$passage_ligne;
		$header.= "Reply-to: ". $this->_messageSenderEmail.$passage_ligne;
		$header.= "MIME-Version: 1.0".$passage_ligne;
		$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
		//==========
		 
		//=====Création du message.
		$message = $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format texte.
		$message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_txt.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format HTML
		$message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_html.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		//==========
		 
		//=====Envoi de l'e-mail.
		mail($mail,$sujet,$message,$header);
		//==========
	}





}