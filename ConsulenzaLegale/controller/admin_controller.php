<?php
class AdminController {
	function areValidCredential($username, $password) {
		if ($username==ADMIN_USER && $password == ADMIN_PWD) {
			return true;
		}
		return false;
	}
}
?>