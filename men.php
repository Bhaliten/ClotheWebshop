<?php 
  require 'header.html';
 ?>
 
<?php 

  require 'class/Connection.php';
  require 'class/Products.php';

  $prod=new Products();

  $info=$prod->getAllMen();

 

?>

<?php 
	require 'list.html';
 ?>

<?php 
  require 'footer.html';
 ?> 