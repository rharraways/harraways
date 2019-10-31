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
        $arrayContains = array();
        foreach($pages as $page) {
            if (($key = array_search($page->$column, $arrayContains)) === NULL) {
                $uniquePages->push(new ArrayData(array($column => $page->$column)));
                $arrayContains->push($page->$column);
            }
        }
        return $uniquePages->count()? $uniquePages:false;
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
