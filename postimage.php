<?php
$login = $_POST['login'];
$image = $_POST['image'];
$description = $_POST['description'];
include("database.php");
$show = "SELECT * FROM users WHERE login = '$login'";
$showresult = mysql_query($show);
$row = mysql_fetch_array($showresult);
$id = $row['id'];
$query = "INSERT INTO design (id, image, description) VALUES ('$id', '$image', '$description')";
$result = mysql_query($query);
header("location:index.php");
?>