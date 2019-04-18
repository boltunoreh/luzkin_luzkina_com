<?php

include ("config_map.php");

$namepoint = $_POST['namepoint'];

if (isset($_POST['namepoint']))       
{
$namepoint = $_POST['namepoint']; 
if ($namepoint == '') 
{
unset($namepoint);
}  
}

if (isset($_POST['countrypoint']))       
{
$countrypoint = $_POST['countrypoint']; 
if ($countrypoint == '') 
{
unset($countrypoint);
}  
}

if (isset($_POST['descriptpoint']))       
{
$descriptpoint = $_POST['descriptpoint']; 
if ($descriptpoint == '') 
{
unset($descriptpoint);
}  
}

$pcoord = $_POST['pcoord'];

$whopoint = $_POST['whopoint'];

$photopoint = $_POST['photopoint']

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Метка добавлена</title>
</head>

<body>

<?php

if (isset($namepoint) && isset($countrypoint) && isset($descriptpoint))
{

echo '<p><strong>Ваша метка добавлена!</strong></p>';

echo '<p><strong>Наименование: </strong>', $namepoint, '<br><img src=\"', $photopoint, '\" alt=\"\" width=\"200\"><strong>Описание: </strong>', $descriptpoint, '<br><strong>Кто был: </strong>', $whopoint, '<br><strong>Координаты: </strong>', $pcoord, '</p>';

$namepoint = htmlspecialchars(trim($namepoint));
$countrypoint = htmlspecialchars(trim($countrypoint));
$descriptpoint = htmlspecialchars(trim($descriptpoint));
$whopoint = htmlspecialchars(trim($whopoint));

$exp_str1 = explode(",", $pcoord);

$coordx = $exp_str1[0];
$coordy = $exp_str1[1];

$sql = "INSERT INTO mappoint VALUES(0, '$namepoint', '$countrypoint', '$descriptpoint', '$coordx', '$coordy', '$photopoint', '$whopoint')";
$result = mysql_query($sql) or die("Ошибочный запрос: " . mysql_error());

header ("Location: ".$_SERVER['HTTP_REFERER']); 
}
		 
else 

{
echo "<p>Вы ввели не всю информацию, поэтому метка не может быть добавлена.</p>";
echo '<p><a href="http://alazankin.alazankina.com/map-adding/"><strong>Вернуться к карте</strong></a></p>';
}

?>


</body>
</html>
