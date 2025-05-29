<html>

<head>
	<title>Lab 4</title>
</head>

<body>
	<main>
		<h3>4.8. Словарь. В БД хранится англо-русский словарь, в котором для одного английского слова может быть указано
			несколько его значений и наоборот. Со стороны клиента вводятся последовательно английские (русские) слова. Для
			каждого из них выведите на консоль все русские (английские) значения слова.</h3>
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
		?>
	</main>
	<footer>
		<hr />
		<div>
			<p>Выполнил: Панасик Владислав</p>
			<p>
				Дата и время:
				<?
				date_default_timezone_set('Europe/Moscow');
				echo date('Y-m-d H:i:s');
				?>
			</p>
		</div>
	</footer>
</body>

</html>