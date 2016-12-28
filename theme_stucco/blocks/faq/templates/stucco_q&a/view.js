
$(function() {

	$('.q-a-contents > dt').click(function(){
		$(this).nextUntil('.q-a-contents dt').slideToggle('fast');
	});

});
