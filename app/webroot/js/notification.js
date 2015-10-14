$(function() {
	var last_count = 0;
	function getLatestNotice() {
		$.get('/notification/fetchCount', {}, function(count){
			setTimeout(getLatestNotice, 3000);
			if(last_count !== count) {
				$("title").text('('+count+') TechNS');
				$(".notification-counter").text(count);
				$.get('/my_posts_liked')
			}
		});
	}
	getLatestNotice();

	function loadPostList(){
		$.get('/my_posts', {}, function(html){
			$('.user_panels').html(html);
		});
	}
	function loadPostLikedList(){
		$.get('/my_posts_liked', {}, function(html){
			$('.user_panels').html(html);
		});
	}
	$('.js-post-count').click(loadPostList);
	$('.js-post-count-liked').click(loadPostLikedList);
	loadPostList();
});