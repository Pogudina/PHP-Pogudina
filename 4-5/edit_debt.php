<? session_start(); include("check_log.php");?>
<html>
<head>
<title> Редактирование данных о должнике </title>
</head>
<meta charset="utf-8">
<body>
<?php
 $conn=mysqli_connect("localhost", "a0765723_prop", "prop") or die ("Невозможно
подключиться к серверу"); // установление соединения с сервером

 mysqli_query($conn,'SET NAMES cp1251'); // тип кодировки
 // подключение к базе данных:
mysqli_select_db($conn,"a0765723_prop") or die ("Нет такой таблицы!");
$rows=mysqli_query($conn, "SELECT * FROM debtors WHERE id_deb='".$_GET['id']."'");
 while ($st=mysqli_fetch_array($rows)) {
 $id = $st['id_deb'];
 $id_mate = $st['id_mate'];
 $debt = iconv("cp1251", "utf-8", $st['debt']);
 }
print "<form action='save_edit_debt.php' method='get'>";
print "ID жильца:";
echo '<select name="d">';

$result=mysqli_query($conn,"SELECT * FROM debtors LEFT JOIN housemates ON (debtors.id_mate=housemates.id_mate)");

while ($st2=mysqli_fetch_array($result)) {
echo  '<option ';
if ($st2['id_mate']==$_GET['id']){ echo 'selected '; }

echo 'value='.$st2['id_deb'].'>'.iconv("cp1251", "utf-8", $st2['id_mate']).' - '.iconv("cp1251", "utf-8", $st2['fullname']).'</option>';
 }
echo '</select>';

print "<br>Долг: <input name='debt' size='20' type='text'
value='".$debt."'>";
print "<input type='hidden' name='id' 
value='".$id."'>";
print "<br><input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку недвижимости </a>";
?>
</body>
</html>