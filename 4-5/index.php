<? session_start(); include("check_log.php");?>
<html>
<meta charset="utf-8">
<head> <title> Недвижимость </title> </head>
<body>
<?
 $conn=mysqli_connect("localhost", "a0765723_prop", "prop") or die ("Невозможно
подключиться к серверу"); // установление соединения с сервером
 mysqli_query($conn,'SET NAMES cp1251'); // тип кодировки
 // подключение к базе данных:
 mysqli_select_db($conn,"a0765723_prop") or die ("Нет такой таблицы!");
?>

<h2>Дома:</h2>
<table border="1">
<tr> 
 <th> Адрес </th> <th> Тип дома </th> <th> Метраж (кв. м.) </th> <th> Количество комнат </th> <th> Стоимость </th>
 <th> Редактировать </th> <th> Уничтожить </th> 
 </tr>
<?php
$result=mysqli_query($conn,"SELECT id, address, type, area, rooms, cost
FROM property"); // запрос на выборку сведений о пользователях
while($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo ("<td>" . iconv("cp1251", "utf-8", $row['address']) . "</td>");
 echo ("<td>" . iconv("cp1251", "utf-8", $row['type']) . "</td>");
 echo ("<td>" . iconv("cp1251", "utf-8", $row['area']) . "</td>");
 echo ("<td>" . iconv("cp1251", "utf-8", $row['rooms']) . "</td>");
 echo ("<td>" . iconv("cp1251", "utf-8", $row['cost']) . "</td>");
 echo "<td><a href='edit.php?id=" . $row['id']. "'>Редактировать</a></td>";
echo "<td><a href='delete.php?id=" . $row['id']. "'>Уничтожить</a></td>";
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего домов: $num_rows </p>");
?>
<p> <a href="new.php"> Добавить дом </a>
<hr>
<h2>Жильцы:</h2>
<table border="1">
<tr> 
 <th> Имя </th> <th> Год рождения </th> <th> ID дома </th>
 <th> Редактировать </th> <th> Уничтожить </th> 
 </tr>
<?php
$result=mysqli_query($conn,"SELECT * FROM housemates LEFT JOIN property ON (housemates.id_house=property.id)"); // запрос на выборку сведений о пользователях
while($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo ("<td>" . iconv("cp1251", "utf-8", $row['fullname']) . "</td>");
 echo ("<td>" . iconv("cp1251", "utf-8", $row['birthdate']) . "</td>");
 echo ("<td>id" . iconv("cp1251", "utf-8", $row['id_house']) . ' - ' . iconv("cp1251", "utf-8", $row['address']). "</td>");
 echo "<td><a href='edit_mate.php?id=" . $row['id_mate']. "'>Редактировать</a></td>";
 echo "<td><a href='delete_mate.php?id=" . $row['id_mate']. "'>Уничтожить</a></td>"; 
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего жильцов: $num_rows </p>");
?>
<p> <a href="new_mate.php"> Добавить жильца </a>
<hr>
<h2>Должники:</h2>
<table border="1">
<tr> 
 <th> ID жильца </th> <th> Долг </th>
 <th> Редактировать </th><th> Уничтожить </th> 
 </tr>
<?php
$result=mysqli_query($conn,"SELECT * FROM debtors LEFT JOIN housemates ON (debtors.id_mate=housemates.id_mate)"); 
while($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo ("<td>id" . iconv("cp1251", "utf-8", $row['id_mate']) . ' - '. iconv("cp1251", "utf-8", $row['fullname']) . "</td>");
 echo ("<td>" . iconv("cp1251", "utf-8", $row['debt']) . "</td>");
 echo "<td><a href='edit_debt.php?id=" . $row['id_deb']. "'>Редактировать</a></td>";
 echo "<td><a href='delete_debt.php?id=" . $row['id_deb']. "'>Уничтожить</a></td>"; 
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего должников: $num_rows </p>");
?>
<p> <a href="new_debt.php"> Добавить должника </a>
<h2><hr></h2> 
<a href="inf_pdf.php"> Выгрузить данные в PDF </a>
<p> <a href="inf_xls.php"> Выгрузить данные в Excel </a>
</body> 
</html>
