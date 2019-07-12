<?php
class RecipePage extends Page
{

    private static $db = array(
        'ShortTitle' => 'Varchar(250)',
        'ShortTitle2' => 'Varchar(250)',
        'IngredientsText' => 'Text',
        'IngredientsTitle' => 'Varchar(250)',
        'MethodText' => 'Text',
        'MethodTitle' => 'Varchar(250)',
        'Description1' => 'Varchar(250)',
        'SmallShortTitle' => 'Varchar(250)',
        'Description2' => 'Varchar(250)',
        'DisplayRecipeAsFeatureRecipes' =>'Boolean',
        'Box1' => 'Varchar(250)',
        'Box2' => 'Varchar(250)',
        'Box3' => 'Varchar(250)',
        'ProductID' => 'Int'





    );


    private static $searchable_fields = array(
        'ShortTitle',
        'IngredientsText',
        'MethodTitle',
        'MethodText'

    );

    public static $has_many = array(
        'RecipeVideos' =>'RecipeVideo',
    );

    private static $has_one=array(
        'PlaceHolderImage'=>'PlaceHolderImage',
        'ReceipePageImage'=>'PageImage',
        'Product'=>'Product',


    );



    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $config = GridFieldConfig_RelationEditor::create();
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'ShortTitle' => 'ShortTitle'));





        $fields->addFieldToTab("Root.RecipeItem", TextField::create("ShortTitle", "Title to display on parent page"));
        $fields->addFieldToTab("Root.RecipeItem", TextField::create("ShortTitle2", "Small Title to display underneath the main title"));
        $fields->addFieldToTab("Root.RecipeItem", TextField::create("SmallShortTitle", "Description Field Placed underneath main description (e.g with )"));


        $fields->addFieldToTab("Root.RecipeItem", TextField::create("MethodTitle", "Method Heading"));



        $fields->addFieldToTab("Root.RecipeItem", TextAreaField::create("MethodText", "Receipes Method"));
        $fields->addFieldToTab("Root.RecipeItem", TextField::create("IngredientsTitle", "Ingredients Heading"));

        $fields->addFieldToTab("Root.RecipeItem", TextAreaField::create("IngredientsText", "Ingredients Method content"));
        $fields->addFieldToTab("Root.RecipeItem", TextAreaField::create("Description1", "Description1 Field Placed inside the recipe main image")->setRows(2));

        $fields->addFieldToTab("Root.RecipeItem", TextareaField::create("Description2", "Description2 Field Placed inside the recipe main image")->setRows(2));


        $fields->addFieldToTab("Root.RecipeItem", TextareaField::create("Box1", "Prep Time")->setRows(2));
        $fields->addFieldToTab("Root.RecipeItem", TextareaField::create("Box2", "Cook Time")->setRows(2));
        $fields->addFieldToTab("Root.RecipeItem", TextareaField::create("Box3", "Serve")->setRows(2));




        $fields->removeFieldFromTab('Root.RecipeItem', 'SortOrder');

        $config2 = GridFieldConfig_RelationEditor::create();
        $config2->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'FeaturedVideoTitle' => 'FeaturedVideoTitle'));


        $config2->addComponent(new GridFieldSortableRows('SortOrder'));


        $gridField3 = new GridField(
            'Receipe Videos', // Field name
            'Receipe Videos', // Field title
            $this->RecipeVideos(), // List of all related recipevideos
            $config2
        );
        $fields->addFieldToTab('Root.RecipeVideos', $gridField3);

        $fields->addFieldToTab('Root.Main', new UploadField("PlaceHolderImage"), 'Content');
        $fields->addFieldToTab('Root.Main', new UploadField('ReceipePageImage'),'Content');
        $id= $this->ProductID;
        $query = new SQLQuery();
        $selectProduct = $query->setFrom('Product')->setSelect('ShortTitle')->addWhere("ID =".$id)->execute()->value();
        $filter= "NOT EXISTS(select ProductID from RecipePage where ProductID = ID AND Product.ID != ".$id.")";
        $displayText="";
        if($selectProduct != null){
            $displayText=" <h5>This recipe is currently linked to </h5><h5 style='color: red;'>".$selectProduct.' </h5>';
        }else{
            $displayText="<h5 style='color:red;'>This recipe is not currently linked to any product </h5>";
        }
        $fields->addFieldToTab('Root.Main',
            DropdownField::create(
                'ProductID',
                "<h1 style='font-weight: bold;'>LINK RECIPE TO PRODUCT </h1>".$displayText,
                Product::get("Product",$filter)
                    ->map('ID', 'ShortTitle')),
            'Content');
        return $fields;
    }



}
class RecipePage_Controller extends Page_Controller
{



}
