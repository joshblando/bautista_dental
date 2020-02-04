$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.post('../ajax/notification.php', {view : view}).done(function(data){
     data = JSON.parse(data);

  	 $('.message__container').html(data.notification);
     console.log(data.unseen_notification);
	    if(data.unseen_notification > 0)
	    {
	    	console.log();
	     	$('.notif_count').css('display', 'inline-block');
			$('.notif_count').html(data.unseen_notification);
	    }
  });
 }
 
 load_unseen_notification();
 
 
 $('.dropdown-toggle').click(function(){
  $('.notif_count').css('display', 'none');
  $('.notif_count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
