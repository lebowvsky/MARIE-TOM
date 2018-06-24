<?php

require_once("model/ImageManager.php");

function addPhoto($tmp_name, $name, $size, $sizeMax, $error, $path, $idPhoto, $height) {
	$imageManager = new ImageManager();
	$addedImage = $imageManager->postPhoto($tmp_name, $name, $size, $sizeMax, $error, $path, $idPhoto, $height);
}

function addOnlyPhoto($tmp_name, $name, $size, $sizeMax, $error, $path, $height, $finalNamePhoto) {
	$imageManager = new ImageManager();
	$addedImage = $imageManager->postOnlyPhoto($tmp_name, $name, $size, $sizeMax, $error, $path, $height, $finalNamePhoto);
}

function updateAPhoto($tmp_name, $name, $size, $sizeMax, $error, $path, $idPhoto, $height) {
	$imageManager = new ImageManager();
	$updatedImage = $imageManager->updatePhoto($tmp_name, $name, $size, $sizeMax, $error, $path, $idPhoto, $height, $tableText);
}

function deletePhoto($idPhoto) {
	$imageManager = new ImageManager();
	$deletedImage = $imageManager->deletePhotos($idPhoto);
}