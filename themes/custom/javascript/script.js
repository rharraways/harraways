jQuery.noConflict();

(function($) {
	$(document).ready(function() {
		$('[data-fancybox="gallery"]').fancybox({
			protect: true,

		});
		$('#recipeCarousel').carousel({
			interval: 10000
		})

		setNavigation();

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};
		/* removes text from search form on focus and replaces it on unfocus - if text is entered then it does not get replaced with default on unfocus */
		$('#SearchForm_SearchForm_action_results').val('L');
		var searchField = $('#SearchForm_SearchForm_Search');
		var default_value = searchField.val();
		searchField.focus(function() {
			$(this).addClass('active');
			if(searchField.val() == default_value) {
				searchField.val('');
			}
		});
		searchField.blur(function() {
			  if(searchField.val() == '') {
					searchField.val(default_value);
			  }
		});
        if(document.getElementById("receipeSearch") != null) {
			document.getElementById("receipeSearch").onclick = function () {
				searchUrl = searchRecipe();
				location.href = searchUrl;

			}
		}

		//};

		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-74551412-21', 'auto');
		ga('send', 'pageview');


		$('.limit').find('img').each(function()
		{
			var imgClass = (this.width / this.height > 1) ? 'wide' : 'tall';
			$(this).addClass(imgClass);
		})




	});
	function searchRecipe()
	{

		var partialSearchName =document.getElementById("receipe_input").value;

		var searchUrl = 'All-Recipe/recipeSearch?&partialname=' + partialSearchName ;

		return searchUrl;

	}


	function setNavigation() {
		var path = window.location.pathname;
		path = path.replace(/\/$/, "");
		path = decodeURIComponent(path);
		$("#nav a.root").each(function () {

			var href = $(this).attr('href');


			if (path.concat("/") ===href )  {
				$(this).closest('li').addClass('active');
			}


		});
        //loop parent with children
		$("#nav a.dropbtn").each(function () {
			var title = $(this).attr('title');
			if (window.location.href.indexOf(title.toLowerCase()) !== -1 )  {
				$(this).closest('li').addClass('active');
			}

			if (window.location.href.indexOf("productss") !== -1)  {
				alert($(this));
				$(this).closest('li').addClass('active');
			}
		});

	}


}(jQuery));
