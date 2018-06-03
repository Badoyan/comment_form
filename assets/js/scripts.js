$(document).ready(function (){

$.ajax({
    url: "actions.php",
    type: "POST",
    cache: false,
    data: {action:'show'},
    success: function(html){
      $("#comments_container").html(html);
      $('.ajax_loader').css('display','none');
    }
});

/* Form submit (insert the new comment) */
$('#comment_form').on('submit', function (event){
  event.preventDefault();
  $('.ajax_loader').css('display','block');
  data = {};
  data.username = $('#name').val(); 
  data.email = $('#email').val();
  data.message = $('#message').val();

  $.ajax({
    url: "actions.php",
    type: "POST",
    cache: false,
    data: {action:'insert',data:data },
    success: function(html){
      $('.ajax_loader').css('display','none');
      if (html.status && html.status == 'faild') {
        $('.ajax-error').html(html.error);
      }
      else {
        $("#comments_container").html(html);
      }
    }
  });

});




});//Document ready end