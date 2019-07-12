<?php
class RecipeListPage extends Page {

    private static $db = array(
        'Header1' => 'Varchar(250)',
        'Header2' => 'Varchar(250)',
        'Header3' => 'Varchar(250)',
        'BannerHeader1' => 'Varchar(250)',
        'BannerHeader2' => 'Varchar(250)',
    );

    private static $has_one=array(
        'SeeAllPlaceHolderImage'=>'PlaceHolderImage',
        'RecipeListPageBannerImage'=>'PageImage',
        'RecipeListPageBannerImageLink' => 'SiteTree',
        'RecipeListPageFooterBannerImage'=>'PageImage',
        'RecipeListPageFooterBannerImageLink' => 'SiteTree',
        'RecipeLogo'=>'PageImage',

    );

    public static $has_many = array(

    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();


        $fields->addFieldToTab("Root.Main", TextField::create("BannerHeader1", "First Text to display on banner"),'Content');
        $fields->addFieldToTab("Root.Main", TextField::create("BannerHeader2", " Second Text to display on banner"),'Content');
        $fields->addFieldToTab('Root.Main', new UploadField("RecipeListPageBannerImage"), 'Content');
        $fields->addFieldToTab('Root.Main', new TreeDropdownField("RecipeListPageBannerImageLinkID", "Set Recipe ListPage Banner Image Link", "SiteTree"),'Content');

        $fields->addFieldToTab("Root.Main", TextField::create("Header1", "First Text to display on special recipe banner"),'Content');
        $fields->addFieldToTab("Root.Main", TextField::create("Header2", " Second Text to display on special recipe banner"),'Content');
        $fields->addFieldToTab("Root.Main", TextField::create("Header3", " Third Text to display on special recipe banner"),'Content');

        $fields->addFieldToTab('Root.Main', new UploadField("RecipeListPageFooterBannerImage"), 'Content');
        $fields->addFieldToTab('Root.Main', new TreeDropdownField("RecipeListPageFooterBannerImageLinkID", "Set Recipe ListPage Footer Banner Image Link", "SiteTree"),'Content');

        $fields->addFieldToTab('Root.Main', new UploadField("RecipeLogo"), 'Content');
        $fields->removeFieldFromTab('Root.Main', 'Content');
        return $fields;
    }




}
class RecipeListPage_Controller extends Page_Controller {

}
