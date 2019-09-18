$(function(){

	var k=$("#kind");
	var min=$("#min");
	var max=$("#max");
	var sex=$("#sex");
	var result=$("#result");


	
	

	k.change(function() {
		update();
	});

	min.keyup(function() {
		update();
	});

	max.keyup(function() {
		update();
	});


	function update(){
		$.ajax({
			url: 'searchAjax.php',
			type: 'post',
			data: {kind: k.val(), min: min.val(), max: max.val(), sex: sex.text()},
		
		success: function(data) {
			$(".first").html(null);
			result.html(data);
		}
		
		});
	}
});