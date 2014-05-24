<?php
//Make safe from Andrew
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {die('No Andrew, please stop');}
//Make doubly sure Andrew can't cheat.
$pos = strpos($_SERVER['HTTP_REFERER'],getenv('HTTP_HOST'));
if($pos===false)
  die('GET OFF! THIS IS RESTRICTED!!');

$con = mysql_connect("wendysclaycom.ipagemysql.com","floppybird","floppybird9009!") or die(mysql_error());
$sqlconnect = mysql_select_db("floppybird",$con);
$code = mysql_real_escape_string($_POST['code']);
$score = mysql_real_escape_string($_POST['score']);
date_default_timezone_set('Europe/London');
$adate = date("Y-m-d H:i:s");
mysql_query("INSERT INTO attempts (userid, score, adate) VALUES 
(
(
SELECT id FROM users WHERE code = '$code'
),
'$score', '$adate'
)
;");
mysql_close();
?>