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

		header("location: order.php");
	}

 ?>
 <head>
 	<link rel="stylesheet" type="text/css" href="css/basket.css">
 </head>
 <?php if (!isset($_SESSION["basket"])||count($_SESSION["basket"])==0) {
		?>
		<br>
		<h2 class="text-center">A kosarad üres!</h2>
		<?php	
		}else{ ?>

<br>
<div class="container-fluid">
	<div class="row">
		<form method="post" action="" class="col-12">
<table class="border-dark text-center table">
	<tr>
		<td><h4>Termék</h4></td>
		<td><h4>Termék neve</h4></td>
		<td><h4>Ár</h4></td>
		<td><h4>Méret</h4></td>
		
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
			<?php echo mb_strtoupper($array["name"],'utf8'); ?>
		</td>
		<td class="text-success align-middle">
			<?php echo $array["price"]; ?> HUF
		</td>
		
		<td class="align-middle">
			<select class="form-control" name="<?php echo $v ?>">
				<option>XS</option>
				<option>S</option>
				<option>M</option>
				<option>L</option>
				<option>XL</option>
			</select>
		</td>
		
	</tr>
	<?php } ?>
	<tr>
		<td colspan="6">
			<h3 class="text-success">Végösszeg: <?php echo $total; ?> HUF</h3>
		</td>
	</tr>
	<tr>
		<form method="post" action="">
		<td colspan="2">
			<input type="submit" name="removeAll" class="btn btn-warning" value="Kosár üritése">
		</td>
		<td colspan="4">
			<input type="submit" name="next" class="btn btn-success" value="Rendelési adatok megadása">
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