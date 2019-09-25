;(function($) { 
	$('.dropdown').click(function(event){
		$(this).find(".dropdown-content").toggle(
			function() {
			    $(this).animate({height: 0}, 400);
			},
			function() {
			    $(this).animate({height: 'auto'}, 400);
			}
		);
	});
})(jQuery);