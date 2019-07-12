<?php
class HomePage extends Page 
{
       static $db = array
       (
	       'Title' => 'Varchar(250)',
           "FeaturedVideoTitle" => 'Varchar(250)',
           "FeaturedVideo" => "Text",
           'Header1' => 'Varchar(250)',
           'Header2' => 'Varchar(250)',
           'Header3' => 'Varchar(250)',
            'HeaderDescription' => 'Varchar(250)',
          'Description' => 'HTMLText',
	);
	
	
	
       static $has_one = array
       (
		
           'HomePageImage'=>'PageImage',
           'HomePageImageLink' => 'SiteTree'
	);
        
	
	public function getCMSFields() 
  {
            $fields = parent::getCMSFields();
            
            $fields->addFieldToTab('Root.HomePageImage', new UploadField('HomePageImage'));
      $fields->addFieldToTab('Root.HomePageImage', new TreeDropdownField("HomePageImageLinkID", "Set Home Page Image Link", "SiteTree"));

      $fields->addFieldToTab("Root.Main", TextField::create("Header1", "First Text to display on banner"));
            $fields->addFieldToTab("Root.Main", TextField::create("Header2", " Second Text to display on banner"));
      $fields->addFieldToTab("Root.Main", TextField::create("Header3", " Third Text to display on banner"));

      $fields->addFieldToTab("Root.Description", TextField::create("HeaderDescription", "Header"));
      $fields->addFieldToTab("Root.Description", HTMLEditorField::create("Description", " Description Text"));




            return $fields;
    }
     
}
class HomePage_Controller extends Page_Controller {

  
public function RecipeSearchForm() {
        $searchText =  _t('SearchForm.SEARCH', 'Search');

        if($this->owner->request && $this->owner->request->getVar('Search')) {
            $searchText = $this->owner->request->getVar('Search');
        }

        $fields = new FieldList(
            new TextField('Search', false, $searchText)
        );
        $actions = new FieldList(
            new FormAction('results', _t('SearchForm.GO', 'Search'))
        );

        $form = new SearchForm($this->owner, 'SearchForm', $fields, $actions);        
        $form->classesToSearch(FulltextSearchable::get_searchable_classes());
        $form->setPageLength(1000);

        return $form;
}
	
}