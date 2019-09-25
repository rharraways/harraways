;(function($) { 
	$('.dropdown').click(function(event){
		$(this).find(".dropdown-content").slideToggle( "slow");
	});
})(jQuery);