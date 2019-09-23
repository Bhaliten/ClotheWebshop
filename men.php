<?php 

	$sex="men";
  require 'header.php';


  require 'class/Products.php';


  	?>
	<p id="sex" class="d-none">Men</p>
	<?php 

  $prod=new Products();

  $info=$prod->getAllMen();




  require 'list.php';

  require 'footer.php';
 ?> 