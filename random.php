<html>
<head>
	<title>42 second code</title>
</head>
<body>
<?php
$hackerrelay = file_get_contents('http://hacker-olympics-london.herokuapp.com/leaderboard.json');
var_dump($hackerrelay);
$hackerrelay = json_decode($hackerrelay, true);

?>
<br><br>
<?php
var_dump($hackerrelay['1']['name']);
?>
<br><br>

<table>
	<tr>
		<td>name</td>
		<td>score</td>
	</td>
<?php
$i=0;
while($i<10) {
$i++;
?>

	<tr>
		<td><?php echo $hackerrelay[$i]['name'];?></td>
		<td><?php echo $hackerrelay[$i]['points'];?></td>
	</td>
<?php
}
?>
</table>
</body>
</html>