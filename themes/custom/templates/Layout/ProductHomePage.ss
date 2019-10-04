<div class="container">
    <div class="row text-center cbl py-12 flex-lg-row ">
        <div class="col-md-12" style="margin-bottom:30px;" >
            <div class="container">
                <a> <img id=""  src="$ProductCategoryBannerImage.URL" class="img-fluid" alt=""></a>


            </div>


        </div>
    </div>
</div>

<div class="container" style="margin-bottom:20px";>

    <div class="row text-uppercase text-center justify-content-center " style="margin-top:20px;">

        <% loop $ListPageByType('ProductCategory') %>

        <div class="col-md-3" style="margin-top:25px;">

            <a href="$Link"> <img id=""   src="$ProductCategoryPlaceHolderImage.URL" class="img-fluid" alt=""></a>

            <p><a href="$Link" class="text-uppercase"> $ShortTitle </a></p>

        </div>

        <% end_loop %>

    </div>

</div>


<div class="container">
    <div class="row text-center cbl py-12 flex-lg-row ">
        <div class="col-md-12" style="margin-bottom:30px;" >
            <div class="container">
                <a> <img id=""  src="$ProductCategoryFooterBannerImage.URL" class="img-fluid" alt=""></a>


            </div>


        </div>
    </div>
</div>

<% include PageFooter %>

