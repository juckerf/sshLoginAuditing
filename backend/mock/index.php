<?php
	function __autoload($className){
		include "classes/class$className.php";
	}

	header("Access-Control-Allow-Orgin: *");
    header("Access-Control-Allow-Methods: *");
    header("Content-Type: application/json");
	
	$file="getEntrys.json";
	$myfile = fopen($file, "r") or die("Unable to open file!");
	echo fread($myfile,filesize($file));
?>		
