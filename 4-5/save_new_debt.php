<? session_start(); include("check_log.php");
 // Подключение к базе данных:
 $conn=mysqli_connect("localhost", "a0765723_prop", "prop") or die ("Невозможно
подключиться к серверу"); // установление соединения с сервером

 mysqli_query($conn,'SET NAMES cp1251'); // тип кодировки
 // подключение к базе данных:
mysqli_select_db($conn,"a0765723_prop") or die ("Нет такой таблицы!");
 // Строка запроса на добавление записи в таблицу:
 
 $sql_add = "INSERT INTO debtors SET id_mate='".$_GET['d']."', debt='".$_GET['debt']."'";
 mysqli_query($conn,$sql_add); // Выполнение запроса
 if (mysqli_affected_rows($conn)>0) // если нет ошибок при выполнении запроса
 { print "<p> Информация внесена в базу данных.";

 print "<p><a href=\"index.php\"> Вернуться к списку недвижимости </a>"; }
 else { print "Ошибка сохранения. <a href=\"index.php\">
Вернуться к списку недвижимости </a>"; }
?>
