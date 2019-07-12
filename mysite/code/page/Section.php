<?php
class Section extends DataObject 
{
       static $db = array
       (
            'Title' => 'Varchar(250)',
            'Content' => 'HTMLText',
            'SortOrder'=>'Int',
             'ContentPosition' => 'Varchar(20)'

  );
  
  static $has_one = array
  (
      'Page' => 'Page',
      'AboutPage' => 'AboutPage',
      'ContentImage' => 'Image',
      'ContentImageLink' => 'SiteTree'
  );
  

    private static $default_sort = 'SortOrder ASC';
  public function getCMSFields() 
  {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.TileLayout", new TextareaField('ShortDescription'),'Content');



   
        $fields->addFieldToTab('Root.Main', new UploadField($name ='ContentImage',$title = 'About Section Image'),'Content');
      $fields->addFieldToTab('Root.Main', new TreeDropdownField("ContentImageLinkID", "Set Image Link", "SiteTree"),'Content');

    
    
      return $fields;
  }


 
 



}
