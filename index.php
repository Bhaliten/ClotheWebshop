<?php 
   require 'class/Connection.php';
  require 'class/Products.php';

  $prod=new Products();

  $info=$prod->getAllInfo();

  foreach ($info as $v) {
    echo $v["name"];
  }


  require 'header.html';
 ?>



    




<?php 
  require 'footer.html';
 ?> 