$(function(){
	var name=$("#name");
	var price=$("#price");
	var sex=$("#sex");
	var kind=$("#kind");
	var img=$("#img");
	var upload=$("#upload");




	//upload.prop("disabled",true);


	price.on("keyup",function(){
		if (price.val().length>5) {
			alert("Az ár maximum 5 karakter hosszú lehet!");
		}
		
	});

	upload.on("click",function(){
		alert(price.val());
	});
});