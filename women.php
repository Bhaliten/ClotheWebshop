<?php 

	$sex="women";

  require 'header.php';



  require 'class/Products.php';

	?>
	<h2 id="sex" class="text-center">Women</h2>
	<?php 

  $prod=new Products();

  $info=$prod->getAllWomen();

	require 'list.php';
  	require 'footer.php';
 ?> 