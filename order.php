<?php require 'header.php'; ?>
<form method="post" action="" class="col-sm-12 col-md-10 col-lg-8 col-xl-7">
	<input type="text" name="name" placeholder="Teljes név" maxlength="30" class="form-control">
	<input type="email" name="email" placeholder="E-mail cím" maxlength="30" class="form-control">
	<input type="text" name="mobile" placeholder="Telefonszám" maxlength="20" class="form-control">
	<input type="text" name="city" placeholder="Város" maxlength="30" class="form-control">
	<input type="text" name="street" placeholder="Utca" maxlength="30" class="form-control">
	<input type="text" name="number" placeholder="Házszám" maxlength="10" class="form-control">
	<input type="submit" name="send" value="Rendelés elküldése" class="btn btn-success">
</form>