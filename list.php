<?php 
	
	if(isset($_POST["search"])){
		$min=trim($_POST["min"]);
		$max=trim($_POST["max"]);
		$kind=trim($_POST["kind"]);

		require 'class/Search.php';
		$search=new Search($kind,$min,$max,$sex);
		$info=$search->getProducts();
	}

 ?>
<div class="container-fluid">
	<div class="row">

		<div class="details col-12">
			<br>
			<form method="post" action="">

			<table class="col-12">
				<tr class="h5">
					<td>Minimum</td>
					<td>Maximum</td>
					<td>Kategória</td>
					
				</tr>
				<tr>
					<td>
						<input class="col-lg-3 col-sm-5 btn" type="number" id="min" name="min" value="<?php echo $prod->getMinPrice()[0][0] ?>">
					</td>
					<td>
						<input class="col-lg-3 col-sm-5 btn" type="number" id="max" name="max" value="<?php echo $prod->getMaxPrice()[0][0] ?>">
					</td>
					<td>
						<select id="kind" name="kind" class="w-100 btn ">
							<option>Mind</option>

					<?php
						foreach($prod->getAllKind() as $v){
						?>
							<option><?php echo $v["kind"] ; ?></option>
							<?php
							}
							 ?>
						</select>
					</td>
				</tr>
			</table>
			
				<input type="submit" name="search" value="Keresés" class="btn btn-success col-sm-12">
			</form>
			
		</div>
	</div>
<br><br>

	<div class="row" id="result">
		<?php 
			$nothing=true;
			 foreach ($info as $v) {
			 	$nothing=false;
		 ?>

		<div class="col-xs-10 col-sm-10 col-md-6 col-lg-4 col-xl-3">
			<table>
				<tr>
					<td>
						<img class="w-100 rounded" src="img/products/<?php echo $v["img"] ?>">
					</td>
				</tr>
				<tr>
					<td>
						<h5 class="name text-center"><?php echo mb_strtoupper($v["name"],'UTF-8'); ?></h5>

						<h5 class="price"><?php echo $v["price"]; ?> HUF</h5>
					</td>
				</tr>
				<tr>
					<td>
						<button value="<?php echo $v["id"] ?>" class="btn btn-success w-100 button">Kosárba tesz</button>
					</td>
				</tr>
			</table>
			<br>
		</div>
	<?php } 
		if ($nothing) {
			?>

			<h4 class="col-12 text-center text-warning">Nincs termék ezekkel a paraméterekkel!</h4>

			<?php
		}
	?>
	</div>
</div>