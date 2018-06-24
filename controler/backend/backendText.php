<?php

require_once("model/TextManager.php");


function getAllTextes($table) {
	$textManager = new TextManager();
	$results = $textManager->getAllTexts($table);
}


function addText($table, $titre_texte, $texte_texte, $id_photo) {
	$textManager = new TextManager();
	$addedText = $textManager->postNewText($table, $titre_texte, $texte_texte, $id_photo);
}


function updateUniqText($table, $titre_texte, $texte_texte) {
	$textManager = new TextManager();
	$postedText = $textManager->updateUniqTexte($table, $titre_texte, $texte_texte);
}

function updateMultiText($table, $titre_texte, $texte_texte, $id) {
	$textManager = new TextManager();
	$postedText = $textManager->updateMultiTexte($table, $titre_texte, $texte_texte, $id);
}

function deleteText($table, $idPhoto) {
	$textManager = new TextManager();
	$deletedText = $textManager->deleteTexts($table, $idPhoto);
}


