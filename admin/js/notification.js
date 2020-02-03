
function notif(){
	$.get('ajax/notification.php').done(function(data){
		$('.message__container a.dropdown-item').remove();
  //       console.log(data[0]);
  		var mess = JSON.parse(data);
		// for (var i = 0; i < mess.length; i++) {
		// 	console.log(mess[i]);
		// 	// $('.message__container').append('<a class="dropdown-item" href="ajax/readMessage.php?id='+mess[i]['id']+'&&redirect="'+data[i]['url']+'">'+data['details']+'</a>');	
		// }

		$.each(mess, function(key, val){

			if (key != 15) {
				var redirect = encodeURI(val.url_redirect);
			console.log(redirect);

			$('.message__container').append('<a class="dropdown-item" href="ajax/readMessage.php?id='+val.id+'&&redirect_url='+redirect+'">'+val.details+'</a>');	
			}
			
			// console.log(val);
		});
	});
}

setInterval(notif(), 10000);