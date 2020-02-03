
function notif(){
	$.get('./api/notification.php').done(function(data){
		$('.message__container a.dropdown-item').remove();
		
			var mess = JSON.parse(data);
	

			$.each(mess, function(key, val){
				if (data.length == 0) {
					$('.message__container').append('<a class="dropdown-item" href="#">No Notification</a>');	

				}
				else{
					if (key != 15) {
						var redirect = encodeURI(val.url_redirect);
						console.log(redirect);

						$('.message__container').append('<a class="dropdown-item" href="admin/ajax/readMessage.php?id='+val.id+'&&redirect_url='+redirect+'">'+val.details+'</a>');	
					}
				}
				
				
				// console.log(val);
			});
		
	
	});
}

setInterval(notif(), 10000);