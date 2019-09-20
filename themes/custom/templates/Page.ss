
<!DOCTYPE html>

<!--[if !IE]><!-->
<html lang="$ContentLocale">
<!--<![endif]-->
<!--[if IE 6 ]><html lang="$ContentLocale" class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html lang="$ContentLocale" class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="$ContentLocale" class="ie ie8"><![endif]-->
<head>
	<% base_tag %>
	
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
		<link rel="icon" href="MI.ico">

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

		<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		$MetaTags(false)
		<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<% require themedCSS('bootstrap.min') %>
		<% require themedCSS('reset') %>
		<% require themedCSS('typography') %>
		<% require themedCSS('form') %>
		<% require themedCSS('layout') %>
		<% require themedCSS('responsive') %>
			

		<link rel="shortcut icon" href="$ThemeDir/images/favicon.ico" />
		<link rel="stylesheet" href="{$ThemeDir}/css/bootstrap.css" />
		<link rel="stylesheet" href="{$ThemeDir}/css/jquery.fancybox.min.css" />
		<script type="text/javascript" src="{$ThemeDir}/javascript/jquery-3.4.0.js"></script>

		<link rel="stylesheet" href="{$ThemeDir}/css/jquery.fancybox.css?v=2.1.7" type="text/css" media="screen" />
		<script type="text/javascript" src="{$ThemeDir}/javascript/jquery.fancybox.js"></script>
		<script type="text/javascript" src="{$ThemeDir}/javascript/bootstrap.min.js"></script>
		<script type="text/javascript" src="{$ThemeDir}/javascript/script.js"></script>
		<script>
	        // device detection
	        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) { 
	          console.log('css mobile');
	          document.getElementsByTagName('head')[0].appendChild('<link rel="stylesheet" type="text/css" href="{$ThemeDir}/css/mobile/m_typography.css">');
	          document.getElementsByTagName('head')[0].appendChild('<link rel="stylesheet" type="text/css" href="{$ThemeDir}/css/mobile/m_form.css">');
	          document.getElementsByTagName('head')[0].appendChild('<link rel="stylesheet" type="text/css" href="{$ThemeDir}/css/mobile/m_layout.css">');
	        }
      </script>

</head>
<body>
<% include Header %>
<button onclick="topFunction()" id="myBtn" title="Go to top">&uarr;</button>


<div class="main" role="main">
	<div class="inner typography line">

		$Layout
	</div>
</div>
<% include Footer %>
<%--require javascript('framework/thirdparty/jquery/jquery.js') --%>
<%-- Please move: Theme javascript (below) should be moved to mysite/code/page.php  --%>

<script>



	function goToPage(val)
	{
		window.open(val,"_self");

	}

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("myBtn").style.display = "block";
		} else {
			document.getElementById("myBtn").style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}




</script>



</body>
</html>
