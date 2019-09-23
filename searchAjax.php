<?php 
	require 'class/Connection.php';
	require 'class/Search.php';

	$search=new Search($_POST["kind"],$_POST["min"],$_POST["max"],$_POST["sex"]);

			 foreach ($search->getProducts() as $v) {
		 ?>

		<div class="col-xs-10 col-sm-10 col-md-6 col-lg-4 col-xl-3">
			<table>
				<tr>
					<td>
						<img class="w-100" src="img/products/<?php echo $v["img"] ?>">
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
						<button value="<?php echo $v["id"] ?>" class="btn btn-success button">Kosárba tesz</button>
					</td>
				</tr>
			</table>
			<br>
		</div>
	<?php } 
		
	//ha mégegyszer behúzom a footert, akkor nem működik a szűkítés, de ha nem, akkor meg keresés után nem működik
		
	?>		

