;(function($) { 
	$('.dropdown').click(function(event){
		function() {
		    $(this).find(".dropdown-content").animate({height: 0}, 400);
		},
		function() {
		    $(this).find(".dropdown-content").animate({height: 'auto'}, 400);
		}
	});
})(jQuery);