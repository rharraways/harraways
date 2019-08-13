<?php
class StoreFinder extends Page {

    public static $MarkerClass = 'StoreLocation';

  

    public static $has_one = array(
    );

  

    public function getCMSFields() {

       
       

        $fields = parent::getCMSFields();

        

        $markerClassObject = Injector::inst()->create(self::$MarkerClass);

        
        $config = GridFieldConfig_RelationEditor::create();
        // Set the names and data for our gridfield columns
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'ProductName' => 'ProductName',
             'StoreName' => 'StoreName',
         
        ));
       
        $locationField = new GridField(
            self::$MarkerClass, // Field name
            DataObject::get_static(self::$MarkerClass, "singular_name"), // Field title
            DataObject::get(self::$MarkerClass), // List of all related students
            $config
        );
        // Create a tab named "Students" and add our field to it
        $fields->addFieldToTab('Root.Locations', $locationField);

        return $fields;
    }



}

class StoreFinder_Controller extends Page_Controller {

    public static $allowed_actions = array (
        'locationSearch',
        'productLocationSearch',
        'productSearch',
        'findLatLongForAddress',
        'index',
        'getLocationsResults'
    );

  


    public function init() {
        parent::init();

        $script = "var startLat = ".$this->dataRecord->StartLat.";\n";
        $script .= "var startLong = ".$this->dataRecord->StartLong.";\n";
        $script .= "var startZoom = ".$this->dataRecord->StartZoom.";\n";
        $script .= "var geoLocatedZoom = ".strtoupper($this->dataRecord->GeolocatedZoom).";\n";
        $script .= "var mapType = '".strtoupper($this->dataRecord->MapType)."';";


        Requirements::customScript($script);
        Requirements::javascript('https://maps.googleapis.com/maps/api/js?key=AIzaSyBTTj-PlWzuNUIU3vHBTiTdS1TwvMxyyDM');
        Requirements::javascript('framework/thirdparty/jquery/jquery.js');
        Requirements::javascript('google-store-finder/javascript/store-finder.js');



        Requirements::css('google-store-finder/css/store-finder.css');
       
    }
     public function locationSearch(SS_HTTPRequest $request){
        

             $center_lat = isset($_GET["lat"]) ? $_GET["lat"] : 40;
             $center_lng = isset($_GET["lng"]) ? $_GET["lng"] : -100;
             $radius = isset($_GET["radius"]) ? $_GET["radius"] : 500;

              $result = $this->getLocationSQLResultsByLatLong($center_lat, $center_lng, $radius, null);

              $locations = $this->getLocationsResults($result);
      
        return $this->customise(array("locations" => $locations))->renderWith("Marker_XML");

     }
     public function productLocationSearch(SS_HTTPRequest $request){

            $center_lat = isset($_GET["lat"]) ? $_GET["lat"] : 40;
             $center_lng = isset($_GET["lng"]) ? $_GET["lng"] : -100;
             $radius = isset($_GET["radius"]) ? $_GET["radius"] : 500;
             $productName = isset($_GET["productName"]) ? $_GET["productName"] : "";
              $result = $this->getLocationSQLResultsByLatLong($center_lat, $center_lng, $radius, $productName);

           $locations = $this->getLocationsResults($result);
      
        return $this->customise(array("locations" => $locations))->renderWith("Marker_XML");
     }
      public function productSearch(SS_HTTPRequest $request){
              $productName = isset($_GET["productName"]) ? $_GET["productName"] : "";
            
              $result = $this->getLocationSQLResultsByLatLong(0, 0,0,$productName);
            
            $locations = $this->getLocationsResults($result);
      
        return $this->customise(array("locations" => $locations))->renderWith("Marker_XML");
     }
    

    /**
     *  used by template to display results of marker search
     */
    public function getLocationsResults($result){
       
        $arr = array();
        $markerClass = StoreFinder::$MarkerClass;
        // Iterate over results
        foreach($result as $row) {

            $do = Injector::inst()->create($markerClass, $row, false, $markerClass);
            $do->setDistance($row['Distance']);
           // echo $row['ID']." ".$row['Distance']."<br/>";
          array_push($arr, $do);
        }
       
        $arrData = new ArrayList($arr);
        return $arrData;
    }


    
    
    /**
     * Retrieves Locations by lat, long, distance, and optionally a limit.
     */
    public function getLocationSQLResultsByLatLong($lat=0, $long=0, $distance=0,$productName=null){
        //$data = DB::query('SELECT "ID" FROM "Marker" LIMIT 0 , '.$limit.';')->value();
       // $query = 'SELECT "ID", ( 3959 * acos( cos( radians('.$lat.') ) * cos( radians( Latitude ) ) * cos( radians( Longitude ) - radians('.$long.') ) + sin( radians('.$lat.') ) * sin( radians( Latitude ) ) ) ) AS "Distance" FROM "Marker" HAVING "Distance" < '.$distance.' ORDER BY "Distance" LIMIT 0 , '.$limit.';';
       
        $markerClass = StoreFinder::$MarkerClass;
        $sqlQuery = new SQLQuery();
        $sqlQuery->setFrom($markerClass);
        $sqlQuery->selectField('*');
       if($productName == null && $lat !=0 && $long !=0){
            $sqlQuery->selectField('( 3959 * acos( cos( radians('.$lat.') ) * cos( radians( Latitude ) ) * cos( radians( Longitude ) - radians('.$long.') ) + sin( radians('.$lat.') ) * sin( radians( Latitude ) ) ) )', 'Distance');
            $sqlQuery->setHaving("Distance <= ".$distance);
             $sqlQuery->setOrderBy('Distance');

       }
       else if($productName != null && $lat !=0 && $long !=0)
       {
            $sqlQuery->selectField('( 3959 * acos( cos( radians('.$lat.') ) * cos( radians( Latitude ) ) * cos( radians( Longitude ) - radians('.$long.') ) + sin( radians('.$lat.') ) * sin( radians( Latitude ) ) ) )', 'Distance');        
            $sqlQuery->setWhere("Marker.ProductName = '".$productName."'");
            $sqlQuery->setHaving("Distance <= ".$distance);
            $sqlQuery->setOrderBy('Distance');

           
       }
        else if($productName != null && $lat ==0 && $long ==0)
       {
         $sqlQuery->selectField('0', 'Distance');
           
             $sqlQuery->setWhere("Marker.ProductName LIKE '%".$productName."%'");
            $sqlQuery->setOrderBy('ProductName');
       }
       
       if($markerClass != 'Marker'){
            $sqlQuery->addLeftJoin("Marker", 'Marker.ID = '.$markerClass.'.ID');
        }
        $this->extraSQL($sqlQuery);
        // Execute and return a Query object
        $result = $sqlQuery->execute();
       
        
        return $result;
    }
    
    /**
     * hook for sub classes.
     */
    protected function extraSQL($sqlQuery){
        
    }

}
