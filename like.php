<?php
	$item = $_GET["id"];
	if(isset($_COOKIE["like"])){
		$like = json_decode($_COOKIE["like"]);
		}
	else{
		$like = [];
	}
	if(in_array($item, $like)){
				foreach ($like as $index => $value) {
					if ($item == $value) {
						unset($like[$index]);

					}
				}
		$time = time() + 60*60*24*7;
				setcookie("like",json_encode($like),$time);
			}
	else{
		$like[] = $item;
		$string = json_encode($like);
		$time = time() + 60*60*24*7;
		setcookie("like",$string,$time);
	}
	header("location: index.php");
?>
