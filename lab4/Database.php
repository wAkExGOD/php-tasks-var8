<?php
class Database
{
	private $host = 'MySQL-8.0';
	private $db_name = 'student';
	private $username = 'root';
	private $password = '';
	public $connection;

	public function getConnection()
	{
		$this->connection = null;
		try {
			$this->connection = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $exception) {
			echo "Connection error: " . $exception->getMessage();
		}
		return $this->connection;
	}
}
