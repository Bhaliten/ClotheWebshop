<?php
	require 'header.php'; 

	mail($_SESSION["email"], "Rendelés teszt", "Köszönöm hogy kipróbáltad a weboldalam! A rendelést nyilván nem szállítjuk ki. :)","From: info@szasim.nhely.hu");
?>


	<p class="text-center h3 text-success">Rendelését rögzítettük!</p>


<?php
	require 'footer.php';
?>