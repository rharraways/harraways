<?php
class ListPageWithoutFeatureProduct extends Page {

	private static $db = array(
		'ShortTitle' => 'Varchar(250)'
		
	);

	private static $has_one=array(
		'PlaceHolderImage'=>'PlaceHolderImage',
		'ListPageImage'=>'PageImage',
		
	);
	
	public static $has_many = array( 
	   
	);
		
	
	
	public function getCMSFields() 
	{
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', new UploadField("PlaceHolderImage"), 'Content');
		$fields->addFieldToTab("Root.Main", TextField::create("ShortTitle", "Title to display on parent page"),'Content');

		$fields->addFieldToTab('Root.ListPageImage', new UploadField('ListPageImage'));
  
         return $fields;
	}
	
	
	

}
class ListPageWithoutFeatureProductPage_Controller extends Page_Controller {

	
}
