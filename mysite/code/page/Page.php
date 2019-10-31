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

     function ListPageByTypeUniqueColumn($class, $column)
    {
        $pages = $class::get();
        $uniquePages = new ArrayList();
        foreach($pages as $page) {
            $uniquePages->push(new ArrayData(array($column => $page->$column)));
        }
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
