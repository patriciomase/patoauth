$('#sign-in').click(function(e){

	e.preventDefault();

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

	    if(response.result == true){
	    	window.location = site_url;
	    }
	});
});