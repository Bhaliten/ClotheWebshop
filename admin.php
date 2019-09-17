<?php 
	

	if(isset($_SESSION["email"])){
		header("location: index.php");
	}

	require 'header.php';
	
	require 'class/Products.php';
	

	$prod=new Products();
	$admin=new Admin();

	if(!$admin->isAdmin($_SESSION["email"])){
		header("location: index.php");
	}

	if (isset($_POST["upload"])) {
		$name=trim($_POST["name"]);
		$price=trim($_POST["price"]);
		$sex=trim($_POST["sex"]);
		$kind=trim($_POST["kind"]);
	 

		if($admin->checkImg()==0){
			$admin->upload($price,$name,$kind,basename($_FILES["image"]["name"]),$sex);
			echo "Sikeresen feltöltve!";
		}else{
			foreach ($admin->checkImg() as $v) {
				echo $v."<br>";
			}
		}
	}

 ?>
 <head>
 	<link rel="stylesheet" type="text/css" href="css/admin.css">
 </head>
<div class="container-fluid">
	<div class="row">
		
<form method="post" action="" class="col-sm-12 col-md-10 col-lg-8" enctype="multipart/form-data">
	<h2>Új termék feltöltés</h2>
	<input required="" maxlength="20" class="form-control" type="text" id="name" name="name" placeholder="Termék neve (max 20 karakter)">
	<input required="" maxlength="5" class="form-control" type="number" id="price" name="price" placeholder="Termék ára (max 99999HUF)">
	<select class="form-control col-5" id="sex" name="sex">
		<option>Men</option>
		<option>Women</option>
	</select>
	<select class="form-control col-5" id="kind" name="kind" name="collection">
		<?php 
			foreach ($prod->getAllKind() as $v) {
				?>
					<option><?php echo $v["kind"]; ?></option>
				
		 <?php } ?>
	</select>
	<input required="" class="form-control btn" type="file" id="image" name="image">
	<input class="form-control btn btn-success" type="submit" id="upload" name="upload" value="Feltöltés" >
</form>


	</div>
</div>

<?php require 'footer.php'; ?>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/admin.js"></script>