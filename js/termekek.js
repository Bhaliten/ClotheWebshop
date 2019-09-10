$(function(){


	var b=$(".button");

//Ez minden gombra igaz
	b.on("click",function(){
		swal("Termék kosárba rakva!", "", "success");


		$.ajax({
			/*megadjuk melyik oldal hívódjon meg, amikor lenyomjuk a gombot, az eredeti oldal nem frissűl, 
			hanem a háttérben az basket.php. Minden ami ott található le fog futni. */
			url: "addToBasket.php",
			type: "post",

			//Adhatunk át neki értékeket, amiket a $_POST["id"]-al fog tudni használni. 
			data:{
				//Azért id mert itt úgy nevezzük el.
				id: $(this).val()
			}
			//Meg lehet adni hogy mi történjen sikeresség esetén, de itt nem volt rá szükség
			/*
			success: function(){
	
			}
			*/
			
		});
	});
});