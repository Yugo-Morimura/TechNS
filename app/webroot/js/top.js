	$(document).ready(function() {
		$("#signup").on('click', function(){
			console.log("signup click");
			$(".login").toggle();
			$(".sign_up").toggle();
			return false;
		});


		$("#login").on('click', function(){
			$(".sign_up").toggle();
			$(".login").toggle();
			return false;
		});
	});