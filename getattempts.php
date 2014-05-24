<?php
$con = mysql_connect("wendysclaycom.ipagemysql.com","floppybird","floppybird9009!") or die(mysql_error());
$sqlconnect = mysql_select_db("floppybird",$con);
$query = mysql_query("SELECT users.firstname, users.surname, score, adate FROM attempts LEFT JOIN users ON attempts.userid = users.id ORDER BY adate DESC LIMIT 10");
?>
<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Score</th>
			<th>Attempted</th>
		</tr>
	</thead>
	<tbody>
<?php
$i=0;
while($row = mysql_fetch_assoc($query)) {
	$i++;
?>
		<tr>
			<td><?php echo $row["firstname"] . " " . $row["surname"];?></td>
			<td><?php echo $row["score"];?></td>
			<td><?php echo $row["adate"];?></td>
		</tr>
<?php
}
?>
	</tbody>
</table>
<?php
mysql_close();
?>