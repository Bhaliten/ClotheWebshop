<div class="container-fluid">
	<div class="row">

		<div class="details col-12">
			<br>
			<h3>Ár</h3>
			<input class="col-lg-3 col-sm-5 btn" type="number" id="min" value="<?php echo $prod->getMinPrice()[0][0] ?>"> <p class="text-center">-</p>
			<input class="col-lg-3 col-sm-5 btn" type="number" id="max" value="<?php echo $prod->getMaxPrice()[0][0] ?>">



			<select id="kind" class="btn col-lg-3 col-sm-10">
				<option>Mind</option>

				<?php
					foreach($prod->getAllKind() as $v){
					?>

						<option><?php echo $v["kind"] ; ?></option>
		
				<?php
					}
				 ?>

			</select>

			<br><br>
		</div>
	</div>


	<div class="row" id="result">
		<?php 

			 foreach ($info as $v) {
		 ?>

		<div class="first col-xs-10 col-sm-10 col-md-6 col-lg-4 col-xl-3">
			<table>
				<tr>
					<td>
						<img class="prodimg" src="img/products/<?php echo $v["img"] ?>">
					</td>
				</tr>
				<tr>
					<td>
						<h4 class="name text-center"><?php echo mb_strtoupper($v["name"],'UTF-8'); ?></h4>

						<h4 class="price"><?php echo $v["price"]; ?> HUF</h4>
					</td>
				</tr>
				<tr>
					<td>
						<button value="<?php echo $v["id"] ?>" class="btn btn-success button">Kosárba tesz</button>
					</td>
				</tr>
			</table>
			<br>
		</div>
	<?php } 

	?>
	</div>
</div>