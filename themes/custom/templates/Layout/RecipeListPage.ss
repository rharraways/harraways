<div class="container">
    <div class="row text-center cbl py-12 flex-lg-row ">
        <div class="col-md-12" style="margin-bottom:30px;" >
            <div class="container">
                <a href="$RecipeListPageBannerImageLink.Link"> <img id=""  src="$RecipeListPageBannerImage.URL" class="img-fluid" alt=""></a>


            </div>


        </div>
    </div>
</div>

<div class="container" style="margin-bottom:20px";>

    <div class="row text-center cbl py-12 flex-lg-row " style="margin-top:20px;">
        <% loop $ListPageByType('RecipeCategoryFirstLevelPage') %>

        <div class="col-md-3" style="margin-top:25px;">

            <a> <img id=""  src="$RecipeCategoryPlaceHolderImage.CroppedImage(225,277).URL" class="img-fluid" alt=""></a>

            <p><a href="$Link" class="cbl"> $ShortTitle </a></p>


        </div>

        <% end_loop %>
    </div>

</div>


<div class="container">
    <div class="row text-center cbl py-12 flex-lg-row ">
        <div class="col-md-12" style="margin-bottom:30px;" >
            <div class="container">
                <a href="$RecipeListPageFooterBannerImageLink.Link"> <img id=""  src="$RecipeListPageFooterBannerImage.URL" class="img-fluid" alt=""></a>


            </div>


        </div>
    </div>
</div>



