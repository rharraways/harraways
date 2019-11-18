<div class="container">
    <div class="row text-center cbl py-12 flex-lg-row ">
        <div class="col-md-12" style="margin-bottom:30px;" >
            <div id="textoverimage" class="container">
                <a href="$BaseHref/about-us"> <img id="" src="$ProductCategoryBannerImage.URL" class="img-fluid" alt=""></a>
            </div>
        </div>
    </div>
</div>
ProductCategoryBannerImageLink

<div class="container">
    <div class="row  col-md-12 text-uppercase text-center justify-content-center">
        <% loop $Products %>
            <div class="col-md-3" style="margin-top:25px;">
                <a href="$Link" >
                    <img src="$PlaceHolderProductImage.URL"  class="img-fluid" alt="">
                </a>
                <MrEavesh5><a href="$Link" class="cbl"> $ShortTitle </a></MrEavesh5>

            </div>
        <% end_loop %>
    </div>
</div>

<div class="container" style="margin-top:20px;">
    <div class="row text-center cbl py-12 flex-lg-row ">
        <% loop $ListPageByType('ProductHomePage') %>
            <div class="col-md-12" style="margin-bottom:30px;" >
                <div class="container">
                    <a> <img id=""  src="$ProductCategoryFooterBannerImage.URL" class="img-fluid" alt=""></a>
                </div>
            </div>
        <% end_loop %>
    </div>
</div>

<% include PageFooter %>