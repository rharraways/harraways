;(function($) { 
	$('.dropdown').click(function(event){
		if ($(this).find('dropdown-content')) {
			event.preventDefault();
			$(this).find(".dropdown-content").slideToggle( "slow");
		}
	});
})(jQuery);