<?php
class Dictionary
{
	private $connection;

	public function __construct($db)
	{
		$this->connection = $db;
	}

	public function getRussianWords($englishWord)
	{
		$query = "SELECT russian_word FROM dictionary WHERE english_word = :english_word";
		$stmt = $this->connection->prepare($query);
		$stmt->bindParam(':english_word', $englishWord);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_COLUMN);
	}

	public function getEnglishWords($russianWord)
	{
		$query = "SELECT english_word FROM dictionary WHERE russian_word = :russian_word";
		$stmt = $this->connection->prepare($query);
		$stmt->bindParam(':russian_word', $russianWord);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_COLUMN);
	}
}
