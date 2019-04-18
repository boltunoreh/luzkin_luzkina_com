<?php

$ym_sdb_name = "localhost";
$ym_user_name = "046757133_alal";
$ym_user_password = "izizfuidmu";
$ym_db_name = "alazankin_alazankin";
 
// соединение с сервером базы данных
if(!$ym_link = mysql_connect($ym_sdb_name, $ym_user_name, $ym_user_password))
{
  echo "<br>Не могу соединиться с сервером базы данных<br>";
  exit();
}
 
// выбираем базу данных
if(!mysql_select_db($ym_db_name, $ym_link))
{
  echo "<br>Не могу выбрать базу данных<br>";
  exit();
}
 
mysql_query('SET NAMES utf8');

?>
