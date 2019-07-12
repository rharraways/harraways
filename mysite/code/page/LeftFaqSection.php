<?php
class LeftFaqSection extends DataObject 
{
       static $db = array
       (
            'Title' => 'Varchar(250)',
            'FirstContent' => 'HTMLText',
            'SecondContent' => 'HTMLText',
            'SortOrder'=>'Int',             
             "FeaturedVideo" => "Text",

  );
  
  static $has_one = array
  (
      
      'FaqPage' => 'FaqPage',
      'ContentImage' => 'Image',
      'ContentImageLink' => 'SiteTree'
  );
  

  static $default_sort='SortOrder';
  public function getCMSFields() 
  {
         $fields = parent::getCMSFields();
  
         $fields->addFieldToTab("Root.Main", TextField::create("Title", "Faq Title"),'SortOrder');
     
         $fields->addFieldToTab("Root.Main", HtmlEditorField::create("FirstContent", "First Content"),'SortOrder');
          

         $fields->addFieldToTab("Root.Main", TextareaField::create("FeaturedVideo", "Faq Video Code")->setRows(2),'SortOrder');
              
         $fields->addFieldToTab('Root.Main', new UploadField($name ='ContentImage',$title = 'Faq Section Image'),'SortOrder');
      $fields->addFieldToTab('Root.Main', new TreeDropdownField("ContentImageLinkID", "Set Faq Image Link", "SiteTree"),'SortOrder');

      $fields->addFieldToTab("Root.Main", HtmlEditorField::create("SecondContent", "Second Content"),'SortOrder');

    
    
        return $fields;
  }


 
 



}

      
       
       
 
 



