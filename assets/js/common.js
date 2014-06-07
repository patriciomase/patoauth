$('html').on('click', 'a', function(e){

	e.preventDefault();

	$.ajax({
	  type: "GET",
	  url: $(this).attr('href')
	})
	  .done(function(response) {

	    $('body').children('.content').fadeOut(500, function(){

	    	$('body').append(response);
	    });
	});
});