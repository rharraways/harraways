/**
 * required for google map location search.
 */
var map;
var markers = [];
var infoWindow;
var locationSelect;

/**
 * required for geo-location
 */
var browserSupportFlag =  new Boolean();


function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}

function initializeGeoLocation() {



    if(navigator.geolocation) {

        browserSupportFlag = true;
        navigator.geolocation.getCurrentPosition(function() {
            var initialLocation = new google.maps.LatLng(-45.901990,170.435420);
            map.setCenter(initialLocation);
            map.setZoom(15);
        }



        , function() {
            handleNoGeolocation(browserSupportFlag);
        });
    }
    // Browser doesn't support Geolocation
    else {
        browserSupportFlag = false;
        handleNoGeolocation(browserSupportFlag);
    }
}

/**
 * handles situations where the browser does not support geolocation.
 * @param errorFlag
 */
function handleNoGeolocation(errorFlag) {
   if (errorFlag == true) {
        ///alert("Geolocation service failed.");
    } else {
       ///alert("Your browser doesn't support geolocation.");
    }
    var defaultLocation = new google.maps.LatLng(startLat, startLong);
    map.setCenter(defaultLocation);
    map.setZoom(startZoom);
}


/**

 */
function load() {

	map = new google.maps.Map(document.getElementById("map"), {
    	center: new google.maps.LatLng(-45.901990,170.435420),
		zoom: 12,
		mapTypeId: google.maps.MapTypeId["RoadMap"],
		mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
	});
	infoWindow = new google.maps.InfoWindow();

	locationSelect = document.getElementById("locationSelect");
	locationSelect.onchange = function() {
    	var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
		if (markerNum != "none"){
			google.maps.event.trigger(markers[markerNum], 'click');
		}
	};
}

/**
 * event handler bound to click event of the 'search for locations by zip code' button
 */
function searchLocations() {
	
	var address  = document.getElementById("addressInput").value;
	var geocoder = new google.maps.Geocoder();
	var product =document.getElementById('productSelect').value;

  console.log("searchLocations "+ address);
	
	geocoder.geocode({address: address + " nz"}, function(results, status) {

		if (status == google.maps.GeocoderStatus.OK && product !="noProductSelected" && address != " ") {
      console.log("searchLocations "+ results[0].geometry.location);
			searchLocationsNear(results[0].geometry.location,0,0,"useBoth");
		} 
    	else if (status == google.maps.GeocoderStatus.OK) {
      console.log("searchLocations "+ results[0].geometry.location);
			searchLocationsNear(results[0].geometry.location,0,0,"useAddress");
		} 
		else if(product !="noProductSelected") {
			searchLocationsNear(null,0,0,"noAddress");
		}
		else if(product == "noProductSelected" && address == " " ){
			alert("Please select either a product or enter a location addresss/post code");
		}
		else
		{		
           alert("no location found");
		}
	});
}

/**
 * function called after user enters a zipcode and google geocodes the zipcode to latlong coords.
 * this function takes the lat long and does an ajax call to retrieve locations close to the supplied parameters.
 * @param center
 */
