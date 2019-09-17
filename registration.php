<?php

	 require 'header.php';
echo "string";

	require 'class/Registration.php';
echo "string";
	$reg=new Registration();

echo "string";
	if(isset($_POST["reg"])){
		$email=trim($_POST["email"]);
		if($reg->existsEmail($email)){
			echo "Létező email!";
		}else{
			$name=trim($_POST["name"]);
			$mobile=trim($_POST["mobile"]);
			$city=trim($_POST["city"]);
			$street=trim($_POST["street"]);
			$number=trim($_POST["number"]);
			
			$pwd=trim($_POST["pwd"]);
			$reg->upload($name,$mobile,$city,$street,$number,$email,$pwd);
			echo "Sikeres";
		}
	}

 ?>
<head>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<div class="container-fluid">
	<div class="row">
		<form method="post" action="" class="col-sm-12 col-md-10 col-lg-8 col-xl-7">
	<h2>Regisztráció</h2>
	<input required="" type="text" name="name" placeholder="Teljes név" minlength="5" maxlength="30" class="form-control">
	<input required="" type="mobile" name="mobile" placeholder="Telefonszám" minlength="9" maxlength="20" class="form-control">
	<input required="" type="text" name="city" placeholder="Város" minlength="2" maxlength="30" class="form-control">
	<input required="" type="text" name="street" placeholder="Utca" minlength="3" maxlength="30" class="form-control">
	<input required="" type="text" name="number" placeholder="Házszám" maxlength="10" class="form-control">
	<br>
	<input required="" type="email" name="email" placeholder="E-mail cím, a bejelentkezéshez" minlength="6" maxlength="30" class="form-control">
	<input required="" type="password" id="pwd1" name="pwd" placeholder="Jelszó" minlength="6" maxlength="20" class="form-control">
	<input required="" type="password" id="pwd2" name="pwd2" placeholder="Jelszó újra" minlength="6" maxlength="20" class="form-control">
	<br>
	<input type="submit" name="reg" id="reg" value="Regisztrálás" class="btn btn-success form-control">
		</form>
	</div>
</div>

<?php 
	require 'footer.php';
 ?>
 <script type="text/javascript" src="js/registration.js"></script>
