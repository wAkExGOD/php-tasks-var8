<?php
function power($x, $y)
{
	if ($x <= 0 && $y <= 0) {
		throw new InvalidArgumentException("x должно быть больше 0 или y должно быть больше 0.");
	}
	return exp($y * log($x));
}

// Примеры использования функции
$x = 2;
$y = 3;
$result = power($x, $y);
echo "Результат {$x}^{$y} = {$result}\n";
echo "<br>";

// Другие примеры
$x = 5;
$y = 0.5;
$result = power($x, $y);
echo "Результат {$x}^{$y} = {$result}\n";
