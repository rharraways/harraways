


  <!DOCTYPE html>
<!--
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
Simple. by Sara (saratusar.com, @saratusar) for Innovatif - an awesome Slovenia-based digital agency (innovatif.com/en)
Change it, enhance it and most importantly enjoy it!
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
-->

<!--[if !IE]><!-->
<html lang="$ContentLocale">
<!--<![endif]-->
<!--[if IE 6 ]><html lang="$ContentLocale" class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html lang="$ContentLocale" class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="$ContentLocale" class="ie ie8"><![endif]-->
<head>
  <% base_tag %>
   <head>
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


   </head>
<body class="">
<% include Header %>
<button onclick="topFunction()" id="myBtn" title="Go to top">&uarr;</button>



<div class="main" role="main">
  <div class="inner typography line">

          <div class="container">
              <div class="row py-4  text-center justify-content-center">
                 <div class="col-md-4">

                                <input type="hidden" name="on0" value="This is my drop down" /><h1 style="position:relative;margin-bottom:10px;">Explore Our Recipes</h1>

                                <select id="recipeCategory" name="selected" class="target" onchange="goToPage(this.value)" accesskey="E" class="spec-field1">
                                     <option selected>All Recipes</option>
                                      <% loop $ListPageByType('RecipeCategorySecondLevelPage') %>
                                         <option value="$BaseHref$Link">$Title</option>
                                      <% end_loop %>

                                </select>

                       </div>
               </div>
          </div>


         <div class="container">
            <div class="row py-4  text-center justify-content-center">
                     <div class="col-md-4">
                          <input id="receipe_input"  id="Form_SearchForm_ShortTitle"  name="ShortTitle" class="form-control mr-sm-2 cbl bout-bl fz14" type="search" placeholder="" value="" aria-label="Search">

                     </div>

            </div>
         </div>



      <div class="container">
          <div class="row py-4  text-center justify-content-center">

              <div class="col-md-4">
                  <input  type="submit" id="receipeSearch" value="Search"/>
              </div>

          </div>
      </div>





    <section class="PRD">
            <div class="container">

                <div class="row  text-uppercase text-center justify-content-center py-8 cbl">
                    <% if $recipes.count ==0 %>
                      <h1> No Recipes Found </h1>
                     <% else %>
                          <% loop $recipes %>
                          <div class="col-lg-3 col-md-3 col-sm-3 col-6 py-3">
                           <a href="$Link"> <img src="$PlaceHolderImage.CroppedImage(300,300).URL" class="img-fluid" alt=""></a>
                            <p><a href="$Link" class="cbl tdu fw6">$ShortTitle</a></p>
                          </div>
                          <% end_loop %>
                      <% end_if %>
                </div>
              </div>

     </section>






  </div>

<% include Footer %>

    <% require javascript('framework/thirdparty/jquery/jquery.js') %>

    <%-- Please move: Theme javascript (below) should be moved to mysite/code/page.php  --%>
    <link rel="stylesheet" href="{$ThemeDir}/css/jquery.fancybox.css?v=2.1.7" type="text/css" media="screen" />
    <script type="text/javascript" src="{$ThemeDir}/javascript/jquery.fancybox.js"></script>
    <script type="text/javascript" src="{$ThemeDir}/javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="{$ThemeDir}/javascript/script.js"></script>
</div>
</body>
</html>
