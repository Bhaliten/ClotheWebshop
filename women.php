<?php 

	$sex="women";

  require 'header.html';



  require 'class/Connection.php';
  require 'class/Products.php';

	?>
	<h2 id="sex">Women</h2>
	<?php 

  $prod=new Products();

  $info=$prod->getAllWomen();

	require 'list.php';
  	require 'footer.html';
 ?> 