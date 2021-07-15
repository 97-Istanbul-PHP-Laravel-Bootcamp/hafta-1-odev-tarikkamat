<?php

require_once('settings.config.php');


class User
{
	public function adminLogin($email, $password)
	{
		$password2 = md5($password);
		global $db;
		$query  = $db->query("SELECT * FROM users WHERE (Mail = '$email' OR Username = '$email') AND Pass = '$password2' AND (Auth = '2' OR Auth = '3')", PDO::FETCH_ASSOC);
		$user = $query->fetch(PDO::FETCH_ASSOC);
		if ($say = $query->rowCount()) {
			if ($say > 0) {
				session_start();
				$_SESSION['session'] = true;
				$_SESSION['name'] = $user['Name'];
				$_SESSION['email'] = $user['Mail'];
				$_SESSION['auth'] = $user['Auth'];
				$_SESSION['id'] = $user['Id'];

				return true;
			}
		} else {
			return false;
		}
	}

	public function adminLogout()
	{
		session_start();
		session_destroy();
		session_unset();
		unset($_SESSION['session']);
		header("Location:../index.php");
	}

	public function getUsers()
	{
		global $db;
		$query  = $db->query("SELECT * FROM users");
		$raw = $query->fetchAll(PDO::FETCH_ASSOC);

		return $raw;

	}
	
	public function deleteUser($id)
	{
		global $db;
		$query = $db->query("DELETE FROM users WHERE Id = '$id'");
		if ($query->rowCount() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function editUser($Id,$Username,$Pass,$Auth)
	{
		global $db;
		$query = $db->query("UPDATE users SET Username = '$Username' , Pass = '$Pass' , Auth = '$Auth' WHERE Id = '$Id'");
		if ($query->rowCount() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function getEditUser($id)
	{
		global $db;
		$query = $db->query("SELECT Id,Username,Auth FROM users WHERE Id = '$id' AND (Auth = '2' OR Auth = '1')")->fetch(PDO::FETCH_ASSOC);
		return $query;
	}

	public function addUser($Name,$Surname,$Username,$Pass,$Mail,$Auth)
	{
		global $db;
		$query = $db->prepare('INSERT INTO users (Name,Surname,Username,Pass,Mail,Auth) VALUES(?,?,?,?,?,?)');
		$query->bindParam(1, $Name);
		$query->bindParam(2, $Surname);
		$query->bindParam(3, $Username);
		$query->bindParam(4, $Pass);
		$query->bindParam(5, $Mail);
		$query->bindParam(6, $Auth);
		
		$result = $query->execute();

		return $result;
	}
}
