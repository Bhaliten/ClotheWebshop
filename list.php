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
			<form method="get" action="termek.php">
			<table>
				<tr>
					<td>
						<?php if("http"==substr($v["img"], 0,4)){ ?>
						<input type="image" class="w-100 rounded img" src="<?php echo $v["img"] ?>" alt="Submit">
					<?php }else{ ?>
						
						<input type="image" class="w-100 rounded img" src="img/products/<?php echo $v["img"] ?>" alt="Submit">
					<?php } ?>
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
						<input class="d-none" type="text" name="id" value="<?php echo $v["id"] ?>">
						<button value="<?php echo $v["id"] ?>" class="btn btn-success w-100 button">Kosárba tesz</button>
					</td>
				</tr>
			</table>
			</form>
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