<?php
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $login=$_POST['login'];
    $password=$_POST['password'];
    $password = md5($password);
    include ("database.php");
    $result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) 
      {
           exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.<a href='login.php#bottom'>Зарегистрироваться</a>");
       }
    $result2 = mysql_query ("INSERT INTO users (name, surname, login, password) VALUES('$name', '$surname', '$login','$password')");
    if ($result2=='TRUE')
      {
                 header("location:login.php");
     }
       else
     {
        echo "Ошибка! Вы не зарегистрированы.<a href='login.php#bottom'>Зарегистрироваться</a>";
     }
?>