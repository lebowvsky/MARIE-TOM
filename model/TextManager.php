<?php

require_once("model/Manager.php");

class TextManager extends Manager {

	private $_table;
	private $_id;
	private $_date;
	private $_titre;
	private $_texte;

	private $_idPhoto;


	// Constructeur
	


	// Liste des getters
	public function table() {
		return $this->_table;
	}

	public function id() {
		return $this->_id;
	}

	public function date() {
		return $this->_date;
	}

	public function titre() {
		return $this->_titre;
	}

	public function texte() {
		return $this->_texte;
	}

	public function idPhoto() {
		return $this->_idPhoto;
	}



	// Liste des setters

	public function setTable($table) {
		$this->_table = $table;
	}

	public function setId($id) {
		$this->_id = $id;
	}

	public function setDate($date) {
		$this->_date = $date;
	}

	public function setTitre($titre) {
		$this->_titre = $titre;
	}

	public function setTexte($texte) {
		$this->_texte = $texte;
	}

	public function setIdPhoto($idPhoto) {
		$this->_idPhoto = $idPhoto;
	}


	// Hydratation
	public function hydrate(array $donnees) {

	  foreach ($donnees as $key => $value)
	  {
	    // On récupère le nom du setter correspondant à l'attribut.
	    $method = 'set'.ucfirst($key);
	        
	    // Si le setter correspondant existe.
	    if (method_exists($this, $method))
	    {
	      // On appelle le setter.
	      $this->$method($value);
	    }
	  }
	}


	// Fonctions

	public function postNewText($table, $titre, $texte, $idPhoto) {
		$this->setTable($table);
		$this->setTitre($titre);
		$this->setTexte($texte);
		$this->setIdPhoto($idPhoto);

		$db = $this->dbConnect();
		$donnees = $db->prepare('INSERT INTO ' . $this->_table . ' (date, titre, texte, id_photo) VALUES ( NOW(), ?, ?, ?)');
		$affectedLines = $donnees->execute(array($this->_titre, $this->_texte, $this->_idPhoto));

		return $affectedLines;
	}

	public function CreateUniqText($table, $titre, $texte, $idPhoto) {
		$this->setTable($table);
		$this->setTitre($titre);
		$this->setTexte($texte);
		$this->setIdPhoto($idPhoto);

		$db = $this->dbConnect();
		$donnees = $db->prepare('INSERT INTO ' . $this->_table . ' (date, titre, texte, id_photo) VALUES ( NOW(), ?, ?, ?)');
		$affectedLines = $donnees->execute(array($this->_titre, $this->_texte, $this->_idPhoto));

		return $affectedLines;
	}

	public function updateUniqTexte($table, $titre, $texte) {
		$this->setTable($table);
		$this->setTitre($titre);
		$this->setTexte($texte);

		$db = $this->dbConnect();
		$donnees = $db->prepare('UPDATE ' . $this->_table . ' SET date = NOW(), titre = ?, texte = ? ORDER BY id DESC LIMIT 1');
		$affectedLines = $donnees->execute(array($this->_titre, $this->_texte));

		return $affectedLines;

	}

	public function updateMultiTexte($table, $titre, $texte, $id) {
		$this->setId($id);
		$this->setTable($table);
		$this->setTitre($titre);
		$this->setTexte($texte);

		$db = $this->dbConnect();
		$donnees = $db->prepare('UPDATE ' . $this->_table . ' SET date = NOW(), titre = ?, texte = ? WHERE id = ?');
		$affectedLines = $donnees->execute(array($this->_titre, $this->_texte, $this->_id));

		return $affectedLines;

	}


	public function getTexte($table) {
		$this->setTable($table);

		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM ' . $this->_table . ' ORDER BY id DESC LIMIT 0,1');
		$result = $req->fetch();
		return $result;
	}

	public function getLastTextWithPhoto($table) {
		$this->setTable($table);

		$db = $this->dbConnect();
		$req = $db->query('SELECT * 
								FROM ' . $this->_table . ' t 
								LEFT JOIN photos p 
								ON t.id_photo = p.id_photo 
								ORDER BY t.id DESC LIMIT 0,1');
		$result = $req->fetch();
		return $result;
	}

	public function getLastFiveTexts($table) {
		$this->setTable($table);

		$db = $this->dbConnect();
		$results = $db->query('SELECT * 
								FROM ' . $this->_table . ' t 
								LEFT JOIN photos p 
								ON t.id_photo = p.id_photo 
								ORDER BY t.id DESC LIMIT 0,5');
		
		return $results;
	}

	public function getAllTextsWithPhotos($table) {
		$this->setTable($table);

		$db = $this->dbConnect();
		$results = $db->query('SELECT * 
								FROM ' . $this->_table . ' t 
								LEFT JOIN photos p 
								ON t.id_photo = p.id_photo 
								ORDER BY t.id DESC');
		
		return $results;
	}

	public function getAllTexts($table) {
		$this->setTable($table);

		$db = $this->dbConnect();
		$results = $db->query('SELECT * FROM ' . $this->_table) or die(print_r($db->errorInfo()));

		return $results;
	}

	public function getLastText($table) {
		$this->setTable($table);

		$db = $this->dbConnect();
		$results = $db->query('SELECT * FROM ' . $this->_table . ' ORDER BY id DESC LIMIT 0,1') or die(print_r($db->errorInfo()));

		return $results;
	}

	public function deleteTexts($table, $idPhoto) {
		$this->setTable($table);
		$this->setIdPhoto($idPhoto);

		$db = $this->dbConnect();
		$req= $db->prepare('DELETE FROM ' . $this->_table . ' WHERE id_photo = ?') or die(print_r($db->errorInfo()));
		$req->execute(array($this->_idPhoto));


	}









}