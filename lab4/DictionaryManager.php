<?php
class DictionaryManager
{
	private $connection;

	public function __construct($db)
	{
		$this->connection = $db;
	}

	public function addWord($englishWord, $russianWord)
	{
		$query = "INSERT INTO dictionary (english_word, russian_word) VALUES (:english_word, :russian_word)";
		$stmt = $this->connection->prepare($query);
		$stmt->bindParam(':english_word', $englishWord);
		$stmt->bindParam(':russian_word', $russianWord);
		return $stmt->execute();
	}
}
