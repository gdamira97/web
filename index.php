<?php
session_start();
if(isset($_SESSION['login'])){
  ?>
<html>
<head>
	<title>MID</title> 
	<link rel="stylesheet" type="text/css" href="indexcss.css">
  <link rel="stylesheet" type="text/css" href="pro.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<div class="bgimage"><img src="back.jpg" class="bgimage"></div>
	    <div class="a">
	    <ul>
		<li><a href="index.php?page=index">Home</a></li>
    <li><a href="index.php?page=post">Post</a></li>
    <li><a href="index.php?page=job">Jobs</a></li>
    <button type="button" class="but" onclick="location.href='index.php?page=postajob'">Post a Job</button>
        <ul style="float:right;list-style-type:none;">
          <li><form name="search" id="search" action="find.php" method="post" target="_self">
          <input type="text" id="ajax" name="value" list="json-datalist" placeholder="Search"> 
          <datalist id="json-datalist">
          	<?php
          	include("database.php");
          	$query = "SELECT * FROM users";
          	$result = mysql_query($query);
          	$num = mysql_num_rows($result);
          	for($i=0;$i<=$num;$i++){
          		$row = mysql_fetch_array($result);
          		?>
          		<option value="<?= $row['name'] ?>">
          			<?php
          		}
          		?>
          		</datalist>
            </form></li>
            <li><a href="login.php">Log out</a></li>
        </ul>
	</ul>
</div>
<?php
if(isset($_GET['page'])){
	$page = $_GET['page'];
if($page == "index"){
	?>
	<div id="wrapping">
      <center><div class="slider">
  <ul>
    <li>
      <img src="a.jpg" />
      <div class="content"><span>Material Design</span></div>
    </li>
    <li>
      <img src="d.jpg" />
      <div class="content"><span>Material Design</span></div>
    </li>
    <li>
      <img src="c.jpg" />
      <div class="content"><span>Material Design</span></div>
    </li>
  </ul>
  <button class="prev">prev</button>
  <button class="next">next</button>
</div></center>
    <article>
      <div class="carousel">  
        <?php
        include("database.php");
        $query = "SELECT * FROM design";
        $result = mysql_query($query);
        $num = mysql_num_rows($result);
        for($i=0;$i<$num;$i++){
          $row = mysql_fetch_array($result);
          $image = $row['image'];
          $id = $row['id'];
          $userid = $row['userid'];
          $usequery = "SELECT * FROM users WHERE id = $userid";
          $use = mysql_query($usequery);
          $mynum = mysql_num_rows($use);
          for($j=0;$j<$mynum;$j++){
            $myrow = mysql_fetch_array($use);

          if(isset($_COOKIE["like"])){
          $like = json_decode($_COOKIE["like"]);
        }
        else{ $like = []; }
        if($myrow['blocked']==0){
          ?>

          <div class="im"> 
          <img src="<?= $image ?>" class="image"> 
          <div class="user"><a href="index.php?page=<?= $myrow['id'] ?>"><img src="<?= $myrow['profile'] ?>"><span><?= $myrow['name']." ".$myrow['surname'] ?></span></a><a href="like.php?id=<?= $row['id'] ?>" class = "fav">
            <?php
                if(in_array($row["id"], $like)){
                  ?><img src="liked.png" class="like">
                <?php
                }
                else{
                  ?><img src="notliked.png" class="like">
                  <?php
                }
                ?>
              </a>
          </div>        
        </div>
        <?php
      }
      }
    }
        ?>
      </div>
    </article>
  </div>
	<?php
}
else if($page == "post"){
  ?>
  <div id="wrappingimage">
    <center><div class="slider">
  <ul>
    <li>
      <img src="a.jpg" />
      <div class="content"><span>Material Design</span></div>
    </li>
    <li>
      <img src="d.jpg" />
      <div class="content"><span>Material Design</span></div>
    </li>
    <li>
      <img src="c.jpg" />
      <div class="content"><span>Material Design</span></div>
    </li>
  </ul>
  <button class="prev">prev</button>
  <button class="next">next</button>
</div></center>
      <div class="ximage">
      <form name="postimage" action="postimage.php" method="post" target="_self" onsubmit="return validateForm1()">
        <input type="text" class="f" name="login" placeholder="login">
        <input type="file" class="f" name="image">
        <textarea rows="4" cols="50" class="big" name="description" placeholder="description"></textarea>
        <button type="submit" class="d" value="login">Post</button>
      </form>
    </div>
    </div>
    <?php
}
else if($page == "job"){
	?>
	<div id="wrappingjob">
  </br>
  <center><h1>Jobs</h1></center>
  <?php
  include("database.php");
  $query = "SELECT * FROM jobs";
  $result = mysql_query($query);
  $num = mysql_num_rows($result);
  for($i=0;$i<$num;$i++){
  	$row = mysql_fetch_array($result);
  ?>
	  <div class="card">
    <div class="images">
      <img src="user1.jpg" width=150 height=150/>
    </div>
    <div class="description">
      <a href='<?= $row['link'] ?>' class="link"><?= $row['organization'] ?></a>
    <div>
  </div>
  <div class="attribute">
      Price: <?= $row['price'] ?>
  </div>
  <div class="attribute">
      Requirements: <?= $row['requirements'] ?>
  </div>
  <div class="attribute">
      Phone:<a href="<?= $row['link'] ?>"><?= $row['phone'] ?></a>
  </div>
    <div class="attribute">
      Email:<a href="<?= $row['link'] ?>"><?= $row['email'] ?></a>
    </div>
</div>
</div>
<?php
}
?>
</br>
</div>
<?php
}
else if($page == "postajob"){
	?>
	<div id="wrappingpost">
    	<img src="b.jpg" class="b">
    	<div class="xjob">
			<h1>Information</h1>
			<form name="post" action="post.php" method="post" target="_self" onsubmit="return validateForm2()">
				<input type="text" class="f" name="login" placeholder="login">
				<input type="text" class="f" name="organization" placeholder="organization">
				<input type="text" class="f" name="link" placeholder="link">
				<input type="text" class="f" name="price" placeholder="price">
				<textarea rows="4" cols="50" class="big" name="requirements" placeholder="requirements"></textarea>
				<input type="text" class="f" name="phone" placeholder="phone">
				<input type="text" class="f" name="email" placeholder="E-mail">
				<button type="submit" class="d" value="login">Post</button>
			</form>
		</div>
    </div>
	<?php
}
else{
  ?>
  <div class="gridcontainer">
    <div class="gridwrapper">
        <div class="gridbox gridheader">
            <div class="header">
              <?php
              $id = $_GET['page'];
              include("database.php");
              $query = "SELECT * FROM users WHERE id = $id";
              $result = mysql_query($query);
              $row = mysql_fetch_array($result);
              ?>
                <img src="<?= $row['profile'] ?>" width=50 height=50><h1 style="display:inline;vertical-align:top; margin:10;"><?= $row['login'] ?></h1>
            </div>
        </div>
        <div class="gridbox gridmenu">
            <div class="menuitem">Follow</div>
            <div class="menuitem">Send application</div>
            <div class="menuitem">Full information</div>
            <div class="menuitem">
              <?php
              if($row['blocked'] == 1){
                ?>Blocked
                <?php
              }
                else{
                  ?>
                  Block
                  <?php
                }
                ?></div>
        </div>
        <div class="gridbox gridmain">
            <div class="main">
<h1><?= $row['name']." ".$row['surname'] ?></h1>
<center><h2>Work</h2></center>
<?php
if($row['blocked']==0){
$workq = "SELECT * FROM design WHERE userid = $id";
$work = mysql_query($workq);
$number = mysql_num_rows($work);
for($i=0;$i<$number;$i++){
  $rows = mysql_fetch_array($work);
  ?>
  <img src="<?= $rows['image'] ?>"/></br>
  <?php
}
}
else{
  ?>
  <h2>User is blocked</h2>
  <?php
}
?>
            </div>
        </div>
        <div class="gridbox gridright">
            <div class="right">
<h2>State</h2>
<p>Ready to take orders</p>
<h2>Where?</h2>
<p>Austria, Kazakhstan</p>
<h2>Price?</h2>
<p>Negotiate personally</p>
            </div>
        </div>
    </div>
</div>
<?php
}
}
else{
	?>
	<div id="wrapping">
      <center><div class="slider">
  <ul>
    <li>
      <img src="a.jpg" />
      <div class="content"><span>Material Design</span></div>
    </li>
    <li>
      <img src="d.jpg" />
      <div class="content"><span>Material Design</span></div>
    </li>
    <li>
      <img src="c.jpg" />
      <div class="content"><span>Material Design</span></div>
    </li>
  </ul>
  <button class="prev">prev</button>
  <button class="next">next</button>
</div></center>
    <article>
      <div class="carousel">  
        <?php
        include("database.php");
        $query = "SELECT * FROM design";
        $result = mysql_query($query);
        $num = mysql_num_rows($result);
        for($i=0;$i<$num;$i++){
          $row = mysql_fetch_array($result);
          $image = $row['image'];
          $id = $row['id'];
          $userid = $row['userid'];
          $usequery = "SELECT * FROM users WHERE id = $userid";
          $use = mysql_query($usequery);
          $mynum = mysql_num_rows($use);
          for($j=0;$j<$mynum;$j++){
            $myrow = mysql_fetch_array($use);

          if(isset($_COOKIE["like"])){
          $like = json_decode($_COOKIE["like"]);
        }
        else{ $like = []; }
        if($myrow['blocked']==0){
          ?>

          <div class="im"> 
          <img src="<?= $image ?>" class="image"> 
          <div class="user"><a href="index.php?page=<?= $myrow['id'] ?>"><img src="<?= $myrow['profile'] ?>"><span><?= $myrow['name']." ".$myrow['surname'] ?></span></a><a href="like.php?id=<?= $row['id'] ?>" class = "fav">
            <?php
                if(in_array($row["id"], $like)){
                  ?><img src="liked.png" class="like">
                <?php
                }
                else{
                  ?><img src="notliked.png" class="like">
                  <?php
                }
                ?>
              </a>
          </div>        
        </div>
        <?php
      }
      }
    }
        ?>
      </div>
    </article>
  </div>
	<?php
}
?>
	<footer>MID, 2016</footer> 
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="slider.js"></script>
	<script>
	var dataList = document.getElementById('json-datalist');
	var input = document.getElementById('ajax');
var request = new XMLHttpRequest();

request.onreadystatechange = function(response) {
  if (request.readyState === 4) {
    if (request.status === 200) {
      var jsonOptions = JSON.parse(request.responseText);

      jsonOptions.forEach(function(item) {
      	var option = document.createElement('option');
        option.value = item;
        dataList.appendChild(option);
      });

      input.placeholder = "Search";
    } else {
      input.placeholder = "Search";
    }
  }
};

input.placeholder = "Loading options...";

request.open('GET', 'html-elements.json', true);
request.send();

function validateForm1() {
    var a = document.forms["postimage"]["login"].value;
    var b = document.forms["postimage"]["image"].value;
    var c = document.forms["postimage"]["description"].value;
    if (a == null || a == "" || b == null || b == "" || c == null || c == "") {
        alert("Forms must be filled out");
        return false;
    }
}

function validateForm2() {
    var a = document.forms["post"]["login"].value;
    var b = document.forms["post"]["organization"].value;
    var c = document.forms["post"]["price"].value;
    var d = document.forms["post"]["requirements"].value;
    var e = document.forms["post"]["phone"].value;
    var f = document.forms["post"]["email"].value;
    if (a == null || a == "" || b == null || b == "" || c == null || c == "" || d == null || d == "" || e == null || e == "" || f == null || f == "") {
        alert("Forms must be filled out");
        return false;
    }
}
$("ajax").keyup(function (e) {
    if (e.keyCode == 13) {
        $("search").submit();
    }
});
	</script>
</body>
</html>
<?php
}
else{
  header("location:login.php");
}
?>