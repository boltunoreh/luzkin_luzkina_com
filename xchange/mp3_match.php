<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  </head>
  <body>
<?php
$text = $_POST['preg_text'];

preg_match_all("/(?<=false\">)(.*)(?=<\/a>)/ui", $text, $result1);
preg_match_all("/(?<=class=\"title\">)(.*)(?=<\/span>)/ui", $text, $result2);
preg_match_all("/(http\S*mp3)/ui", $text, $result3);



for ($i=0; $i<count($result1[1]); $i++) { 
  echo $result1[1][$i]." - ".$result2[1][$i]."&nbsp;<a href=\"".$result3[1][$i]."\">download</a><br />";
}

?>
                                                                                                                                                                                                 
  </body>
</html>