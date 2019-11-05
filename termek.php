<?php 

require_once 'header.php';
require_once 'class/Basket.php';

$b=new Basket();
 ?>

 <div class="container-fluid">
 	<div class="row justify-content-center p-1">
 		<?php 
 			$data=$b->getProducts($_GET["id"]);
 			
 		 ?>

 		 <table>
				<tr>
					<td>
						<?php if("http"==substr($data["img"], 0,4)){ ?>
						<img class="w-100 rounded col-sm-10 col-md-8 col-lg-5 m-auto" src="<?php echo $data["img"] ?>">
					<?php }else{ ?>
						
						<img class="w-100 rounded col-sm-10 col-md-8 col-lg-5 m-auto" src="img/products/<?php echo $data["img"] ?>" alt="Submit">
					<?php } ?>
					</td>
				</tr>
				<tr>
					<td>
						<h5 class="name text-center"><?php echo mb_strtoupper($data["name"],'UTF-8'); ?></h5>

						<h5 class="price"><?php echo $data["price"]; ?> HUF</h5>
					</td>
				</tr>
				<tr>
					<td>
						<h4>Leírás</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a tellus vitae enim vestibulum condimentum. Nam imperdiet venenatis condimentum. Maecenas et urna quis tellus scelerisque sagittis non at ante. Proin maximus lectus a tellus tempus, eu mattis dui pretium. Aliquam suscipit tellus sed lobortis euismod.</p>
					</td>
				</tr>
				<tr>
					<td>
						<button value="<?php echo $data["id"] ?>" class="btn btn-success w-100 button">Kosárba tesz</button>
					</td>
				</tr>
			</table>
 	</div>
 </div>


<?php require_once 'footer.php'; ?>