<?php 
session_start();
	require 'header.html';
	require 'class/Connection.php';
	require 'class/Basket.php';

	$basket=new Basket();



 ?>
 <head>
 	<link rel="stylesheet" type="text/css" href="css/basket.css">
 </head>
<table class="table text-center">
	<tr>
		<td>Termék</td>
		<td>Termék neve</td>
		<td>Ár</td>
		<td>Méret</td>
		<td></td>
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
		<td>
			<?php echo mb_strtoupper($array["name"],'utf8'); ?>
		</td>
		<td>
			<?php echo $array["price"]; ?> HUF
		</td>
		<td>
			<select name="size">
				<option>XS</option>
				<option>S</option>
				<option>M</option>
				<option>L</option>
				<option>XL</option>
			</select>
		</td>
		<td>
			<button class="btn btn-danger">Töröl</button>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="5">
			<h3>Végösszeg: <?php echo $total; ?> HUF</h3>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<button class="btn btn-warning">
				Kosár üritése
			</button>
		</td>
		<td colspan="3">
			<button class="btn btn-success">
				Rendelési adatok megadása
			</button>
		</td>
	</tr>
</table>



 <?php 
 	require 'footer.html';
  ?>