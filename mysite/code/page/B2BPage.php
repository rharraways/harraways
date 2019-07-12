<?php
class B2BPage extends Page {

	private static $db = array(
		
	);

	private static $has_one=array(
		
		
	);
	
	public static $has_many = array( 
	   
	);
		
	
	
	public function getCMSFields() 
	{
		$fields = parent::getCMSFields();
  
         return $fields;
	}
	
	
	

}
class B2BPage_Controller extends Page_Controller {

	
}
