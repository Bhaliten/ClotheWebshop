<?php 

	$sex="men";
  require 'header.php';


  require 'class/Products.php';


  	?>
	<h2 id="sex" class="text-center">Men</h2>
	<?php 

  $prod=new Products();

  $info=$prod->getAllMen();




	require 'list.php';
  	require 'footer.php';
 ?> 