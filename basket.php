<?php 

	require 'header.php';
	require 'class/Basket.php';

	$basket=new Basket();

	if (isset($_POST["removeAll"])) {
		$_SESSION["basket"]=array();
		header("location: basket.php");
	}

	if (isset($_POST["next"])) {
		$_SESSION["sizes"]=array();

		foreach ($_SESSION["basket"] as $v) {
			array_push($_SESSION["sizes"], $_POST["$v"]);
		}

		require 'class/SetOrder.php';

		$so=new SetOrder();

		try {
			$so->uploadOrder($_SESSION["email"]);
			$so->uploadItems($_SESSION["basket"],$_SESSION["sizes"]);
		} catch (Exception $e) {
			echo $e;
		}

		$_SESSION["basket"]=array();
		header("location:feedback.php");
	}

 ?>
 <head>
 	<link rel="stylesheet" type="text/css" href="css/basket.css">
 </head>
 <?php if (!isset($_SESSION["basket"])||count($_SESSION["basket"])==0) {
		?>
		<br>
		<h2 class="text-center">A kosarad üres!</h2>

			
		<?php }else{ ?>

<br>
<div class="container-fluid">
	<div class="row">
		<form method="post" action="" class="col-12">
<table class="border-light text-center table">
	<tr>
		<td colspan="2"><h4>Termék</h4></td>
	
		
	</tr>
	<?php 
	$total=0;
	foreach ($_SESSION["basket"] as $v) {
		$array=$basket->getProducts($v);
		$total+=$array["price"];
		
	 ?>
	<tr>
		<td>
			<img class="img" src="img/products/<?php echo $array["img"] ?>">
		</td>
		<td class="align-middle">
			<p class="text-success align-middle h5"><?php echo mb_strtoupper($array["name"],'utf8'); ?></p>
			<p class="align-middle h5"><?php echo $array["price"]; ?> HUF</p>
			<p>Méret: 
				<select class="btn" name="<?php echo $v ?>">
					<option>XS</option>
					<option>S</option>
					<option>M</option>
					<option>L</option>
					<option>XL</option>
				</select>
			</p>
		</td>
		
	</tr>
	<?php } ?>
	<tr>
		<td colspan="2">
			<h3 class="text-success">Végösszeg: <br><?php echo $total; ?> HUF</h3>
			<?php if($total<10000){ ?>
				<p class="text-warning">+ 1000Ft szállítási díj</p>
			<?php }else{ ?>
				<p class="text-warning">Ingyenes szállítás!</p>
			<?php } ?>
		</td>
	</tr>
	<tr>
		<form method="post" action="">
		<td>
			<input type="submit" name="removeAll" class="btn btn-warning" value="Kosár üritése">
		</td>
		<td>
			<?php
			 if(!isset($_SESSION["email"])||$_SESSION["email"]==""){
			?>
				<p class="text-danger h5">Rendeléshez bejelentkezés szükséges!</p>
			<?php
			 }else{
				?>
			<input type="submit" name="next" class="btn btn-success" value="Rendelés elküldése">
		<?php } ?>
		</td>
		</form>
	</tr>
</table>
</form>


	</div>
</div>
 <?php 
}
 	require 'footer.php';
  ?>