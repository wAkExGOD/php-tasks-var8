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