function searchLocationsNear(center,lats,lngs,useCurrentLoc ) {
    clearLocations();
    var radius = document.getElementById('radiusSelect').value;
    var product =document.getElementById('productSelect').value;

    if(useCurrentLoc == "useLocation")
    {
    	 var lat = lats;
		   var lng = lngs;
    }
    else if(useCurrentLoc == "useAddress" || useCurrentLoc == "useBoth")
    {
		   var lat = center.lat();
		   var lng = center.lng();
    }
    
    if(useCurrentLoc =="useLocation")
    {
    	 if(product !="noProductSelected") 
    	 	useCurrentLoc == "useBoth"
    }
   
     
    if(useCurrentLoc == "noAddress")
       var searchUrl = 'storefinder/productSearch?&radius=' + radius  + '&productName='+ product;
    else if(useCurrentLoc == "useBoth") //product was seelcted 
	   var searchUrl = 'storefinder/productLocationSearch?lat=' + lat + '&lng=' + lng + '&radius=' + radius + '&productName='+ product;
    else
    	var searchUrl = 'storefinder/locationSearch?lat=' + lat + '&lng=' + lng + '&radius=' + radius;


    downloadUrl(searchUrl, function(data) {
      
        var xml = parseXml(data);
        var markerNodes = xml.documentElement.getElementsByTagName("marker");

        if(markerNodes.length > 0){
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0; i < markerNodes.length; i++) {
                var productname = markerNodes[i].getAttribute("productname");

                var storename = markerNodes[i].getAttribute("storename");
                var address = markerNodes[i].getAttribute("address");
                var distance = parseFloat(markerNodes[i].getAttribute("distance"));
                var latlng = new google.maps.LatLng(
                    parseFloat(markerNodes[i].getAttribute("lat")),
                    parseFloat(markerNodes[i].getAttribute("lng"))
                );
             
                createOption(productname,storename,address, distance, i);
                createMarker(latlng, storename, address);
               // bounds.extend(latlng);
            }
           // map.fitBounds(bounds);

        } else {
            alert("no locations found.");
        }
        autoCenter();
    });

    
}

 function autoCenter() {
 	
      //  Create a new viewpoint bound
      var bounds = new google.maps.LatLngBounds();
      //  Go through each...
      for (var i = 0; i < markers.length; i++) {  
                bounds.extend(markers[i].position);
      }
      //  Fit these bounds to the map
      map.fitBounds(bounds);
    }
/**
 * removes locations from the current google map.
 */
function clearLocations() {
	infoWindow.close();
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(null);
	}
	markers.length = 0;

	locationSelect.innerHTML = "";
	var option = document.createElement("option");
	option.value = "none";
	option.innerHTML = "See all results:";
	locationSelect.appendChild(option);
	locationSelect.style.visibility = "visible";
}

/**
 * googles method to perform ajax call, and callback a function when done.
 * used in searching for locations near a lat & long.
 * @param url
 * @param callback
 */
function downloadUrl(url,callback) {
	var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
	
	request.onreadystatechange = function() {
		if (request.readyState == 4) {
			request.onreadystatechange = doNothing;
			callback(request.responseText, request.status);
		}
	};

	request.open('GET', url, true);
	request.send(null);
}



/**
 * creates a marker on the google map for a location found in the database after a zipcode search.
 * @param latlng
 * @param name
 * @param address
 */
function createMarker(latlng, name, address) {
	var html = "<b>" + name + "</b> <br/>" + address;


	var marker = new google.maps.Marker({
    	title: name,
		position: latlng
	});
	marker.setMap(map);
	google.maps.event.addListener(marker, 'click', function() {
    	infoWindow.setContent(html);
		infoWindow.open(map, marker);
	});
    

	markers.push(marker);
	

}

/**
 * adds a location as a dropdown menu option after user searches by zipcode.
 * @param name
 * @param distance
 * @param num
 */
function createOption(productname, storename,address, distance,num) 
{
	var option = document.createElement("option");
	option.value = num;
	option.innerHTML = storename + "-" + productname +"(" + address + ")";
	locationSelect.appendChild(option);
}


/* find current location */

function findCurrentLocation() 
{
	
		if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) 
          {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            searchLocationsNear(pos,pos.lat,pos.lng,"useLocation");
            infoWindow.setPosition(pos);
          //  infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }

        
 }
       
 function handleLocationError(browserHasGeolocation, infoWindow, pos) 
 {
       infoWindow.setPosition(pos);
       infoWindow.setContent(browserHasGeolocation ?
      'Error: The Geolocation service failed.' :
      'Error: Your browser doesn\'t support geolocation.');
       infoWindow.open(map);
 }
 





/**
 * parse xml returned by location zipcode search.
 * @param str
 * @returns {*}
 */
function parseXml(str) {
	if (window.ActiveXObject) {
		var doc = new ActiveXObject('Microsoft.XMLDOM');
		doc.loadXML(str);
		return doc;
	} else if (window.DOMParser) {
		return (new DOMParser).parseFromString(str, 'text/xml');
	}
}


/**
 * function to null out ajax request
 */
function doNothing() {}


/**
 * document ready event handling.
 */
jQuery(document).ready(function($){
	load();
    $("#searchLocations").click(searchLocations);
     $("#findCurrentLocation").click(findCurrentLocation);


    initializeGeoLocation();
});

