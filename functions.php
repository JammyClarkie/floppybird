<? 
function rand_string( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);
}

function sendMail($useremail, $adminemail, $testmode, $randompassword, $firstname, $surname, $verificationnumber) {
	$firstname = stripslashes($firstname);
	$surname = stripslashes($surname);
	$subject = "Floppy Code";
	
	if($testmode) {
		$to = "jclark@enhanced.co.uk"; //for testing.
		$from = "no-reply@jonclark.me";
		$message = "
		<html>
			<head>
				<title>Verify Your Email</title>
			</head>
			<body>
				<p>Hello ".$firstname." ".$surname.",
				<p>You have been sent this email because you have been assigned an account on <a href='".$serverhost."'>Jaguar Espresso</a></p>
				<p>".$verifylink."</p>
				<p>Your user name is your email address.</p>
				<p>Your password is <b>".$randompassword."</b> - You should change this as soon as you login.</p>
			</body>
		</html>
		";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From:" . $from;
	} else {
		$to = $useremail;
		$from = "no-reply@jaguarespresso.co.uk";
		$message = "
		<html>
			<head>
				<title>Floppy Code</title>
			</head>
			<body>
				<p>Hello ".$firstname." ".$surname.",
				<p>You have been sent this email because you have been assigned an account on <a href='".$serverhost."'>Jaguar Espresso</a></p>
				<p>".$verifylink."</p>
				<p>Your user name is your email address.</p>
				<p>Your password is <b>".$randompassword."</b> - You should change this as soon as you login.</p>
			</body>
		</html>
		";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From:" . $from;
	}
	

	//problem in that an html email gets put in junk folder, but can't have a link without html.
	//might be fixed be sending mail from jaguarespresso.co.uk
	mail($to,$subject,$message,$headers);
}

function db_fetchall($foo,$table,$bar,$value){
	#select foo from table where bar = value
	$rlt = mysql_query("select ". $foo ." from " . $table . " where " . $bar . " = '" . $value . "'");
	$i=0;
	while($result = mysql_fetch_assoc($rlt)) {

		$row[$i] = $result;
		$i++;
	}
	return $row;
	$i=0;
}

function db_fetchall2($foo,$table){
	#select foo from table where bar = value
	$rlt = mysql_query("select ". $foo ." from " . $table);
	$i=0;
	while($result = mysql_fetch_assoc($rlt)) {
		$row[$i] = $result;
		$i++;
	}
	return $row;
	$i=0;
}

function db_fetchone($foo,$table,$bar,$value){
	#select foo from table where bar = value
	$rlt = mysql_query("select ". $foo ." from " . $table . " where " . $bar . " = '" . $value . "'");
	$result = mysql_fetch_assoc($rlt);
	return $result;
}

function db_fetchall_order($foo,$table,$bar,$value,$ordervalue,$direction){
	#select foo from table where bar = value
	$rlt = mysql_query("select ". $foo ." from " . $table . " where " . $bar . " = '" . $value . "'" . " ORDER BY " . $ordervalue  . " " . $direction);
	$i=0;
	while($result = mysql_fetch_assoc($rlt)) {

		$row[$i] = $result;
		$i++;
	}
	return $row;
	$i=0;
}

function db_fetchall_order2($foo,$table,$bar,$value,$bar2,$value2,$ordervalue,$direction){
	#select foo from table where bar = value
	$rlt = mysql_query("select ". $foo ." from " . $table . " where " . $bar . " = '" . $value . "'" . " and " . $bar2 . " = '" . $value2 . "'" . " ORDER BY " . $ordervalue  . " " . $direction);
	$i=0;
	while($result = mysql_fetch_assoc($rlt)) {

		$row[$i] = $result;
		$i++;
	}
	return $row;
	$i=0;
}

function db_fetchall_order3($foo,$table,$bar,$value,$bar2,$value2,$bar3,$value3,$ordervalue,$direction){
	#select foo from table where bar = value
	$rlt = mysql_query("select ". $foo ." from " . $table . " where " . $bar . " = '" . $value . "'" . " and " . $bar2 . " = '" . $value2 . "'" . " and " . $bar3 . " = '" . $value4 . "'" . " ORDER BY " . $ordervalue  . " " . $direction);
	$i=0;
	while($result = mysql_fetch_assoc($rlt)) {

		$row[$i] = $result;
		$i++;
	}
	return $row;
	$i=0;
}

function deletefromdatabase($table,$foo,$value){
	mysql_query("DELETE FROM " . $table ." WHERE ". $foo . " = '" . $value . "'");
}

?>