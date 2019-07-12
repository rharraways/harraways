<?php
class ProductHomePage extends Page {

	private static $db = array(
		
	);

	private static $has_one=array(
		'ShopAllImage'=>'PageImage',
        'ProductBannerPageImage'=>'PageImage',
        'ProductCategoryBannerImage'=>'PageImage',
        'ProductCategoryFooterBannerImage'=>'PageImage'
	);
	
	public static $many_many = array( 
	   'ProductCategories' => 'ProductCategory'

	);
		
	
	
	public function getCMSFields() 
	{
		$fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', new UploadField("ProductCategoryBannerImage"), 'Content');

        $fields->addFieldToTab('Root.Main', new UploadField("ProductCategoryFooterBannerImage"), 'Content');

        return $fields;
	}
	
	
	

}
class ProductHomePage_Controller extends Page_Controller {

	
}
