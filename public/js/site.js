$(function(){
	$(".datepicker").datepicker();
	$("body").on('click','#front_page_login_box',function(e){
		var email = $("#front_email").val();
		var pass = $("#front_password").val();
		$.post("/signin",
		{
			email: email,
			password: pass
		}).done(function(data){
			location.href = "/";
		}).fail(function(){
			$(".login_validation_error").html("");
			$(".login_validation_error").append("<div class='alert alert-danger'>Login was not successful! Please try again.</div>");
		});
		e.preventDefault();
	});


//attach timeago.
jQuery.timeago.settings.allowFuture = true;
$(".timeago").timeago();

//make table rows clickable.
$(".clickableRow").click(function(){
	window.document.location = $(this).attr('href');
})

});
