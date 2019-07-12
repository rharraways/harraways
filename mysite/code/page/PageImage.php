<?php 
class PageImage extends Image
{
    static $db = array
    (
         
         'ID'=>'int'
    );	
    static $has_one = array
    (
         'Product' => 'Product',
         'ProductCategory' => 'ProductCategory',
         'ContactBannerPageImage'=>'ContactBannerPageImage',
        'ConsumerPanelBannerPageImage'=>'ConsumerPanelBannerPageImage',
         'ProductCategoryBannerImage'=>'ProductCategoryBannerImage',
         'ProductCategoryBannerImage'=>'ProductCategoryBannerImage',
         'RecipeFooterPageImage'=>'RecipeFooterPageImage',
         'RecipeListPageFooterBannerImage'=>'RecipeListPageFooterBannerImage',
         'ProductCategoryFooterBannerImage'=>'ProductCategoryFooterBannerImage',
         'AboutBannerPageImage'=>'AboutBannerPageImage',
        'ProductBannerPageImage'=>'ProductBannerPageImage',
        'FaqBannerPageImage'=>'FaqBannerPageImage',
         'RecipeListPageBannerImage'=>'RecipeListPageBannerImage',
         'RecipePage'=>'RecipePage',
         'HomePageImage'=>'HomePageImage',
         'ListPageWithoutFeatureProduct'=>'ListPageWithoutFeatureProduct',
         'ShopAllImage'=>'ShopAllImage',
         'PlaceHolderProductImage'=>'PlaceHolderProductImage',
         'MainProductImage' =>'MainProductImage',
         'AllRecipePageImage'=>'AllRecipePageImage',
         'RecipeCategoryPage'=>'RecipeCategoryPage',
         'RecipeLogo'=> 'RecipeLogo',
        'ProductThumbnailImage'=>'ProductThumbnailImage'
    );

    public function getCMSFields() 
    {
         $fields = parent::getCMSFields();
  
         return $fields;	
    }
}