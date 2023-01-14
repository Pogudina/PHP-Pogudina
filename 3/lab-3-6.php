<?php
//1
$string=$_POST["text1"];
$arr = array ();
$strlen = mb_strlen ($string);
while ($strlen) {
$arr[] = mb_substr ($string, 0, 1);
$string = mb_substr ($string, 1, $strlen);
$strlen = mb_strlen ($string);
}
for ($i = 0; $i <= (count($arr)-1); $i++) {
echo $arr[$i];
    if (($i+1)%3==0) {
        echo "Е";
    }
}
//2
if (isset($_POST["secondButton"])) {

echo "Исходное текст: <br> ".$_POST["text2"]."<br>";
echo "Преобразованный текст: <br>";
$out_string=strtr($_POST["text2"], array("<i>" => "<курсив>", "<I>" => "<курсив>", "</i>" => "<конец курсива>", "</I>" => "<конец курсива>"));
 echo $out_string;   
}

//3
if (isset($_POST["thirdButton"])) {
    $d=stristr($_POST["text3"], '@');
    echo $_POST["text3"]."<br>";
    if(($d) === FALSE) {
    echo 'В электронном адресе не встречается символ "@", введите электронный адрес заново';
  }else{
    echo 'Вcё верно';
  }
}
?>