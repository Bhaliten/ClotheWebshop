<div class="container-fluid">
	<div class="row">

		<div class="details col-12 bg-light">
			<br>
			<h3>Ár</h3>
			<input class="col-lg-3 col-sm-5 btn" type="number" id="min" value="<?php echo $prod->getMinPrice()[0][0] ?>"> <b>-</b>
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

		<div id="result" class="row"></div>
		
		<div class="row">
		<?php 

			 foreach ($info as $v) {
		 ?>

		<div class="first col-sm-12 col-md-6 col-lg-4 col-xl-3">
			<table>
				<tr>
					<td>
						<img class="prodimg" src="img/products/<?php echo $v["img"] ?>">
					</td>
				</tr>
				<tr>
					<td>
						<h3 class="name"><?php echo mb_strtoupper($v["name"],'UTF-8'); ?></h3>

						<h3 class="price"><?php echo $v["price"]; ?> HUF</h3>
					</td>
				</tr>
				<tr>
					<td>
						<button value="<?php echo $v["id"] ?>" class="btn btn-success button">Kosárba tesz</button>
					</td>
				</tr>
			</table>
		</div>
	<?php } ?>

	</div>
	</div>
</div>