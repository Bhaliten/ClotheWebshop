<?php 
session_start();

	if (!isset($_SESSION["basket"])) 
		$_SESSION["basket"]=array();
	

	array_push($_SESSION["basket"], $_POST["id"]);

 ?>