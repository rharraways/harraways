


   <section class="PRD">
      <div class="container">
      <div class="col-lg-12 col-md-12" >
          <h1 style="text-align:center;margin-bottom:30px;margin-top:30px;">$ShortTitle</h1>
      </div>
        <div class="row  text-uppercase text-center justify-content-center py-8 cbl">
          <% loop $children %>
          <div id="listPageRecipeImg" class="col-lg-2 col-md-2 col-sm-2 col-6 py-3">
           <a href="$Link"> <img src="$PlaceHolderImage.CroppedImage(300,300).URL" class="img-fluid" alt=""></a>
            <p><a href="$Link" class="cbl fw6">$ShortTitle</a></p>
            <p class="recipeShortTitleReg">$SmallShortTitle</p>
          </div>
          <% end_loop %>         
        </div>
      </div>

   </section>

