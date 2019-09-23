<?php 

	$sex="women";

  require 'header.php';



  require 'class/Products.php';

	?>
	<p id="sex" class=" d-none">Women</p>
	<?php 

  $prod=new Products();

  $info=$prod->getAllWomen();

	require 'list.php';

	
require 'footer.php';
 ?> 