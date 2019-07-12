
<section class="PRD" style="margin-bottom:15px;">
      <div class="container">          
              <div style="" class="row col-md-7 col-centered text-center">

          <% loop $children %>
          <div class="col-md-4">
           <a href="$Link"> <img src="$PlaceHolderImage.CroppedImage(140,140).URL" class="img-fluid" alt=""></a>
            
          </div>
          <% end_loop %>  
          <% if InternationalPlaceHolderImage %>
              <div class="col-md-4">
               <a href="$BaseHref/International-sales"> <img src="$InternationalPlaceHolderImage.CroppedImage(140,140).URL" class="img-fluid" alt=""></a>
             
              </div>   
          <% end_if %>    

          <% if DomesticPlaceHolderImage %>
              <div class="col-md-4">
               <a href="$BaseHref/Domestic-sales"> <img src="$DomesticPlaceHolderImage.CroppedImage(140,140).URL" class="img-fluid" alt=""></a>
              
              </div>   
          <% end_if %>  
        </div>
      </div>
   </section>

   <section class="BAR">
      <div class="container-fluid p-0 m-0">
        <div class="row m-0 p-0">
          <div class="col-12 p-0">
            <img src="$ThemeDir/images/bar.jpg" class="w-100" alt="">
          </div>
        </div>
      </div>
   </section>

 <% include PageFooter %>
