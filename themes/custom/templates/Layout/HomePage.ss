<section>

     <div class="container">
            <div class="row text-center cbl py-12 flex-lg-row ">
                    <div class="col-md-12" style="margin-bottom:30px;" >
                               <div id="textoverimage" class="container">
                                      <a href="$HomePageImageLink.Link"> <img id=""  src="$HomePageImage.URL" class="img-fluid" alt=""></a>

                                       <div class="centered">
                                           <!--  <h2>$Header1</h2>
                                             <h1>$Header2</h1>
                                            <h2>$Header3</h2 >
                                            <button onclick="location.href='$BaseHref/Product';">See More</button>-->
                                       </div>
                              </div>
                              <div style="margin-top:20px;">
                               <h1>$HeaderDescription</h1>
                               <italicText>$Description</italicText>
                             </div>

                       
                    </div>
            </div>



        </div>

    <div class="container">

        <div class="row  text-uppercase text-center justify-content-center"  style="margin-top:25px;">
            <!--display only 5 products -->
            <% loop $GetFeatureProduct %>



               <% if $Pos == 1 %>
                    <div class="col-md col-sm-12">
                              <a href="$Link"> <img href="$Link" src="$PlaceHolderProductImage.URL"  class="img-fluid" alt=""></a>
                        <MrEavesh5><a href="$Link" class="cbl"> $ShortTitle </a></MrEavesh5>
                    </div>
               <% end_if %>

                <% if $Pos == 2 %>
                <div class="col-md col-sm-12">
                    <a href="$Link"> <img href="$Link" src="$PlaceHolderProductImage.URL"  class="img-fluid" alt=""></a>
                    <MrEavesh5><a href="$Link" class="cbl"> $ShortTitle </a></MrEavesh5>
                </div>
                <% end_if %>

                <% if $Pos == 3 %>
                <div class="col-md col-sm-12">
                    <a href="$Link"> <img href="$Link" src="$PlaceHolderProductImage.URL"  class="img-fluid" alt=""></a>
                    <MrEavesh5><a href="$Link" class="cbl"> $ShortTitle </a></MrEavesh5>
                </div>
                <% end_if %>

                <% if $Pos == 4 %>
                <div class="col-md col-sm-12">
                    <a href="$Link"> <img href="$Link" src="$PlaceHolderProductImage.URL"  class="img-fluid" alt=""></a>
                    <MrEavesh5><a href="$Link" class="cbl"> $ShortTitle </a></MrEavesh5>
                </div>
                <% end_if %>

                <% if $Pos == 5 %>
                <div class="col-md col-sm-12">
                    <a href="$Link"> <img href="$Link" src="$PlaceHolderProductImage.URL"  class="img-fluid" alt=""></a>
                    <MrEavesh5><a href="$Link" class="cbl"> $ShortTitle </a></MrEavesh5>
                </div>
                <% end_if %>



        <% end_loop %>
            <div class="col-md-12" style="margin-top:20px;">
                <a   href="$BaseHref/product" ><img style="width:208px;" src="$ThemeDir/images/moreproduct.png" ></a>
            </div>

    </div>

    </div>
</section>


<section style="margin-top:20px;">

    <div class="container">
        <div class="row text-center cbl py-12 flex-lg-row ">

            <div class="col-md-12" style="margin-bottom:30px;" >
                <div id="textoverimage" class="container">
                    <% loop $ListPageByType('RecipeListPage') %>


                    <a href="$Link"> <img id="receips"   src="$RecipeListPageBannerImage.URL" class="img-fluid" alt=""></a>
                    <div class="centered">
                      <!--  <h1>$Header1</h1>
                        <h2>$Header2</h2 >
                        <h2>$Header3</h2 >
                       <button onclick="location.href='$BaseHref/Recipe';">See More</button>-->
                    </div>

                    <% end_loop %>
                </div>

            </div>

        </div>
    </div>
</section>


 <% include PageFooter %>
