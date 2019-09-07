<?php 
  require 'header.html';


  require 'class/Connection.php';
  require 'class/Products.php';

  $prod=new Products();

  $info=$prod->getAllMen();

	require 'list.php';
  	require 'footer.html';
 ?> 