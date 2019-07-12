<?php
class AboutPage extends Page 
{
    static $db = array
    (
	       'Title' => 'Varchar(250)', 
           'ShortTitle' => 'Varchar(250)',
           'BlogText' => 'Varchar(250)',
           'BlogLink' => 'Varchar(250)'
	);
	
	private static $has_one=array(

        'AboutBannerPageImage'=>'PageImage',
        'AboutBannerPageImageLink' => 'SiteTree'
	);
	
    static $has_many = array
    (
		
           'AboutSections' => 'Section',
           'AboutVideos' =>'AboutUsVideo'
	);
        
	
	public function getCMSFields() 
    {
             $fields = parent::getCMSFields();
            
             $fields->addFieldToTab('Root.Main', TextField::create("BlogText"), 'Content');
             $fields->addFieldToTab('Root.Main', TextField::create("BlogLink"), 'Content');
             $fields->addFieldToTab('Root.Main', new UploadField("AboutBannerPageImage"), 'Content');
             $fields->addFieldToTab('Root.Main', new TreeDropdownField("AboutBannerPageImageLinkID", "Set About Banner Page Image Link", "SiteTree"));

        //remove content
             $fields->removeFieldFromTab('Root.Main', 'Content');
             
            //Images 
             $config = GridFieldConfig_RelationEditor::create();
             $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
                    'Title' => 'Title'));

             //$config->addComponent(new GridFieldSortableRows('Position'));
             $config->addComponent(new GridFieldSortableRows('SortOrder'));


             $gridField2 = new GridField(
            'About us Sections', // Field name
            'About us Section', // Field title
             $this->AboutSections(), // List of all related sections
             $config
             );  
             $fields->addFieldToTab('Root.Sections', $gridField2);




              $config2 = GridFieldConfig_RelationEditor::create();
             $config2->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
                    'FeaturedVideoTitle' => 'FeaturedVideoTitle'));

             //$config->addComponent(new GridFieldSortableRows('Position'));
             $config2->addComponent(new GridFieldSortableRows('SortOrder'));


             $gridField3 = new GridField(
            'About us Videos', // Field name
            'About us Videos', // Field title
             $this->AboutVideos(), // List of all related sections
             $config2
             );  
             $fields->addFieldToTab('Root.Videos', $gridField3);


            return $fields;
     }
     
}
class AboutPage_Controller extends Page_Controller {

	
}
