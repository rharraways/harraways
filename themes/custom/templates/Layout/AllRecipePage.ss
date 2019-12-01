<div class="container">
    <div class="row py-4  text-center justify-content-center">
        <div class="col-md-4">

            <input type="hidden" name="on0" value="This is my drop down" /><h1 style="position:relative;margin-bottom:10px;">Explore Our Recipes</h1>

            <select id="recipeCategory" name="selected" class="target" onchange="goToPage(this.value)" accesskey="E" class="spec-field1">
                <option selected>All Recipes</option>
                <% loop $ListPageByType('RecipeCategorySecondLevelPage') %>
                <option value="$BaseHref$Link">$Title</option>
                <% end_loop %>

            </select>

        </div>
    </div>
</div>


<div class="container">
    <div class="row py-4  text-center justify-content-center">
        <div class="col-md-4">
            <input id="receipe_input"  id="Form_SearchForm_ShortTitle"  name="ShortTitle" class="form-control mr-sm-2 cbl bout-bl fz14" type="search" placeholder="" value="" aria-label="Search">

        </div>

    </div>
</div>



<div class="container">
    <div class="row py-4  text-center justify-content-center">

        <div class="col-md-4">
            <input  type="submit" id="receipeSearch" value="Search"/>
        </div>

    </div>
</div>





<div class="container">
          <% loop $ListPageByType('RecipeCategoryFirstLevelPage') %>
            <div style="margin-top:20px;" class="row  text-uppercase text-center justify-content-center py-8 cbl">
               <h1>$ShortTitle</h1>
            </div>
              <div class="row  text-uppercase text-center justify-content-center py-8 cbl">
                <% loop $children %>
                <div class="col-lg-3 col-md-3 col-sm-3 col-6 py-3">
                 <a href="$Link"> <img src="$PlaceHolderImage.CroppedImage(300,300).URL" class="img-fluid" alt=""></a>
                  <mreavesh5><a href="$Link">$ShortTitle</a></mreavesh5>
                </div>
                <% end_loop %>
                </div>
           <% end_loop %>

      </div>






