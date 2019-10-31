<?php
class Page extends SiteTree
{
    private static $db = array
     (
            


	);
     

    private static $has_one = [];

    function ListPageByType($class)
	{
		$pages= $class::get();
		return $pages->count()? $pages:false;
	}

     function ListPageByTypeUniqueColumn($class, $ID, $column)
    {
        $pages = $class::get()->map($ID, $column);
       $uniquePages = array_unique($pages->toArray());
        return $pages->count()? $pages:false;
    }

    function ListPageByTypeUsingID($class,$ID)
    {
        $pages= $class::get()->byID($ID);

        return $pages;
    }

    //check if any receipe page is enabled as feature reciepe
  

	 public function getCMSFields() 
  {
        $fields = parent::getCMSFields();

	    return $fields;
	}

}
