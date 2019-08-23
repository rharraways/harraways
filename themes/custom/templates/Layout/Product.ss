 <div class="container">

         <!-- <div class="row ">


         <% control PreviousPage %>
           <div class="col-12">
               <h2  style="margin-left:20px !important; margin-top:15px;"> <a href="$Link" title="Go to the previous page"> < Back to $Title </a> </h2>
          </div>
         <% end_control %>
          </div>!-->
         <div class="row cbl py-4 flex-lg-row ">


              <div id="" class="col-md-4">
                 <span class=""></span>
                 <a href="$Link"> <img href="$Link" src="$PlaceHolderProductImage.URL"  class="img-fluid" alt=""></a>

              </div>

               <div class="col-md-4" style="margin-left:20px;">
                      <div>

                          <productTitle>$Product.Title</productTitle>
                          <hr class="producePage"/>
                          <productTitle2>$Product.ProductMainHeaderDescription</productTitle2>

                          <hr class="producePage"/>

                          <productDesc>$Product.ProductMainDescription</productDesc>

                          
                          <div class="col-md-custom-recipes">
                            <productTitle2 class="left">
                              <a target="_blank" href="//www.facebook.com/sharer.php?u=$AbsoluteLink" ><img src="$ThemeDir/images/facebook-icon.png" style="height:30px;" class="img-fluid" alt=""><span class="recipe_icon_text">SHARE THIS RECIPE</span></a>
                            </productTitle2>
                          </div>
                          <div class="col-md-custom-recipes">
                            <productTitle2 class="right">
                              <a href="http://www.theharrydog.com//storefinder"><img src="themes/custom/images/storeloc.png" style="height:30px;" class="img-fluid" alt=""><span class="recipe_icon_text">FIND STORE</span></a>
                            </productTitle2>
                          </div>
                          <hr class="producePage"/>
                      </div>

                     <!-- <h3 class="product-price-js">$Product.Price.Nice</h3> -->
               </div>
             <div class="col-md-3">
                 <% loop ProductImages %>

                 <div class="parent-container col-12" >
                     <!--   $Me -->

                     <a  rel="group"  href="$Link" data-fancybox="gallery"> <img href="$Link" src=" $CroppedImage(180,180).URL"  class="img-fluid thumbnail" alt="">
                     </a>

                 </div>

                 <% end_loop %>
             </div>


       </div>
     </div>
     <div class="container text-center my-3">
         <div class="row  text-center justify-content-center">
             <div class="col-md-12  text-center justify-content-center py-8 cbl" style="margin-bottom:20px;">
                 <hr class="producePage"/>
                 <productampihan>Try more of our delicious products</productampihan>
             </div>
             <div class="col-md-2">

             </div>
             <div class="col-md-8 text-uppercase ">

                 <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                     <div class="carousel-inner w-100" role="listbox">
                         <div class="carousel-item row no-gutters active">
                         <% loop $ListPageByType('Product') %>

                            <% if $Pos =1 || $Pos =2 || $Pos =3 %>
                                <div class="col-4 float-left"><img class="img-fluid" src="$PlaceHolderProductImage.CroppedImage(225,277).URL">
                                    <MrEavesh5><a href="$Link" class="cbl"> $ShortTitle </a></MrEavesh5>
                                </div>
                             <% end_if %>
                         <% end_loop %>
                         </div>
                         <div class="carousel-item row no-gutters">
                         <% loop $ListPageByType('Product') %>

                            <% if $Pos =4 || $Pos =5 || $Pos =6 %>
                                    <div class="col-4 float-left"><img class="img-fluid" src="$PlaceHolderProductImage.CroppedImage(225,277).URL">
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

             <a   href="$BaseHref/product" style="margin-top:20px;"><img style="width:208px;" src="$ThemeDir/images/moreproduct.png" ></a>
         </div>
     </div>


     <div class="container">
         <div class="row  text-uppercase text-center justify-content-center">

                    <% loop $ListPageByType('Product') %>




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


