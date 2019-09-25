;(function($) { 
	$('.dropdown').click(function(event){
		$(this).find(".dropdown-content").slidetoggle( "slow", function() {
    // Animation complete.
  });
	});
})(jQuery);