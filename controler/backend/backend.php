<?php


// fonctions

function administration(){
	$imageManager = new ImageManager();
	$photos = $imageManager->getPhotosFromPath('contents/images/carousel/');
	
	require('view/backend/adminAccueil.php');
}

function administrationLaFerme(){
	$textManager = new TextManager();
	$results = $textManager->getAllTexts('laferme_actualite');
	require('view/backend/adminLaFerme.php');
}

function administrationBrebisVaches(){
	$textManagerBrebisPhoto = new TextManager();
	$resultsBrebisPhoto = $textManagerBrebisPhoto->getLastText('brebisvaches_brebis');

	$textManagerBrebisText = new TextManager();
	$resultsBrebisTexts = $textManagerBrebisText->getAllTexts('brebisvaches_brebis');

	$textManagerVachesPhoto = new TextManager();
	$resultsVachesPhoto = $textManagerVachesPhoto->getLastText('brebisvaches_vaches');

	$textManagerVachesText = new TextManager();
	$resultsVachesTexts = $textManagerVachesText->getAllTexts('brebisvaches_vaches');

	$textManagerProduits = new TextManager();
	$resultsProduits = $textManagerProduits->getAllTexts('brebisvaches_produits');
	require('view/backend/adminBrebisVaches.php');
}

function administrationPorcs(){
	$textManagerPorcs = new TextManager();
	$resultsPorcs = $textManagerPorcs->getAllTexts('porcs');

	$textManagerProduits = new TextManager();
	$resultsProduits = $textManagerProduits->getAllTexts('porcs_produits');
	require('view/backend/adminPorcs.php');
}

function administrationJusConfitures(){
	$textManagerVergers = new TextManager();
	$resultsVergers = $textManagerVergers->getAllTexts('verger');

	$textManagerProduits = new TextManager();
	$resultsProduits = $textManagerProduits->getAllTexts('verger_produits');
	require('view/backend/adminJusConfitures.php');
}

function administrationTraction(){
	$textManagerTraction = new TextManager();
	$resultsTractions = $textManagerTraction->getAllTexts('traction');

	$textManagerPrestations = new TextManager();
	$resultsPrestations = $textManagerPrestations->getAllTexts('traction_prestations');
	require('view/backend/adminTraction.php');
}

function administrationRoulotte(){
	$textManagerRoulotte = new TextManager();
	$resultsRoulottes = $textManagerRoulotte->getAllTexts('roulotte');

	$textManagerPrestations = new TextManager();
	$resultsPrestations = $textManagerPrestations->getAllTexts('roulotte_prestations');
	require('view/backend/adminRoulotte.php');
}

function adminLog() {
	require('view/backend/adminLog.php');
}







