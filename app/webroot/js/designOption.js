$(function() {
	$(".show_reply").on('click', function(){
		console.log('REPLY');
		var val = $(this).data('replyid');
		var elem = ".reply-" + val;

		$(this).toggle();

		$(elem).toggle();

		return false;
	});

	$(".no-reply").on('click', function() {
		$(".show_reply").show();

		var val = $(".show_reply").data('replyid');
		var elem = ".reply-" + val;
		$(elem).toggle();

		return false;;
	});
});