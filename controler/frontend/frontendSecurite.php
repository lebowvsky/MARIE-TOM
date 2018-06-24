<?php
require_once('model/Securite.php');


// Fonctions

function securiteIn($string) {
	$string = Securite::bdd($string);
}