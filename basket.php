<?php 
session_start();
	require 'header.html';
	require 'class/Connection.php';
	require 'class/Basket.php';

	$basket=new Basket();

	if (isset($_POST["removeAll"])) {
		session_destroy();
		header("location: basket.php");
	}

 ?>
 <head>
 	<link rel="stylesheet" type="text/css" href="css/basket.css">
 </head>
 <?php if (!isset($_SESSION["basket"])) {
		?>
		<h2 class="text-center">A kosarad üres!</h2>
		<?php	
		}else{ ?>
<table class="border-dark text-center">
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
		<td class="text-success">
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
			<h3 class="text-success">Végösszeg: <?php echo $total; ?> HUF</h3>
		</td>
	</tr>
	<tr>
		<form method="post" action="">
		<td colspan="2">
			<input type="submit" name="removeAll" class="btn btn-warning" value="Kosár üritése">
		</td>
		<td colspan="3">
			<input type="submit" name="next" class="btn btn-success" value="Rendelési adatok megadása">
		</td>
		</form>
	</tr>
</table>



 <?php 
}
 	require 'footer.html';
  ?>