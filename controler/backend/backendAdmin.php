<?php

require_once('model/AdminManager.php');

function verifAdmin($login, $password) {
	$adminManager = new AdminManager($login, $password);
	$passOk = $adminManager->loginPassTest();
}