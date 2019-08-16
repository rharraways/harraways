<div class="container">
	<div class="row col-md-12">
		<div class="col-md-6" style="margin-bottom:30px;" >
			<a  href="$Link"> 
				<img id="" src="$ReceipePageImage.CroppedImage(500,500).URL" class="img-fluid" alt="">
			</a>
		</div>
		<div class="col-md-6 " style="margin-bottom:30px; border-bottom: 1px solid black; border-bottom-color: #ab9271;">
			<productTitle class="text-uppercase">$ShortTitle</productTitle>
			<hr class="producePage"/>
			<productTitle2 class="text-uppercase">$ShortTitle2</productTitle2>
			<hr class="producePage"/>
			<div class="row col-md-12">
				<% if $Box1 %>
					<div class="col-md-custom-recipe_text" >
						<div>
							<productTitle2>PREP TIME:</productTitle2>
						</div>
						<div>
							<receipeDesc> $Box1 </receipeDesc>
						</div>
					</div>
				<% end_if %>
				<% if $Box2 %>
					<div class="col-md-custom-recipe_text" >
						<div>
							<productTitle2>COOK TIME:</productTitle2>
						</div>
						<div>
							<receipeDesc> $Box2 </receipeDesc>
						</div>
					</div>
				<% end_if %>
				<% if $Box3 %>
					<div class="col-md-custom-recipe_text" >
						<div>
							<productTitle2>SERVES:</productTitle2>
						</div>
						<div>
							<receipeDesc> $Box3 </receipeDesc>
						</div>
					</div>
				<% end_if %>
			</div>
			<hr class="producePage"/>
			<div class="col-md-12" >
				<!-- recipe text -->
				<% loop $ListPageByTypeUsingID('Product',$ProductID) %>
					<% if $ShortTitle %>
						<div class="col-md-custom-recipes" style="text-align: left;margin-right:1px !important; margin-left:-25px !important;">
							<a href="$Link" >
								<img style="text-align: left;" src="$ProductthumbnailImage.SetRatioSize(125,125).URL"  class="img-fluid" alt="">
							</a>
						</div>
						<div id="recipe" class="col-md-6" style="margin-right:1px !important; margin-left:-14px !important;">
							<receipeDesc>Made with Harraways <br/>
								$ShortTitle 
							</receipeDesc>
						</div>
					<% end_if %>
				<% end_loop %>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row col-md-12">
			<div class="col-md-5 " >
				<div class="row  justify-content-center py-8 cbl">
					<div class="col-md-12">
						<receipeTitle class="text-uppercase ">$IngredientsTitle</receipeTitle>
					</div>
					<div class="col-md-12">
						<receipeDesc class="text-left"> $IngredientsText</receipeDesc>
					</div>
				</div>
			</div>
			<div class="col-md-7 offset-md-custom" >
				<div class="row justify-content-center py-8 cbl">
					<div class="col-md-12">
						<receipeTitle class="text-uppercase ">$MethodTitle:</receipeTitle>
					</div>
					<div class="col-md-12 ">
						<receipeDesc class="text-left"> $MethodText </receipeDesc>
					</div>
				</div>
			</div>
		</div>
	</div>
	<% loop $RecipeVideos %>
		<% if $FeaturedVideo %>
			<div class="container">
				<div class="row text-center justify-content-center py-4 cbl">
					<div class="col-md-8">
						<div  class="center" style="max-width: 60px;">
							<img style="margin-top:10px;width:100%;" src="$ThemeDir/images/leaf2.png" class="img-fluid" alt="">
						</div>
						<h1 class="fwb">$FeaturedVideoTitle</h1>
						<div class="embed-responsive embed-responsive-16by9 my-5">
							<iframe class="embed-responsive-item" src="$FeaturedVideo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>$FeaturedVideo.Raw</iframe>
						</div>
						<h1 class="fwb mt-0 pt-0"> 
							<a style="text-decoration: underline;" target="_blank" href="$BlogLink" class="cbl">$BlogText</a> 
						</h1>
					</div>
				</div>
			</div>
		<% end_if %>
	<% end_loop %>
	<div class="container-recipes_icons">
		<hr class="producePage"/>
		<div class="col-md-custom-recipes">
			<productTitle2 class="left">
				<a target="_blank" href='href="//www.facebook.com/sharer.php?u='.$link.'"' ><img src="$ThemeDir/images/facebook-icon.png" style="height:30px;" class="img-fluid" alt=""></a>
				<a target="_blank" href"$SiteConfig.Instagram" ><img src="$ThemeDir/images/instagram-icon.png" style="margin-left:4px;height:30px;" class="img-fluid" alt=""></a>
				SHARE THIS RECIPE
			</productTitle2>
		</div>
		<div class="col-md-custom-recipes">
			<productTitle2 class="right">
				<a href="#" onClick=" window.print(); return false" ><img style="height:30px;"src="$ThemeDir/images/print-icon.png"></a>
				PRINT RECIPE
			</productTitle2>
		</div>
	</div>

	<div class="container text-center my-3">
		<div class="row  text-center justify-content-center">
			<div class="col-md-12  text-center justify-content-center py-8 cbl" style="margin-bottom:20px;">
				<hr class="producePage"/>
				<productampihan>Try these tasty recipes</productampihan>
			</div>
			<div class="col-md-2">

			</div>
			<div class="col-md-8 text-uppercase ">
				<div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
					<div class="carousel-inner w-100" role="listbox">
						<div class="carousel-item row no-gutters active">
							<% loop $ListPageByType('RecipePage') %>
								<% if $Pos =1 || $Pos =2 || $Pos =3 %>
									<div class="col-4 float-left"><img class="img-fluid" src="$PlaceHolderImage.CroppedImage(225,277).URL">
										<MrEavesh5><a href="$Link" class="cbl"> $ShortTitle </a></MrEavesh5>
									</div>
								<% end_if %>
							<% end_loop %>
						</div>
						<div class="carousel-item row no-gutters">
							<% loop $ListPageByType('Product') %>
								<% if $Pos =4 || $Pos =5 || $Pos =6 %>
									<div class="col-4 float-left"><img class="img-fluid" src="$PlaceHolderImage.CroppedImage(225,277).URL">
										<MrEavesh5><a href="$Link" class="cbl"> $ShortTitle </a></MrEavesh5>
									</div>
								<% end_if %>
							<% end_loop %>
						</div>
					</div>
					<a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="col-md-2">

			</div>
			<a   href="$BaseHref/all-recipe"><img  style="max-width: 150px" src="$ThemeDir/images/seemore.jpg" ></a>

		</div>
	</div>
