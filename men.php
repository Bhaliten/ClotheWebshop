<?php 

	$sex="men";
  require 'header.html';


  require 'class/Connection.php';
  require 'class/Products.php';


  	?>
	<h2 id="sex">Men</h2>
	<?php 

  $prod=new Products();

  $info=$prod->getAllMen();




	require 'list.php';
  	require 'footer.html';
 ?> 