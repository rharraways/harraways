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
        $uniquePages = array();
        foreach($pages as $page) {
            if (!in_array($page->$column, $uniquePages) && $page->$column != "") {
                array_push($uniquePages, $page->$column);
            }
        }
        sort($uniquePages);

        $pagesArrayList = new ArrayList();
        foreach($uniquePages as $page) {
            $pagesArrayList->push(new ArrayData(array($column => $page)));
        }
        return $pagesArrayList->count()? $pagesArrayList:false;
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
