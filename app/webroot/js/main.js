$(function() {
  $('.js-like').click(function(){
    var type = $(this).attr('data-type');
    var post_id = $(this).parent().parent().attr('data-id');
    $.post('/post/like',{
      'data[Like][post_id]': post_id,
      'data[Like][type]': type
    });
  });
});