
<div class="container">
    <div class="row text-center cbl py-12 flex-lg-row ">
        <div class="col-md-12" style="margin-bottom:30px;" >
            <div id="textoverimage" class="container">
                <a href="$RecipeCategoryPageImageLink.Link"> <img id=""  src="$RecipeCategoryPageImage.URL" class="img-fluid" alt=""></a>

                <div class="centered">
                    <!--  <h2>$Header1</h2>
                      <h1>$Header2</h1>
                     <h2>$Header3</h2 >
                     <button onclick="location.href='$BaseHref/Product';">See More</button>-->
                </div>
            </div>



        </div>
    </div>



</div>

<section class="PRD">
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12" >
          <!--  <h1 class="text-uppercase text-center" style="text-align:center;margin-bottom:30px;margin-top:30px;">$ShortTitle</h1>
        --></div>
        <div class="row  text-uppercase text-center justify-content-center">
            <% loop $children %>
            <div class="col-md-3 col-sm-12" style="margin-top:25px;">
                    <div class="col-md-12">
                       <a href="$Link"> <img id=""   src="$PlaceHolderImage.CroppedImage(225,277).URL" class="img-fluid" alt=""></a>
                    </div>
                    <div class="col-md-12">
                       <a href="$Link" class="cbl"><MrEavesh5> $ShortTitle </MrEavesh5></a>
                    </div>
            </div>

            <% end_loop %>
        </div>
    </div>

</section>


<div class="container" style="margin-top:20px;">
    <div class="row text-center cbl py-12 flex-lg-row ">
        <% loop $ListPageByType('RecipeListPage') %>
            <div class="col-md-12" style="margin-bottom:30px;" >

                <div class="container">
                    <a href="$RecipeListPageFooterBannerImagelink.Link"> <img id=""  src="$RecipeListPageFooterBannerImage.URL" class="img-fluid" alt=""></a>


                </div>


            </div>
        <% end_loop %>
    </div>
</div>


<% include PageFooter %>