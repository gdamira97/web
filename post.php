<?php
    $login=$_POST['login'];
    $link=$_POST['link'];
    $organization=$_POST['organization'];
    $price=$_POST['price'];
    $requirements=$_POST['requirements'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    include ("database.php");
    $result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    $id = $myrow['id'];
    $result2 = mysql_query ("INSERT INTO `jobs`(`id`, `organization`, `link`, `price`, `requirements`, `phone`, `email`) VALUES ('$id', '$organization', '$link', '$price','$requirements', '$phone', '$email')");
    if ($result2=='TRUE')
      {
                 header("location: galery.php?page=job");
     }
       else
     {
        echo "Oops.<a href='galery.php?page=postajob'>Back</a>";
     }
?>