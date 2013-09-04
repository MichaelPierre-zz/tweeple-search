$(document).ready(function() {
	$(".input-field").attr("value","Enter Twitter Name");
	
	var text = "Enter Twitter Name";
	
	$(document).on('focusin',".input-field",function(){
		$(this).addClass("active");
		if($(this).attr("value") == text) $(this).attr("value", "");
	});
	$(document).on('focusout', ".input-field", function(){
		$(this).removeClass("active");
		if($(this).attr("value") == "") $(this).attr("value", text);
	});
});
