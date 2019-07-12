<?php
class FaqMainPage extends Page
{
    static $db = array
    (
           'Title' => 'Varchar(250)', 
           'ShortTitle' => 'Varchar(250)'
    );
    

    private static $has_one=array(

        'FaqBannerPageImage'=>'PageImage',
        'FaqBannerPageImageLink' => 'SiteTree'
    );

    static $searchable_fields = array(
        
            'Title' => "PartialMatchFilter",
            'Content' => "PartialMatchFilter",

        
    );
    //Show in search results
    static $summary_fields = array(
        'Title',
        'Content'
    );
    public function getCMSFields() 
    {
            
             $fields = parent::getCMSFields();

              $config = GridFieldConfig_RelationEditor::create();
             $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
                    'Title' => 'Title'));
             $fields->addFieldToTab('Root.Main', new UploadField("FaqBannerPageImage"), 'Content');

        $fields->addFieldToTab('Root.Main', new TreeDropdownField("FaqBannerPageImageLinkID", "Set Faq Banner Page Image Link", "SiteTree"));


            return $fields;
    }
     
}
class FaqMainPage_Controller extends Page_Controller
{

    
}
     
        