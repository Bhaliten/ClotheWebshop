<?php session_start();
		$_SESSION["email"]="";
		unset($_COOKIE["email"]);
		setcookie("email",'',time()-3600);
		header("location: index.php"); ?>