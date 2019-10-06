<?php 
	

	if(isset($_SESSION["email"])){
		header("location: index.php");
	}

	require 'header.php';
	
	require 'class/Products.php';
	

	$prod=new Products();
	$admin=new Admin();
	$info="";

	if(!$admin->isAdmin($_SESSION["email"])){
		header("location: index.php");
	}

	if(isset($_POST["csv"])){
		$ok=$admin->checkCSV();
		if(empty($ok)){
			$admin->readCSV(basename($_FILES["file"]["name"]));
			$info= "Sikeres CSV feltöltés!";
		}else{
			foreach ($ok as $v) {
				$info.= $v."<br>";
			}
		}
		
	}

	if (isset($_POST["upload"])) {
		$name=trim($_POST["name"]);
		$price=trim($_POST["price"]);
		$sex=trim($_POST["sex"]);
		$kind=trim($_POST["kind"]);
	 

		if($admin->checkImg()==0){
			$admin->upload($price,$name,$kind,basename($_FILES["image"]["name"]),$sex);
			$info= "Sikeresen feltöltve!";
		}else{
			foreach ($admin->checkImg() as $v) {
				$info+= $v."<br>";
			}
		}
	}

 ?>
 <head>
 	<link rel="stylesheet" type="text/css" href="css/admin.css">
 </head>

<div class="container-fluid">
	<div class="row">
			
		<h3 class="text-danger col-12 text-center"><?php echo $info; ?></h3>

<form method="post" action="" class="col-sm-12 col-md-5 col-lg-5 border btn-toolbar rounded p-2 m-2" enctype="multipart/form-data">
	
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



<form method="post" action="" class="col-sm-12 col-md-5 col-lg-5 border rounded p-2 m-2" enctype="multipart/form-data">
	<h2>CSV adatainak feltöltése</h2>
	<input type="file" name="file" class="form-control btn" required="">
	<input type="submit" name="csv" class="form-control btn btn-success" value="CSV fájl beolvasása">
</form>

	</div>
</div>

<?php require 'footer.php'; ?>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/admin.js"></script>