<TITLE> Задача 1-3</TITLE>
<body>
<h1>Погудина М.К.</h1><p>
<p><h2>Задача 1-3<p>
8. Найти все целые числа из интервала от N до М, которые можно представить в виде суммы
кубов трех натуральных чисел. N и М – случайные числа
</h2>
<?php
 $N = rand(0,49);
 $M = rand(50,100);
 echo "N = $N <br> M = $M <br> Все целые числа из интервала от N до М, которые можно представить в виде суммы
кубов трех натуральных чисел: <br>";
for ($num=$N; $num <= $M; $num++) {
		for ($i = 1; pow($i, 3) <= $num; $i++) {
    		for ($j = 1; pow($j, 3) <= $num; $j++) {
    			for ($k = 1; pow($k, 3) <= $num; $k++) {
       				if (pow($i, 3) + pow($j, 3) + pow($k, 3) == $num) {
            				$ar[$g]=$num;
            				$g++;
        			}
        		}
    		}
		}
}
print_r (array_unique($ar));
?>
<h2>
5. Определить, можно ли представить данное случайное число N в виде суммы квадратов двух целых чисел (N < 500).
</h2>
<?php
$N = rand(1, 499);
echo 'N = ' . $N . '<br>';
for ($i = 1; pow($i, 2) <= $N; $i++) {
    for ($j = 1; pow($j, 2) <= $N; $j++) {
        if (pow($i, 2) + pow($j, 2) == $N) {
            echo 'Можно представить в виде суммы квадратов ' . $i . '^2 и ' . $j . '^2';
            return true;
        }
    }
}

echo 'Число ' . $N . ' невозможно представить в виде суммы квадратов двух целых чисел';
return false;
?>
</body>