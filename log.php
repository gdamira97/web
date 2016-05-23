<?php
$login=$_POST['login'];
$password=$_POST['password'];
$password = md5($password);
include ("database.php");
$result = mysql_query("SELECT * FROM users WHERE login='$login'",$db); 
$myrow = mysql_fetch_array($result);
if (empty($myrow['id']))
    {
         exit ("Извините, введённый вами логин адрес или пароль неверный. Введите правильные данные. <a href='login.php'>Войти</a>");
    }
else 
   {
        if ($myrow['password']==$password) 
          {
            $id = $myrow['id'];
            if($id == 2){
            session_start();
            $_SESSION['login']=$myrow['login']; 
            $_SESSION['id']=$myrow['id'];
            header("location: adminindex.php");
          }
          else{
            session_start();
            $_SESSION['login']=$myrow['login']; 
            $_SESSION['id']=$myrow['id'];
            $id = $myrow['id'];
            header("location: index.php");
          }
          }
       else
          {
        exit ("Извините, введённый вами E-mail адрес или пароль неверный. Введите правильные данные. <a href='login.php'>Войти</a>");

   }
 }
?>