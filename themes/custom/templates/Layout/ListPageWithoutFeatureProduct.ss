<section class="FRM bgel" style="margin-bottom:5px;">
      <div class="container">
        <div class="row text-center justify-content-center py-12 cbl">
          <div class="col-10 ">
          
            <h1 class="fwb">$Title</h1>
            <p>$Content</p>
          </div>
        </div>
      </div>
    </section>
<section class="PRD">
      <div class="container">
        <div class="row text-center justify-content-center py-12 cbl">
          <% loop $children %>
          <div class="col-md-3">
             <div class="limit">
               <a href="$Link"> <img src="$PlaceHolderImage.CroppedImage(650,650).Url" class="img-fluid" alt=""></a>
                <p><a href="$Link" class="cbl tdu fw6">$ShortTitle</a></p>
             </div>
          </div>
          <% end_loop %>         
        </div>
      </div>
</section>

   




   

