<?php

require_once("model/Manager.php");

class ImageManager extends Manager {

	private $_name;
	private $_path;
	private $_idPhoto;

	private $_sizeMax;

	private $_height;
	private $_width;

	private $_finalName;

	private $_tableText;


	// Liste des getters

	public function name() {
		return $this->_name;
	}

	public function path() {
		return $this->_path;
	}

	public function idPhoto() {
		return $this->_idPhoto;
	}

	public function sizeMax() {
		return $this->_sizeMax;
	}

	public function height() {
		return $this->_height;
	}

	public function width() {
		return $this->_width;
	}

	public function finalName() {
		return $this->_finalName;
	}

	public function _tableText() {
		return $this->_tableText;
	}


	// Liste des setters

	public function setName($name) {
		$this->_name = $name;
	}

	public function setPath($path) {
		$this->_path = $path;
	}

	public function setIdPhoto($idPhoto) {
		$this->_idPhoto = $idPhoto;
	}

	public function setSizeMax($sizeMax) {
		$this->_sizeMax = $sizeMax;
	}

	public function setHeight($height) {
		$this->_height = $height;
	}

	public function setWidth($width) {
		$this->_width = $width;
	}

	public function setFinalName($finalName) {
		$this->_finalName = $finalName;
	}

	public function setTableText($tableText) {
		$this->_tableText = $tableText;
	}


	// Fonctions

