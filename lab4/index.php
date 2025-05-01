<?php
require_once 'Database.php';
require_once 'Dictionary.php';
require_once 'DictionaryManager.php';

$db = new Database();
$connection = $db->getConnection();

$dictionary = new Dictionary($connection);
$manager = new DictionaryManager($connection);

// Пример добавления слов
// $manager->addWord('hello', 'привет');
// $manager->addWord('world', 'мир');

// Ввод слов пользователем
$inputWord = "привет";

// Функция для поиска слов
function findWords($words, $dictionary)
{
	foreach ($words as $inputWord) {
		if (preg_match('/[а-яА-Я]/u', $inputWord)) {
			// Русское слово
			$englishWords = $dictionary->getEnglishWords(trim($inputWord));
			echo "Английские слова для '$inputWord': " . implode(', ', $englishWords) . "<br>";
		} else {
			// Английское слово
			$russianWords = $dictionary->getRussianWords(trim($inputWord));
			echo "Русские слова для '$inputWord': " . implode(', ', $russianWords) . "<br>";
		}
	}
}

// Ввод слов пользователем (можно заменить на массив)
$inputWords = ['привет', 'hello', 'мир', 'world'];

// Вызов функции
findWords($inputWords, $dictionary);
