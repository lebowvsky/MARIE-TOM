<?php

// Chargement des classes
require_once("model/TextManager.php");



// fonctions

function accueil()
{	
	$imageManager = new ImageManager();
	$photos = $imageManager->getPhotosFromPath('contents/images/carousel/');
	
	$textManager = new TextManager();
	$result = $textManager->getTexte('accueilmessage');
	
	require('view/frontend/accueil.php');
}

function laFerme()
{
	$textManager1 = new TextManager();
	$lavie = $textManager1->getLastTextWithPhoto('laferme_vie');

	$textManager2 = new TextManager();
	$actualites = $textManager2->getLastFiveTexts('laferme_actualite');

	require('view/frontend/ferme.php');
}

function brebisVaches()
{
	$textManager1 = new TextManager();
	$elevageBrebis = $textManager1->getLastTextWithPhoto('brebisvaches_brebis');

	$textManager2 = new TextManager();
	$elevageVaches = $textManager2->getLastTextWithPhoto('brebisvaches_vaches');

	$textManager3 = new TextManager();
	$introProduits = $textManager3->getTexte('brebisvaches_intro_produits');

	$textManager4 = new TextManager();
	$produits = $textManager4->getAllTextsWithPhotos('brebisvaches_produits');
	require('view/frontend/brebis_vaches.php');
}

function porcs()
{
	$textManager1 = new TextManager();
	$elevagePorcs = $textManager1->getLastTextWithPhoto('porcs');

	$textManager2 = new TextManager();
	$introProduits = $textManager2->getTexte('porcs_intro_produits');

	$textManager3 = new TextManager();
	$produits = $textManager3->getAllTextsWithPhotos('porcs_produits');
	require('view/frontend/porcs.php');
}

function jusConfitures()
{
	$textManager1 = new TextManager();
	$verger = $textManager1->getLastTextWithPhoto('verger');

	$textManager2 = new TextManager();
	$introProduits = $textManager2->getTexte('verger_intro_produits');

	$textManager3 = new TextManager();
	$produits = $textManager3->getAllTextsWithPhotos('verger_produits');

	require('view/frontend/jus_confitures.php');
}

function tractionAnimale()
{
	$textManager1 = new TextManager();
	$chevaux = $textManager1->getLastTextWithPhoto('traction');

	$textManager2 = new TextManager();
	$introPrestations = $textManager2->getTexte('traction_intro_prestations');

	$textManager3 = new TextManager();
	$prestations = $textManager3->getAllTextsWithPhotos('traction_prestations');
	require('view/frontend/traction_animale.php');
}

function roulottes() {
	$textManager1 = new TextManager();
	$roulotte = $textManager1->getLastTextWithPhoto('roulotte');

	$textManager2 = new TextManager();
	$introPrestations = $textManager2->getTexte('roulotte_intro_prestations');

	$textManager3 = new TextManager();
	$prestations = $textManager3->getAllTextsWithPhotos('roulotte_prestations');
	require('view/frontend/roulotte.php');
}

function contact() {
	require('view/frontend/contact.php');
}











