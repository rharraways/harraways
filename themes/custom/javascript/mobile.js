;(function($) { 
	$('.dropdown').click(function(event){
		console.log(event.target.className );
		if ($(this).find('.dropdown-content') && event.target.className  !== 'nav-link child') {
			event.preventDefault();
			$(this).find(".dropdown-content").slideToggle( "slow");
			console.log(event.target.className );
		}
	});
})(jQuery);