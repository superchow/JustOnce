<?php
	include("db.php");
	$myDB = new DB("stuudent");
	$a = $myDB->find("select * from stuudent");
	foreach ($a as $key => $value) {
		if($key=="name")
		echo $value;
	}
?>