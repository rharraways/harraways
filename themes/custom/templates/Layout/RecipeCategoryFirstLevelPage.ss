<!--
<div class="container">
    <div class="row text-center cbl py-12 flex-lg-row ">
        <div class="col-md-12" style="margin-bottom:30px;" >
            <div id="textoverimage" class="container">
                <a href="$RecipeCategoryPageImageLink.Link"> <img id=""  src="$RecipeCategoryPageImage.URL" class="img-fluid" alt=""></a>
                <div class="centered">
                    <h2>$Header1</h2>
                    <h1>$Header2</h1>
                    <h2>$Header3</h2 >
                    <button onclick="location.href='$BaseHref/Product';">See More</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row text-center justify-content-center">
        <div class="col-md-4" style="">
            <input id="receipe_input"   id="Form_SearchForm_ShortTitle"  name="ShortTitle" class="form-control mr-sm-2 cbl bout-bl fz14" type="search" placeholder="search for recipe with keywords" value="" aria-label="Search">
        </div>
        <div class="text-center justify-content-center">
            <input  type="submit" id="receipeSearch" value="Search"/>
        </div>
    </div>
</div>
-->
<div class="recipe_spacer"></div>
<section class="PRD">
    <div class="container">
        <% loop $children %>
            <div class="row  text-center justify-content-center py-8 cbl">
                <div class="col-md-12 " style="margin-bottom:10px;">
                    <div  id="recipespan" class="center" >
                        <span> <a href="$Link" class=""><ampihanh1>$ShortTitle</ampihanh1></a></span>
                    </div>
                </div>
               
                <% loop $children %>
                    <% if Pos <= 5 %>
                        <div id="listPageRecipeImg" class="col-sm-12 col-lg-2 col-md-2  text-center">
                            <a href="$Link"> <img src="$PlaceHolderImage.CroppedImage(300,300).URL" class="img-fluid" style="margin-top:20px; " alt=""></a>
                            <p><a href="$Link" class="cbl fw6 "><MrEavesh5>$ShortTitle</MrEavesh5></a></p>
                            <receipeSmallDesc>$SmallShortTitle</receipeSmallDesc>
                        </div>
                    <% else %>
                        <div id="listPageRecipeImg" class="col-sm-12 col-lg-2 col-md-2  text-center extra">
                            <a href="$Link"> <img src="$PlaceHolderImage.CroppedImage(300,300).URL" class="img-fluid" style="margin-top:20px; " alt=""></a>
                            <p><a href="$Link" class="cbl fw6 "><MrEavesh5>$ShortTitle</MrEavesh5></a></p>
                            <receipeSmallDesc>$SmallShortTitle</receipeSmallDesc>
                        </div>
                    <% end_if %>
               <% end_loop %>
               <!-- see more button --->
               <% if $children.Count > 5 %>
                   <div class="col-md-12" style="margin-bottom:10px;">
                       <div  class="center" >
                           <a class="display_more" href="$Link"><img  style="max-width: 150px" src="$ThemeDir/images/seemore.jpg" ></a>
                       </div>
                   </div>
                <% end_if %>
           </div>
        <% end_loop %>         
    </div>
</section>

