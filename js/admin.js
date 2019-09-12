$(function(){
	var name=$("#name");
	var price=$("#price");
	var sex=$("#sex");
	var kind=$("#kind");
	var img=$("#img");
	var upload=$("#upload");




	//upload.prop("disabled",true);

	name.on("keyup",function(){
		if (name.val().length>20) {
			upload.prop("disabled",true);
			alert("A név maximum 20 karakter hosszú lehet!");
		}else if (price.val().length<6) {
			upload.prop("disabled",false);
		}
		
	});

	price.on("keyup",function(){
		if (price.val().length>5) {
			upload.prop("disabled",true);
			alert("Az ár maximum 5 karakter hosszú lehet!");
		}else if (name.val().length<21) {
			upload.prop("disabled",false);
		}
		
	});

	upload.on("click",function(){
		
	});
});