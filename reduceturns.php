<?php
$con = mysql_connect("wendysclaycom.ipagemysql.com","floppybird","floppybird9009!") or die(mysql_error());
$sqlconnect = mysql_select_db("floppybird",$con);
$code = mysql_real_escape_string($_POST['code']);
mysql_query("UPDATE users SET turns = turns - 1 WHERE code = '$code'");
$query = mysql_query("SELECT turns FROM users WHERE code = '$code'");
$turns = mysql_result($query, 0);
mysql_close();
echo $turns;
?>