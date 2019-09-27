;(function($) { 
	$('.dropdown').click(function(event){
		event.preventDefault();
		$(this).find(".dropdown-content").slideToggle( "slow");
	});
})(jQuery);