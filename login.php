 <?php 
 	

		require 'header.php'; 
		
 		require 'class/Login.php';

 		$info="";

 	if (isset($_POST["log"])) {
 		$email=trim($_POST["email"]);
 		$pwd=trim($_POST["pwd"]);

 		$log=new Login();

 		if($log->check($email,$pwd)){
 			setcookie("email",$email,time()+600);
 			header("location: index.php");
 		}else{
 			$info="Ilyen email, és jelszó páros nem létezik.";
 		}
 	}



 ?>


 <head>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<div class="container-fluid">
	<div class="row">
		<form method="post" action="" class="col-sm-12 col-md-10 col-lg-8 col-xl-7">
			<h3 class="text-danger"><?php echo $info; ?></h3>
	<h2>Bejelentkezés</h2>
	
	<input required="" type="email" name="email" placeholder="E-mail cím, a bejelentkezéshez" minlength="6" maxlength="30" class="form-control">
	<input required="" type="password" id="pwd1" name="pwd" placeholder="Jelszó" minlength="6" maxlength="20" class="form-control">
	
	<br>
	<input type="submit" name="log" id="log" value="Bejelentkezés" class="btn btn-success form-control">
		</form>
	</div>
</div>


<?php 
	require 'footer.php';
 ?>