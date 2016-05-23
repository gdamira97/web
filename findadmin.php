<?php
$value = $_POST['value'];
include("database.php");
$query = "SELECT * FROM users WHERE name = '$value'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$id = $row['id'];
header("location:adminindex.php?page=$id");
?>