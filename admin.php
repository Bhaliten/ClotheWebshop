<?php 
	require 'header.html';
 ?>
 <head>
 	<link rel="stylesheet" type="text/css" href="css/admin.css">
 </head>
<div class="container-fluid">
	<div class="row">
		
<form method="post" action="" class="col-sm-12 col-md-10 col-lg-8">
	<h2>Új termék feltöltés</h2>
	<input class="form-control" type="text" name="name" placeholder="Termék neve (max 20 karakter)">
	<input class="form-control" type="number" name="price" placeholder="Termék ára (max 99999HUF)">
	<select class="form-control col-5" name="sex">
		<option>Men</option>
		<option>Women</option>
	</select>
	<select class="form-control col-6" name="collection">
		<?php 
			foreach ($variable as $v) {
				# code...
			
		 ?>
		 <option><?php echo $v; ?></option>
		 <?php } ?>
	</select>
	<input class="form-control btn" type="file" name="img">
	<input class="form-control btn btn-success" type="submit" name="upload" value="Feltöltés" >
</form>


	</div>
</div>