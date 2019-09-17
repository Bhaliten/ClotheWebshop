$(function(){

	var reg=$("#reg");

	reg.on("click",function(){
		var pwd1=$("#pwd1").val();
		var pwd2=$("#pwd2").val();

		if(pwd1.length>5&&pwd1.length<21&&pwd2.length>5&&pwd2.length<21){
			if(pwd1!=pwd2){
				alert("A két jelszó nem egyezik!");
				event.preventDefault();
			}
		}
	});
});