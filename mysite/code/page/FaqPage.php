<?php
class FaqPage extends Page 
{
    static $db = array
    (
           'Title' => 'Varchar(250)', 
           'ShortTitle' => 'Varchar(250)'
    );
    
    static $has_many = array
    (
        
           'LeftFaqSections' => 'LeftFaqSection',
            'RightFaqSections' => 'RightFaqSection' 
    );
    private static $has_one=array(
        'PlaceHolderImage'=>'PlaceHolderImage'

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
             $fields->addFieldToTab("Root.Main", TextField::create("ShortTitle", "Title to display on parent page",'Content'));
             $fields->addFieldToTab('Root.Main', new UploadField("PlaceHolderImage"));
	         $fields->removeFieldFromTab('Root.Main', 'Content');
             $config = GridFieldConfig_RelationEditor::create();
             $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
                    'Title' => 'Title'));

             //$config->addComponent(new GridFieldSortableRows('Position'));
             $config->addComponent(new GridFieldSortableRows('SortOrder'));

             $config2 = GridFieldConfig_RelationEditor::create();
             $config2->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
                    'Title' => 'Title'));

             //$config->addComponent(new GridFieldSortableRows('Position'));
             $config2->addComponent(new GridFieldSortableRows('SortOrder'));


             $gridField1= new GridField('Add FAQ on the left section', 'FAQs Displayed on the left section FAQ page', $this->LeftFaqSections(), $config);
             $gridField2= new GridField('Add FAQ on the right section', 'FAQs Displayed on the right section FAQ page', $this->RightFaqSections(), $config2);


             $fields->addFieldToTab('Root.LeftFaqSection', $gridField1);

             $fields->addFieldToTab('Root.RightFaqSection', $gridField2);

            return $fields;
    }
     
}
class FaqPage_Controller extends Page_Controller 
{

    
}
     
        