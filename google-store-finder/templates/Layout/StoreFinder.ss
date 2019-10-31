
<div class="container">           
    <div class="row">
        <div class="col-md-4 text-center justify-content-center">
            <div class="row text-center justify-content-center" style="margin-bottom:40px;">
                <h1 class="text-uppercase">$Content</h1>
            </div>
            <div class="col-md-12" style="margin-bottom:20px;width:100%;">
                <select  style="width:100%;" id="productSelect">
                    <option  style="width:100%;" value="noProductSelected">Please select product</option>
                    <% loop $ListPageByType('Product') %>
                        <option value="$title">$Title</option>
                    <% end_loop %>
                </select>
            </div>
            <div class="col-md-12" style="margin-bottom:20px;width:100%;">
                <input style="width:100%;" type="text" class="text" id="addressInput" placeholder="Enter Post code OR Address"  />
            </div>
            <!--<div class="col-md-12" style="margin-bottom:20px;width:100%;">
                <h3 class="text-uppercase">SEARCH VIA DISTANCE</h3>
                <select  style="width:100%;" id="radiusSelect">
                    <option  style="width:100%;" value="0" selected>Please select distance</option>
                    <option  style="width:100%;" value="25">25km</option>
                    <option value="50" >50km</option>
                    <option value="100">100km</option>
                    <option value="200"> greater than 200km</option>
                </select>
            </div>-->
            <div class="col-md-12" style="margin-bottom:20px;">
                <input style="width:100%;" type="submit" id="searchLocations" value="Search"/>
            </div>
            <!--<div class="col-md-12">
                <div class="row text-center justify-content-center" style="margin-bottom:20px;">
                    <h1 class="text-uppercase">OR</h1>
                </div>
                <input  style="width:100%;" type="submit" id="findCurrentLocation" value="Use Current Location"/>
            </div>-->
        </div>
        <div class="col-md-8 store-map">
            <div style="margin-bottom:10px;"><select id="locationSelect" style="width:100%;visibility:hidden"></select></div>
            <div id="map" style="width: 100%; height: 600px;"></div>
        </div>
    </div>
</div>
