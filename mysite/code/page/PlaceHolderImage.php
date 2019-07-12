<?php 
class PlaceHolderImage extends Image 
{
    static $db = array
    (
         
         'ID'=>'int'
    );	
    static $has_one = array
    (


       'RecipeListPage'=>'RecipeListPage',
       'RecipePage'=>'RecipePage',
       'ShopAllImage'=>'ShopAllImage',
       'RecipeCategoryPage'=>'RecipeCategoryPage',
       'AllRecipePage'=>'AllRecipePage',

    );

    public function getCMSFields() 
    {
         $fields = parent::getCMSFields();
  
         return $fields;	
    }
}