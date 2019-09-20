<?php 
	require 'class/Connection.php';
	require 'class/Search.php';

	$search=new Search($_POST["kind"],$_POST["min"],$_POST["max"],$_POST["sex"]);

			 foreach ($search->getProducts() as $v) {
		 ?>

		<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
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
	<?php } 
		
	//ha mégegyszer behúzom a footert, akkor nem működik a szűkítés, de ha nem, akkor meg keresés után nem működik
		
	?>		

