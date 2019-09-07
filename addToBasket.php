<?php 
session_start();

	if (!isset($_SESSION["kosar"])) 
		$_SESSION["kosar"]=array();
	

	array_push($_SESSION["kosar"], $_POST["id"]);

 ?>