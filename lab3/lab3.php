<html>

<head>
	<title>Lab 3</title>
</head>

<body>
	<main>
		<h3>Поздравления. По заданному списку фамилий напечатайте каждому упомянутому в списке поздравление к определенному
			празднику. Чтобы избежать шаблона, перечень желаемых благ выбирать как случайное подмно¬жество из заготовленного
			списка (например, здоровья, счастья, продвижения по службе, долголетия и т. д.). Можно сделать переменными и
			название праздника - для универсальности про¬граммы.</h3>
		<?php
		class Congratulations
		{
			private $holiday;
			private $wishes;

			public function __construct($holiday, $wishes)
			{
				$this->holiday = $holiday;
				$this->wishes = $wishes;
			}

			public function createMessage($name)
			{
				$randomWishes = array_rand(array_flip($this->wishes), 2); // выбираем 2 случайных пожелания
				$message = "Дорогой $name! С праздником $this->holiday! Желаем " . implode(', ', $randomWishes) . ".";
				return $message;
			}
		}

		// Чтение фамилий из файла
		$filename = 'names.txt'; // Имя файла с фамилиями
		$holiday = 'День Рождения'; // Название праздника
		$wishes = ['здоровья', 'счастья', 'успехов', 'долголетия', 'любви', 'радости', 'продвижения по службе'];

		if (file_exists($filename)) {
			$names = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			$congratulator = new Congratulations($holiday, $wishes);

			foreach ($names as $name) {
				echo $congratulator->createMessage(trim($name)) . "<br>";
			}
		} else {
			echo "Файл с фамилиями не найден.";
		}
		?>
	</main>
	<footer>
		<hr />
		<div>
			Выполнил: Панасик Владислав
			Дата и время:
			<?
			date_default_timezone_set('Europe/Moscow');
			echo date('Y-m-d H:i:s');
			?>
		</div>
	</footer>
</body>

</html>