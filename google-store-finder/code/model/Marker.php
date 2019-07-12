<?php

class Marker extends DataObject{

    public static $singular_name = "Marker";

	public $Distance = null;
	
	static $db = array(
        'StoreName' => 'Text',
        'Address' => 'Text',
        'ProductName' => 'Text',
        'Latitude' => 'Decimal(10,6)',
        'Longitude' => 'Decimal(10,6)'
    );
	
	
	public function getCMSFields() {
    	return new FieldList(
        	new TextField('StoreName'),
        	new TextField('Address'),
        	new TextField('ProductName'),
        	new NumericField('Latitude'),
			new NumericField('Longitude')
		);
	}
	
	public function setDistance($distance){
		$this->Distance = $distance;
	}
	
	public function customDistance(){
		return number_format($this->Distance, 1);
	}
	
}