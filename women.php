<?php 
  require 'header.html';



  require 'class/Connection.php';
  require 'class/Products.php';

  $prod=new Products();

  $info=$prod->getAllWomen();

  ?>


<?php 
	require 'list.html';
 ?>


<?php 
  require 'footer.html';
 ?> 