<?php

class Page_Controller extends ContentController
{


    /**
     * An array of actions that can be accessed via a request. Each array element should be an action name, and the
     * permissions or conditions required to allow the user to access it.
     *
     * <code>
     * array (
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
     * );
     * </code>
     *
     * @var array
     */
    private static $allowed_actions = array(
        "LoginForms",
        "login",
        'recipeSearch',
        'index',
        'getResults'

    );


    public function GetChildren($limit = 5,$ID){

        $where = "ParentID = $ID";
      
        $pages = DataObject::get("SiteTree", $where, "Sort DESC", "", $limit);
        return $pages;

    }
    /* get product  based on id */
    public function RecipeIsLinked($ID,$ProductID){

       if($ID == $ProductID)
           return true;
       else
          return false;

    }

    ///
    /// display 5 feature product
    ///
    public function GetFeatureProduct($limit = 5){

        $where = "DisplayAsFeatureProduct = 1";
        $pages = DataObject::get("Product", $where, "Sort DESC", "", $limit);
        return $pages;

    }
    function SubscribeForm()
    {
        $record = DataObject::get_one("SubscriptionPage", "URLSegment = 'newsletter-subscription'");
        $results = new SubscriptionPage_Controller($record);
        return $results;
    }
    public function init()
    {
        parent::init();

        // You can include any CSS or JS required by your project here.
        // See: http://doc.silverstripe.org/framework/en/reference/requirements


        Requirements::javascript("themes/custom/javascript/jquery.min.js");
        Requirements::javascript("themes/custom/javascript/jquery-3.3.1.min.js");
        Requirements::javascript("themes/custom/javascript/lightslider.js");
    }

    /* recipe search */
    public function recipeSearch(SS_HTTPRequest $request)
    {

        $partialname = isset($_GET["partialname"]) ? $_GET["partialname"] : "";


        $result = $this->getReceipeSQLResults($partialname);

        $recipes = $this->getResults($result);

        return $this->customise(array("recipes" => $recipes))->renderWith("AllRecipe");
    }


    /* Get recipe search result
     */
    public function getResults($result){

        $arr = array();
        $markerClass = 'RecipePage';

        // Iterate over results
        foreach($result as $row) {

            $do = Injector::inst()->create( $markerClass, $row, false,  $markerClass);

            array_push($arr, $do);
        }

        $arrData = new ArrayList($arr);
        return $arrData;
    }


    public function getReceipeSQLResults($partialName){
        //query dataabse to find a match
        $markerClass = 'RecipePage';
        $sqlQuery = new SQLQuery();
        $sqlQuery->setFrom($markerClass);
        $sqlQuery->selectField('*');
        $sqlQuery->setWhere("Description1 || Description2 || ShortTitle LIKE '%".$partialName."%'");

        $sqlQuery->setOrderBy('ShortTitle');

        $this->extraSQL($sqlQuery);
        // Execute and return a Query object
        $result = $sqlQuery->execute();


        return $result;
    }

    /**
     * hook for sub classes.
     */
    protected function extraSQL($sqlQuery){

    }

    /**
     * Use this function to direct a user where you want them to go after login
     * (currently the root of the site)
     */
    public function login()
    {
        return $this->redirect(Director::absoluteBaseURL());
    }

    /**
     * Get the login form to process according to the submitted data
     *
     * @return Form
     */
    public function DomesticLoginForm()
    {
        $authenticator = Authenticator::get_default_authenticator();
        if($authenticator) {
            $form = $authenticator::get_login_form($this);
            // Use this if you want to use a custom form template
            $form->setTemplate('DomesticLoginForm');
            return $form;
        }
        throw new Exception('Passed invalid authentication method');
    }

    public function InternationalLoginForm()
    {
        $authenticator = Authenticator::get_default_authenticator();
        if($authenticator) {
            $form = $authenticator::get_login_form($this);
            // Use this if you want to use a custom form template
            $form->setTemplate('InternationalLoginForm');
            return $form;
        }
        throw new Exception('Passed invalid authentication method');
    }


}



