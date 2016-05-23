<?php
session_start();
session_unset();
session_destroy();
?>
<html>
<head>
	<title>Log in</title> 
	<link rel="stylesheet" type="text/css" href="mycss.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="background: url('landscapesvideo.mp4');">
	<video autoplay loop muted class="bgvideo">
		<source src="landscapesvideo.mp4" type="video/mp4"></source>
	</video>
		<div class="h">
			<h1>Log in</h1>
			<p>Not registrated yet? <a href="#bottom" id="top">Sign in</a></p>
			<form name="login" action="log.php" method="post" target="_self" onsubmit="return validateForm1()">
				<input type="text" class="f" name="login" placeholder="login" required>
				<input type="password" class="f" name="password" placeholder="password" required>
				<button type="submit" class="d">Login</button>
			</form>
		</div>
		<div class="x">
			<h1>Sign in</h1>
			<form  name="registration" action="users.php" method="post" target="_self" onsubmit="return validateForm2()">
				<input type="text" class="f" name="name" placeholder="name" required>
				<input type="text" class="f" name="surname" placeholder="surname" required>
				<input type="text" class="f" name="login" placeholder="login" required>
				<input type="password" class="f" name="password" placeholder="password" required>
				<button type="submit" class="d">Send</button>
			</form>
			<p id="bottom"></p>
		</div>
		<script src="jquery-1.12.3.min.js"></script>
		<script>
		$('a[href^="#bottom"]').on('click', function(event) {

    var target = $( $(this).attr('href') );

    if( target.length ) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top
        }, 1000);
    }
});
		function validateForm1() {
    var x = document.forms["login"]["login"].value;
    var y = document.forms["login"]["password"].value;
    if (x == null || x == "" || y == null || y == "") {
        alert("Forms must be filled out");
        return false;
    }
}

function validateForm2() {
    var a = document.forms["registration"]["name"].value;
    var b = document.forms["registration"]["surname"].value;
    var c = document.forms["registration"]["login"].value;
    var d = document.forms["registration"]["password"].value;
    if (a == null || a == "" || b == null || b == "" || c == null || c == "" || d == null || d == "") {
        alert("Forms must be filled out");
        return false;
    }
}
		</script>
</body>
</html>