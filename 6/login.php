<?
session_start();
?>
<title> Авторизация </title>
<body align="center">
<form method="post" action="<?php print $PHP_SELF ?>">
<?
//include("check_log.php");
echo "Введите логин:<br><input type='text' name='login' required>";
echo "<br>Введите пароль:<br><input type='password' name='password' required>";
?>
<br><input type='submit' name='sign' value='Вход'>
</form>
</body>
<?
if (isset($_POST["sign"])) {
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 $conn=mysqli_connect("localhost", "a0765723_prop", "prop") or die ("Невозможно
подключиться к серверу"); // установление соединения с сервером
 mysqli_query($conn,'SET NAMES cp1251'); // тип кодировки
 // подключение к базе данных:
 mysqli_select_db($conn,"a0765723_prop") or die ("Нет такой таблицы!");
$result=mysqli_query($conn,"SELECT id, type FROM users WHERE username = '".$_POST['login']."' and password = md5('".$_POST['password']."')");
if (mysqli_affected_rows($conn)>0) {
 $row=mysqli_fetch_array($result);
 $_SESSION['userid'] = $row['id'];
 $_SESSION['type'] = $row['type'];
 echo '<script type="text/javascript">window.open("index.php","_self");</script>';
 exit;
} else { echo "<br>Неверный логин/пароль"; }
}
?>