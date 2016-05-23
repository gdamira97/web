<html>
<head>
    <title>Aya Shalkar</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" type="text/css" href="indexcss.css">
<meta charset="utf-8">
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
<div class="gridcontainer">
    <div class="gridwrapper">
        <div class="gridbox gridheader">
            <div class="header">
                <img src="user5.jpg" width=50 height=50><h1 style="display:inline;vertical-align:top; margin:10;">Love Typhoon</h1>
            </div>
        </div>
        <div class="gridbox gridmenu">
            <div class="menuitem">Follow</div>
            <div class="menuitem">Send application</div>
            <div class="menuitem">Full information</div>
            <div class="menuitem">Block</div>
        </div>
        <div class="gridbox gridmain">
            <div class="main">
<h1>Aya Shalkar</h1>
<p>Claim to Fame: One line executive summary</p>
<q>Больше людей, непринимающих современное искусство, я ненавижу только курящих на ходу. Впереди меня.</q>
</br>
<center><h2>Work</h2></center>
<img src="i2.jpg">
<img src="i3.jpg">
<img src="i4.jpg">
<img src="i5.jpg">
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
<div class="gridbox gridfooter">
            <div class="footer">
                MID, 2016
            </div>
        </div>
        <script>
        $("ajax").keyup(function (e) {
    if (e.keyCode == 13) {
        $("search").submit();
    }
});
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
        </script>
</body>
</html>