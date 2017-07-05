<?php
	include("db.php");
	$myDB = new DB("wangligu_JustOnce");
	$a = $myDB->find("select * from JO_HTML5");
	foreach ($a as $key => $value) {
		if($key=="Title")
		echo $value;
	}
?>