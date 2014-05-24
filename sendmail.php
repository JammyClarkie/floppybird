<?php
$con = mysql_connect("wendysclaycom.ipagemysql.com","floppybird","floppybird9009!") or die(mysql_error());
$sqlconnect = mysql_select_db("floppybird",$con);

$query = mysql_query("SELECT * FROM users WHERE turns = '3'");
if(mysql_num_rows($query) > 0) {
	while ($row = mysql_fetch_assoc($query)) {
		$code = $row['code'];
		$email = $row['email'];
		$firstname = $row['firstname'];
		sendMail($email, $code, $firstname);
	}
}

function sendMail($useremail, $code, $firstname) {
	//$serverhost = 'http://'.$_SERVER['HTTP_HOST'].'/cart.php';
	//can't use the above, since the php script is called from cron job stand alone, not from the website url.
	$subject = "Boo Charity - Floppy Bird Bonanza";
	//$to = $useremail;
	//$from = $adminemail; if not a @jaguarespresso.co.uk email then it will most likely land in junk.
	$to = $useremail;
	$from = "no-reply@jonclark.me";
	$indexurl = "http://www.jonclark.me/floppybird/index.html";
	$message = "
	<html>
	<head>
	<title>Floppy Bird</title>
	</head>
	<body>
	<p>Hi $firstname,
	<p>Your code is: $code  you STILL have THREE FREE TRIES on this code, where you can win either £5 or £10 at no expense!  If you would like to submit extra entries, it is £1 for 3 attempts.  Visit the website <a href='$indexurl'>here</a>.  Please <a href='http://nebez.github.io/floppybird/'>test</a> the game before attempting - you will need a fairly high spec pc/mobile and a proper browser - see the IAQ on the floppybird homepage for more info.</p>
	<p>Kind Regards,</p>
	<p>Jon Clark</p>
	<a href='$indexurl'><p>www.jonclark.me/floppybird/index.html</p></a>
	</body>
	</html>
	";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From:" . $from;
	mail($to,$subject,$message,$headers);
	echo "Email sent to: ".$to."<br>";
}
?>