$('#sign-in').click(function(e){

	e.preventDefault();
	e.stopPropagation();

	$.ajax({
	  type: "POST",
	  url: site_url + "auth/process",
	  data: { 
	  	username: $('#username').val(), 
	  	password: $('#password').val(),
	  	remember: $('#remember').is(':checked')
	  }
	})
	  .done(function(response) {

	    $('body').children('.content').fadeOut(500, function(){

	    	$('body').html('<div class="content">welcome! do something here. <a href="' + site_url + 'auth/logout">logout</a></div>');
	    });
	});
});