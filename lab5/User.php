<?php
class User
{
	private $connection;

	public function __construct($db)
	{
		$this->connection = $db;
	}

	public function register($username, $password)
	{
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT INTO users (username, password) VALUES (:username, :password)";
		$stmt = $this->connection->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $hashedPassword);
		return $stmt->execute();
	}

	public function login($username, $password)
	{
		$query = "SELECT password FROM users WHERE username = :username";
		$stmt = $this->connection->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($result && password_verify($password, $result['password'])) {
			return true;
		}
		return false;
	}

	public function changePassword($username, $newPassword)
	{
		$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
		$query = "UPDATE users SET password = :password WHERE username = :username";
		$stmt = $this->connection->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $hashedPassword);
		return $stmt->execute();
	}
}
