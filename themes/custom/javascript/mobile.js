;(function($) { 
	$('.dropdown').click(function(event){
		if ($(this).find('.dropdown-content') && event.target.className  !== 'nav-link') {
			event.preventDefault();
			$(this).find(".dropdown-content").slideToggle( "slow");
			console.log(event.target.className );
		}
	});
})(jQuery);