<% include PageFooter %>
<!--

<div class="container bgelp" style="margin-bottom:0px !important;margin-top:10px;">
<div class="row py-4  text-center justify-content-center">
<div class="col-md-4">

<input type="hidden" name="on0" value="This is my drop down" /><h1 style="position:relative;margin-bottom:10px;">Explore Our Recipes</h1>


<select id="recipeCategory" name="selected" class="target" onchange="goToPage(this.value)" accesskey="E" class="spec-field1">
<option selected>All Recipes</option>
<% loop $ListPageByType('RecipePage') %>
<option value="$BaseHref$Link">$Title</option>
<% end_loop %>

</select>

</div>
</div>
</div>

<div class="container" style="margin-bottom:0px !important;background:#F1DBC2;">
<div class="row text-center justify-content-center">
<div class="col-md-4" style="margin-top:-10px;margin-bottom:20px;">
<input id="receipe_input" style="margin-bottom-20px;"  id="Form_SearchForm_ShortTitle"  name="ShortTitle" class="form-control mr-sm-2 cbl bout-bl fz14" type="search" placeholder="" value="" aria-label="Search">



</div>
</div>
</div>


<div class="container"
<div class="col-md-4" style="margin-top:10px;margin-bottom:20px;">
<div class="text-center justify-content-center">
<input  type="submit" id="receipeSearch" value="Search"/>
</div>

</div>
</div>



<section>

<div class="recipecontainer">
<div class="row text-center cbl py-12 flex-lg-row ">
<% loop $ListPageByType('RecipePage') %>

<% if DisplayRecipeAsFeatureRecipes && $BannerImage %>
<div class="col-md-12" style="margin-bottom:30px;" >

<a> <img id="receipsImg" style="width: 100%; height: 300px;" src="$BannerImage.URL" class="img-fluid" alt=""></a>
<h2 class="text1R">$Header1</h2>
<h2 class="text2R">$Header2</h2>
<button onclick="location.href='$Link';"  class="btnR">Take Me To THE RECIPE</button>
</div>
<% end_if %>

<% end_loop %>

</div>
</div>
</section>

-->