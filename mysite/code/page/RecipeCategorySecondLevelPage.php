<?php
class RecipeCategorySecondLevelPage extends Page
{

	private static $db = array(
		'ShortTitle' => 'Varchar(250)',

		
	);
	public static $has_many = array( 
	   
	);
		
	private static $has_one=array(
		'PlaceHolderImage'=>'PlaceHolderImage',

		'RecipeCategoryPageImage'=>'PageImage',
        'RecipeCategoryPageImageLink' => 'SiteTree',
        'RecipeFooterPageImage'=>'PageImage'
	);
	
	public function getCMSFields() 
	{
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Main", TextField::create("ShortTitle", "Title to display on parent page"),'Content');

		$fields->addFieldToTab('Root.Main', new UploadField("PlaceHolderImage"), 'Content');

        $fields->addFieldToTab('Root.Main', new UploadField("RecipeCategoryPageImage", $title = 'Banner image'),'Content');
        $fields->addFieldToTab('Root.Main', new TreeDropdownField("RecipeCategoryPageImageLinkID", "Set Recipe Category Page Image Link", "SiteTree"),'Content');

        // $fields->addFieldToTab('Root.Main', new UploadField("RecipeFooterPageImage", $title = 'Footer Banner image'),'Content');

        //$fields->addFieldToTab('Root.Main', new UploadField('RecipeCategoryPageImage'),'Content');
       $fields->removeFieldFromTab('Root.Main', 'Content');
        return $fields;
	}
}
class RecipeCategorySecondLevelPage_Controller extends Page_Controller {


}
