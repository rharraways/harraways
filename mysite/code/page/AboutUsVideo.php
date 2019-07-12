<?php
class AboutUsVideo extends DataObject 
{
       static $db = array
       (
           "FeaturedVideoTitle" => 'Varchar(250)',
           'SortOrder'=>'Int',        
           "FeaturedVideo" => "Text",

  );
  
  static $has_one = array
  (
     
      'AboutPage' => 'AboutPage',
     
  );
  
  private static $default_sort = 'SortOrder ASC';
 
  public function getCMSFields() 
  {
       
       
       

         $fields = parent::getCMSFields();
         $fields->removeFieldFromTab('Root.Main', 'Content');
         $fields->removeFieldFromTab('Root.Main', 'Page');
         $fields->removeFieldFromTab('Root.Main', 'SortOrder');
         $fields->addFieldToTab("Root.Main", TextareaField::create("FeaturedVideoTitle", "Video title")->setRows(2));
         $fields->addFieldToTab("Root.Main", TextareaField::create("FeaturedVideo", "Featured Video Code")->setRows(2));
            
    
    
      return $fields;
  }


 
 



}
