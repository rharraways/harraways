test
<div class="container" style="background-color:#1F2C63;">
    <div class="row py-4  text-center justify-content-center">
        <div class="col-md-4">
            <form class="spec-table" name="dropdown">
                <div  class="center" style="max-width: 60px;">
                    <div  class="center" style="max-width: 60px;">
                        <img style="margin-top:10px;width:100%;" src="$ThemeDir/images/leaf3.png" class="img-fluid" alt="">
                    </div>
                </div>
                <input type="hidden" name="on0" value="This is my drop down" /><h1 id="overlay">Find Our Products</h1>
                <select name="selected" class="target" onchange="goToPage(this.value)" accesskey="E" class="spec-field1">
                    <option selected>Please select one</option>
                    <% loop $ListPageByType('Product') %>
                        <option value="$BaseHref$Link">$Title</option>
                    <% end_loop %>       
                </select>       
            </form>
        </div>
    </div>
</div>

<section class="PRD">
    <div class="container">
        <div class="row text-uppercase text-center justify-content-center">
            <% loop $ListPageByType('Product') %>
                <div class="col-md-3" style="margin-top:25px;">
                    <a href="$Link" >
                        <img src="$PlaceHolderProductImage.CroppedImage(250,250).URL"  class="img-fluid" alt="">
                    </a>
                    <p><a href="$Link" class="cbl fw6"> $Title </a></p>
                </div>
            <% end_loop %>
        </div>
    </div>
</section>

