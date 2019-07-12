<?php
class AllRecipePage extends Page 
{
       static $db = array
       (
	       'Title' => 'Varchar(250)', 
         'Header1' => 'Varchar(250)',
           'Header2' => 'Varchar(250)'
      
         
	);
	
	
	
       static $has_one = array
       (
		
           'AllRecipePageImage'=>'PageImage',
           'AllRecipePageImageLink' => 'SiteTree',
           'LatestRecipeBannerImage' => 'PlaceHolderImage',
           'LatestRecipeBannerImageLink' => 'SiteTree',
           
           
	);
        
	
	public function getCMSFields() 
  {
            $fields = parent::getCMSFields();
            

            $fields->addFieldToTab('Root.Main', new UploadField('AllRecipePageImage'));
            $fields->addFieldToTab("Root.Main", new TreeDropdownField("AllRecipePageImageLinkID", "<strong> Banner Image </strong><br />Select the page to link to the banner image and when clicked will be displayed", "SiteTree"));

            $fields->addFieldToTab('Root.Main', new UploadField('LatestRecipeBannerImage'));

            $fields->addFieldToTab("Root.Main", new TreeDropdownField("LatestRecipeBannerImageLinkID", "<strong>Latest Banner Image </strong><br />Select the page to link to the banner image and when clicked will be displayed", "SiteTree"));
            $fields->addFieldToTab("Root.Main", TextField::create("Header1", "First Header to display on Latest Recipe Image"));
            $fields->addFieldToTab("Root.Main", TextField::create("Header2", "Second Header to display on Latest Recipe Image"));

            $fields->removeFieldFromTab('Root.Main', 'Content');

            return $fields;
    }
     
}
class AllRecipe_Controller extends Page_Controller {

  function LinkFromID(){
      $thisPage = DataObject::get_by_id("Page", (int)$this->NewLink);
      return $thisPage;
   } 
  
   
    public static $allowed_actions = array (
          );

  


    public function init() {
        parent::init();

       
       
    }
     
   

}

