<?php
require_once 'autoload.php';

class DBModel {
	function getConnection() {
		$conn = @new mysqli ( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE );
		if (isset ($conn) && $conn->connect_error) {
			throw new Exception($conn->connect_error, 200);
		}
		return $conn;
	}
	function getProperties() {
		$res = array();
		$conn = $this->getConnection();
		$sql = "SELECT * FROM conf";
		$result = $conn->query ( $sql );
		if (!$result) {
			$conn->close ();
		} else if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$currProp = new PropertyDTO($row["key"], $row["value"]);
				array_push($res, $currProp);
			}
			return $res;
		} else {
			$conn->close ();
			return null;
		}
	}
	
	
	function searchById($socialId, $sn) {
		$conn = $this->getConnection ();
		$sql = "SELECT * FROM user WHERE user.socialId = " . $socialId . " AND user.socialNetwork like '" . $sn . "'";
		$result = $conn->query ( $sql );
		if (!$result) {
			throw new Exception("Impossible search by ID " . $socialId . "Query: " . $sql, 200);
		} else if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$currUser = new DBUser($row["socialId"], $row["name"], $row["email"], $row["lat"], $row["lng"], $row["description"], $row["socialPageUrl"], $row["avatarUrl"], $row["timestamp"], $row["socialNetwork"]);
			$conn->close ();
			return $currUser;
		} else {
			return null;
		}
	}
	
	function addProperty ($key, $value) {
		$result = $this->countUsers();
		$result = $result + $num;
		$conn = $this->getConnection ();
		$sql = "UPDATE members SET total = '$result' WHERE 1";
		if ($conn->query ( $sql ) === FALSE) {
			$error = $conn->error;
			$conn->close ();
			throw new Exception ( "Error insert user " . $dbData->socialId, 200 );
		}
		return $result;
		$conn->close ();
	}
	
	
	static function escapeUrl($conn, $url) {
		$urlEscaped = $url;
		$urlEscaped = urlencode ( $urlEscaped );
		$urlEscaped = $conn->real_escape_string ( $urlEscaped );
		return $urlEscaped;
	}
	
	function updateUser(DBUser $dbData) {
		if (!$this->isUserRegistered ( $dbData->socialId, $dbData->socialNetwork )) {
			throw new Exception ( "Error User Not Registered " . $dbData->socialId, 200 );
		}
		$conn = $this->getConnection ();
		$avatUrl = DBModel::escapeUrl ( $conn, $dbData->avatarUrl );
		$profileUrl = DBModel::escapeUrl ( $conn, $dbData->socialPageUrl );
// 		$sql = "UPDATE user SET description = '$dbData->description', lat = '$dbData->latitude', lng = '$dbData->longitude' WHERE socialId = '$dbData->socialId' AND socialNetwork like '$dbData->socialNetwork'";
		$sql = "UPDATE user SET description = '$dbData->description', lat = '$dbData->latitude', lng = '$dbData->longitude', location = GeomFromText('POINT($dbData->latitude $dbData->longitude)') WHERE socialId = '$dbData->socialId' AND socialNetwork like '$dbData->socialNetwork'";
		if ($conn->query ( $sql ) === FALSE) {
			$error = $conn->error;
			$conn->close ();
			throw new Exception ( "Error update User " . $dbData->socialId, 200 );
		}
		$conn->close ();
	}
}

?>
