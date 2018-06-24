<?php

require_once("model/Manager.php");

class AdminManager extends Manager {

	private $_login;
	private $_password;

	public function __construct($login, $password) {
		$this->setLogin($login);
		$this->setPassword($password);
	}


	//	Getters

	public function login(){
		return $this->_login;
	}

	public function password(){
		return $this->_password;
	}


	//	Setters

	public function setLogin($login){
		$this->_login = htmlspecialchars($login);
	}

	public function setPassword($password){
		$this->_password = htmlspecialchars($password);
	}


	// Fonctions utiles

	public function loginPassTest() {

		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, password, nom FROM admin WHERE login = :login');
		$req->execute(array(
			'login' => $this->_login));
		$result = $req->fetch();

		if(!$result) {
			echo "mauvais login";
		}
		else{
			if($result['password'] == $this->_password) {
				session_start();
				$_SESSION['id'] = $result['id'];
				$_SESSION['nom'] = $result['nom'];
				header('Location: backendRouter.php?action=administration');
			}
			else {
				echo "Bon login mauvais passWord...";
			}
		}


		
	}


	public function sessionDestroy() {
		session_destroy();
		header('Location: index.php');
	}









}