	public function postPhoto($tmp_name, $name, $size, $sizeMax, $error, $path, $idPhoto, $height) {

		$this->setName($name);
		$this->setPath($path);
		$this->setIdPhoto($idPhoto);
		$this->setSizeMax($sizeMax);
		$this->setHeight($height);


		$extensions_valides = array( 'jpg' , 'jpeg' );
		$extension_photo = strtolower(  substr(  strrchr($this->_name, '.')  ,1)  );
		$nom = md5(uniqid(rand(), true)) . "." . $extension_photo;
		$taille_max = $this->_sizeMax;

		if (isset($tmp_name)) {
			if ($error == 0) {
				if ( in_array($extension_photo, $extensions_valides) ) {
					if ($size <= $taille_max) {

						//	-----Resize de l'image 	-----
						
						$ImageChoisie = imagecreatefromjpeg($tmp_name);
						$TailleImageChoisie = getimagesize($tmp_name);

						$NouvelleHauteur = $this->_height;

						$Reduction = (($NouvelleHauteur * 100) / $TailleImageChoisie[1]);
						$NouvelleLargeur = ($TailleImageChoisie[0] * $Reduction / 100);

						$NouvelleImage = imagecreatetruecolor($NouvelleLargeur, $NouvelleHauteur) or die ("Erreur");
						imagecopyresampled($NouvelleImage, $ImageChoisie, 0, 0, 0, 0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0], $TailleImageChoisie[1]); 
						imagedestroy($ImageChoisie);

						//	-----Envoi de l'image 	-----
						imagejpeg($NouvelleImage, $this->_path . $nom, 100);


						

						$db = $this->dbConnect();
						$donnees = $db->prepare('INSERT INTO photos (photo_path, id_photo) VALUES ( ?, ?)');
						$affectedLines = $donnees->execute(array( $this->_path . $nom , $this->_idPhoto));


					}

				}
			}
		}

	}

	

	public function postOnlyPhoto($tmp_name, $name, $size, $sizeMax, $error, $path, $height, $finalNamePhoto) {
		$this->setName($name);
		$this->setPath($path);
		$this->setIdPhoto($idPhoto);
		$this->setSizeMax($sizeMax);
		$this->setHeight($height);
		$this->setFinalName($finalNamePhoto);



		$extensions_valides = array( 'jpg' , 'jpeg' );
		$extension_photo = strtolower(  substr(  strrchr($this->_name, '.')  ,1)  );
		if ($extension_photo=='jpeg') {
			$extension_photo = 'jpg';
		}
		$nom = $this->_finalName . "." . $extension_photo;
		$taille_max = $this->_sizeMax;

		

		//	Effacement de la photo précédente
		if (file_exists($this->_path . $nom)) {
			unlink($this->_path . $nom);
		}

		if (isset($tmp_name)) {
			if ($error == 0) {
				if ( in_array($extension_photo, $extensions_valides) ) {
					if ($size <= $taille_max) {

						//	-----Resize de l'image 	-----
						
						$ImageChoisie = imagecreatefromjpeg($tmp_name);
						$TailleImageChoisie = getimagesize($tmp_name);

						$NouvelleHauteur = $this->_height;

						$Reduction = (($NouvelleHauteur * 100) / $TailleImageChoisie[1]);
						$NouvelleLargeur = ($TailleImageChoisie[0] * $Reduction / 100);

						$NouvelleImage = imagecreatetruecolor($NouvelleLargeur, $NouvelleHauteur) or die ("Erreur");
						imagecopyresampled($NouvelleImage, $ImageChoisie, 0, 0, 0, 0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0], $TailleImageChoisie[1]); 
						imagedestroy($ImageChoisie);

						imagejpeg($NouvelleImage, $this->_path . $nom, 100);


						//	-----Envoi de l'image 	-----

						//move_uploaded_file($NouvelleImage, $this->_path . $nom);

					}

				}
			}
		}
	}


	public function updatePhoto($tmp_name, $name, $size, $sizeMax, $error, $path, $idPhoto, $height) {
		$this->setName($name);
		$this->setPath($path);
		$this->setIdPhoto($idPhoto);
		$this->setSizeMax($sizeMax);
		$this->setHeight($height);
		$this->setTableText($tableText);


		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM photos WHERE id_photo = ?') or die(print_r($db->errorInfo()));
		$req->execute(array($this->_idPhoto));
		while ($donnees = $req->fetch()) {

			unlink($donnees['photo_path']);
		}


		$extensions_valides = array( 'jpg' , 'jpeg' );
		$extension_photo = strtolower(  substr(  strrchr($this->_name, '.')  ,1)  );
		$nom = md5(uniqid(rand(), true)) . "." . $extension_photo;
		$taille_max = $this->_sizeMax;

		if (isset($tmp_name)) {
			if ($error == 0) {
				if ( in_array($extension_photo, $extensions_valides) ) {
					if ($size <= $taille_max) {

						//	-----Resize de l'image 	-----
						
						$ImageChoisie = imagecreatefromjpeg($tmp_name);
						$TailleImageChoisie = getimagesize($tmp_name);

						$NouvelleHauteur = $this->_height;

						$Reduction = (($NouvelleHauteur * 100) / $TailleImageChoisie[1]);
						$NouvelleLargeur = ($TailleImageChoisie[0] * $Reduction / 100);

						$NouvelleImage = imagecreatetruecolor($NouvelleLargeur, $NouvelleHauteur) or die ("Erreur");
						imagecopyresampled($NouvelleImage, $ImageChoisie, 0, 0, 0, 0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0], $TailleImageChoisie[1]); 
						imagedestroy($ImageChoisie);

						//	-----Envoi de l'image 	-----
						imagejpeg($NouvelleImage, $this->_path . $nom, 100);


						

						

						$db = $this->dbConnect();
						$donnees = $db->prepare('UPDATE photos SET photo_path = :nvphoto_path WHERE id_photo = :originalid_photo');
						$donnees->execute(array(
							'nvphoto_path' => $this->_path . $nom,
							'originalid_photo' => $this->_idPhoto
						));


					}

				}
			}
		}

	}





	public function getPhotosFromPath($path) {
		$this->setPath($path);

		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM photos WHERE photo_path LIKE "%'. $this->_path .'%"') or die(print_r($db->errorInfo()));
		
		
		

		return $req;
	}





	public function deletePhotos($idPhoto) {

		$this->setIdPhoto($idPhoto);

		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM photos WHERE id_photo = ?') or die(print_r($db->errorInfo()));
		$req->execute(array($this->_idPhoto));
		while ($donnees = $req->fetch()) {

			unlink($donnees['photo_path']);
		}

		$req2 = $db->prepare('DELETE FROM photos WHERE id_photo = ?') or die(print_r($db->errorInfo()));
		$affectedLines = $req2->execute(array($this->_idPhoto));
	}















}
