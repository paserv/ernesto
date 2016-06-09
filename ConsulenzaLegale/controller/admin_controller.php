<?php
class AdminController {
	function areValidCredential($username, $password) {
		if ($username==ADMIN_USER && $password == ADMIN_PWD) {
			$this->login();
		} else {
			$this->logout();
		}
		return $this->isAuthenticated();
	}
	
	function isAuthenticated() {
		if (!isset($_SESSION ["authenticated"])) {
			$_SESSION ["authenticated"] = false;
		}
		return $_SESSION ["authenticated"];
	}
	
	function checkLoginRequest() {
		if (isset($_POST['username']) && isset($_POST['password']) && $this->areValidCredential($_POST['username'], $_POST['password'])) {
			$this->login();
		}
		return $this->isAuthenticated();
	}
	
	function checkLogoutRequest() {
		if (isset($_GET['req']) and $_GET['req'] == 'logout') {
			$this->logout();
		}
		return $this->isAuthenticated();
	}
	
	function logout() {
		$_SESSION ["authenticated"] = false;
		$model = new DBModel();
		$model->getProperties();
	}
	
	function login() {
		$_SESSION ["authenticated"] = true;
	}
}
?>