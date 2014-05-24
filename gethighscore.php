<?php
$con = mysql_connect("wendysclaycom.ipagemysql.com","floppybird","floppybird9009!") or die(mysql_error());
$sqlconnect = mysql_select_db("floppybird",$con);
$code = mysql_real_escape_string($_POST['code']);
$query = mysql_query("SELECT MAX(score) FROM attempts WHERE userid = 
(
SELECT id FROM users WHERE code = '$code'
)");
$turns = mysql_result($query, 0);
mysql_close();
echo $turns;
?>