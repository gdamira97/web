<?php
$id = $_GET['id'];
include("database.php");
$query = "SELECT * FROM users WHERE id = $id";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
if($row['blocked'] == 0){
	$up = "UPDATE users SET `blocked`= 1 WHERE id=$id";
}
else{
	$up = "UPDATE users SET `blocked`= 0 WHERE id=$id";
}
mysql_query($up);
header("location:adminindex.php?page=$id");
?>