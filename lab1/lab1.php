<html>

<head>
  <title>Lab 1</title>
</head>

<body>
  <main>
    <h3>В прямоугольной матрице разделите все ее элементы на наибольшую сумму модулей элементов в строке</h3>
    <?php
    function divideMatrixByMaxRowSum($matrix)
    {
      // Находим максимальную сумму модулей элементов в строках
      $maxRowSum = 0;

      foreach ($matrix as $row) {
        $rowSum = array_sum(array_map('abs', $row));
        if ($rowSum > $maxRowSum) {
          $maxRowSum = $rowSum;
        }
      }

      // Делим все элементы матрицы на найденную максимальную сумму
      foreach ($matrix as &$row) {
        foreach ($row as &$element) {
          $element = round($element / $maxRowSum, 2);
        }
      }

      return $matrix;
    }

    function printMatrix($matrix, $title)
    {
      echo "<h3>$title</h3>";
      echo "<table border='1' style='border-collapse: collapse;'>";
      foreach ($matrix as $row) {
        echo "<tr>";
        foreach ($row as $element) {
          echo "<td style='padding: 10px; text-align: center;'>$element</td>";
        }
        echo "</tr>";
      }
      echo "</table><br>";
    }

    // Пример матрицы
    $matrix = [
      [1, -2, 3],
      [-4, 5, -6],
      [7, 8, -9]
    ];

    // Вывод первоначальной матрицы
    printMatrix($matrix, "Первоначальная матрица");

    // Выполняем функцию
    $result = divideMatrixByMaxRowSum($matrix);

    // Вывод итоговой матрицы
    printMatrix($result, "Итоговая матрица");
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