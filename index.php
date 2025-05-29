<html>

<head>
  <title>Lab 0</title>
</head>

<body>
  <main>
    <?php
    // 8. Квадраты чисел
    $nums = [2, 3, 5];
    foreach ($nums as $n) {
      echo "$n^2 = " . ($n * $n) . "<br>";
    }
    echo "<br>";

    // 9. Сумма цифр числа
    $num = 12345;
    echo "Сумма цифр: " . array_sum(str_split($num)) . "<br>";
    echo "<br>";

    // 10. Сумма чисел, делящихся на 5 (от 1 до 50)
    $sum = 0;
    for ($i = 1; $i <= 50; $i++) {
      if ($i % 5 == 0)
        $sum += $i;
    }
    echo "Сумма чисел, делящихся на 5: $sum<br>";
    echo "<br>";

    // 11. Кол-во вхождений цифры 3 в числе
    $count = substr_count((string) 3332333, '3');
    echo "Цифра 3 встречается $count раз<br>";
    echo "<br>";

    // 12. Проверка на високосный год
    $year = 2024;
    echo ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0)) ? "$year - високосный год<br>" : "$year - не високосный<br>";
    echo "<br>";
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

<?php

