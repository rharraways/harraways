<?php
/**
 * Represents a Product category, Products can be added to many categories and they 
 * can have a ProductCategory as a parent in the site tree. 
 */
class ProductCategory extends Page {

	private static $singular_name = 'Product Category';
	private static $plural_name = 'Product Categories';
    private static $db = array(
		'ShortTitle' => 'Varchar(250)'
	);



	/**
	 * Many many relations for a ProductCategory
	 * 
	 * @var Array
	 */
	private static $many_many = array(
		'Products' => 'Product',

	);

	private static $many_many_extraFields = array(
		'Products' => array(
			'ProductOrder' => 'Int'
		)
	);
	private static $has_one=array(
		'ProductCategoryPlaceHolderImage'=>'PageImage',
        'ProductCategoryBannerImage'=>'PageImage',
        'ProductCategoryBannerImageLink' => 'SiteTree'

		
	);
	
	/**
	 * Summary fields for viewing categories in the CMS
	 * 
	 * @var Array
	 */
	private static $summary_fields = array(
		'Title' => 'Name',
		'MenuTitle' => 'Menu Title'
	);

	public function isSection() {

		$current = Controller::curr();
		$request = $current->getRequest();

		$url = $request->getURL();

		if (stristr($url, 'product/')) {

			$params = $request->allParams();
			$productID = $params['ID'];

			$product = Product::get()
				->where("\"URLSegment\" = '{$productID}'")
				->first();

			if ($product && $product->exists()) {
				return $this->isCurrent() || in_array($product->ID, $this->Products()->column('ID'));
			}
		}
		return parent::isSection();
	}
	public function getCMSFields() {
		
		
		$fields = parent::getCMSFields();

		//Product fields
		$fields->addFieldToTab('Root.Main', new UploadField('ProductCategoryBannerImage'));
        $fields->addFieldToTab('Root.Main', new TreeDropdownField("ProductCategoryBannerImageLinkID", "Set Product Category Banner Image Link", "SiteTree"));

        $fields->addFieldToTab('Root.Main', new UploadField('ProductCategoryPlaceHolderImage'));
		$fields->addFieldToTab("Root.Main", TextField::create("ShortTitle", "Title to display on parent page"));
      	return $fields;
	}
	public function ListboxCrumb($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = false) {
		$page = $this;
		$pages = array();
		$crumb = '';
		
		while(
			$page  
			&& (!$maxDepth || count($pages) < $maxDepth) 
			&& (!$stopAtPageType || $page->ClassName != $stopAtPageType)
		) {
			if($showHidden || $page->ShowInMenus || ($page->ID == $this->ID)) { 
				$pages[] = $page;
			}
			
			$page = $page->Parent;
		}
		
		$i = 1;
		foreach ($pages as $page) {
			
			$crumb .= $page->getMenuTitle();
			if ($i++ < count($pages)) {
				$crumb .= ' > ';
			}
		}
		return $crumb;
	}
}

/**
 * Controller to display a ProductCategory and retrieve its Products. 
 */
class ProductCategory_Controller extends Page_Controller {


	/**
	 * Set how the products are ordered on ProductCategory pages
	 * 
	 * @see ProductCategory_Controller::Products()
	 * @var String Suitable for inserting in ORDER BY clause
	 */
	// public static $products_ordered_by = "\"ProductCategory_Products\".\"ProductOrder\" DESC";
	public static $products_ordered_by = "\"SiteTree\".\"ParentID\" ASC, \"SiteTree\".\"Sort\" ASC";
	
	/**
	 * Include some CSS.
	 * 
	 * @see Page_Controller::init()
	 */
	function init() {
		parent::init();
		Requirements::css('swipestripe/css/Shop.css');
	}

	/**
	 * Get Products that have this ProductCategory set or have this ProductCategory as a parent in site tree.
	 * Supports pagination.
	 * 
	 * @see Page_Controller::Products()
	 * @return FieldList
	 */  
	public function Products() {


		$orderBy = self::$products_ordered_by;

		$cats = array($this->ID);
		foreach ($this->Children() as $child) {
			if ($child instanceof ProductCategory) {
				$cats[] = $child->ID;
			}
		}
		$in = "('" . implode("','", $cats) . "')";

		$products = Product::get()
			->where("\"ProductCategory_Products\".\"ProductCategoryID\" IN $in OR \"ParentID\" IN $in")
			->sort($orderBy)
			->leftJoin('ProductCategory_Products', "\"ProductCategory_Products\".\"ProductID\" = \"SiteTree\".\"ID\"");

		$this->extend('updateCategoryProducts', $products);

		$totalItem = PaginatedList::create($products, $this->request)->getTotalItems();
		$list = PaginatedList::create($products, $this->request)->setPageLength($totalItem);

		return $list;
	}
}

class ProductCategory_Products extends DataObject {

	private static $db = array(
		'ProductOrder' => 'Int'
	);

	private static $has_one = array(
		'ProductCategory' => 'ProductCategory',
		'Product' => 'Product'
	);
}

class ProductCategory_Extension extends DataExtension 
{

	/**
	 * Belongs many many relations for Product
	 * 
	 * @var Array
	 */
	private static $belongs_many_many = array(
		'ProductCategories' => 'ProductCategory'
	);

	private static $searchable_fields = array(
		'Category' => array(
			'field' => 'TextField',
			'filter' => 'ProductCategory_SearchFilter',
			'title' => 'Category'
		)
	);

	private static $casting = array(
		'Category' => 'Varchar',
	);

	public function onBeforeWrite() 
	{

		//If the ParentID is set to a ProductCategory, select that category for this Product
		$parent = $this->owner->getParent();
		if ($parent && $parent instanceof ProductCategory) 
		{

			$productCategories = $this->owner->ProductCategories();
			if ($this->owner->isInDB() && !in_array($parent->ID, array_keys($productCategories->map()->toArray()))) {
				$productCategories->add($parent);
			}
		}
	}

	public function updateCMSFields(FieldList $fields) {

		$categories = ProductCategory::get()->map('ID', 'ListboxCrumb')->toArray();
		arsort($categories);

		$fields->addFieldToTab(
			'Root.Main', 
			ListboxField::create('ProductCategories', 'Categories')
				->setMultiple(true)
				->setSource($categories)
				->setAttribute('data-placeholder', 'Add categories'), 
			'Content'
		);
		return $fields;
	}
}

class ProductCategory_CMSExtension extends Extension {

	function updateSearchForm($form) {

		$fields = $form->Fields();

		$cats = ProductCategory::get()->map()->toArray();
		$fields->push(DropdownField::create('q[Category]', 'Category', $cats)
			->setHasEmptyDefault(true)
		);
		$form->loadDataFrom($this->owner->request->getVars());

		$form->setFields($fields);
	}
}

/**
 * Search filter for {@link Product} categories, filtering search results for 
 * certain {@link ProductCategory}s in the CMS.
 */
class ProductCategory_SearchFilter extends SearchFilter {

	/**
	 * Apply filter query SQL to a search query
	 * 
	 * @see SearchFilter::apply()
	 * @return SQLQuery
	 */
	public function apply(DataQuery $query) {

		$this->model = $query->applyRelation($this->relation);
		$value = $this->getValue();

		if ($value) {

			$query->innerJoin(
				'ProductCategory_Products',
				"\"ProductCategory_Products\".\"ProductID\" = \"SiteTree\".\"ID\""
			);
			$query->innerJoin(
				'SiteTree_Live',
				"\"SiteTree_Live\".\"ID\" = \"ProductCategory_Products\".\"ProductCategoryID\""
			);
			$query->where("\"SiteTree_Live\".\"ID\" LIKE '%" . Convert::raw2sql($value) . "%'");
		}
		return $query;
	}

	/**
	 * Determine whether the filter should be applied, depending on the 
	 * value of the field being passed
	 * 
	 * @see SearchFilter::isEmpty()
	 * @return Boolean
	 */
	public function isEmpty() {
		return $this->getValue() == null || $this->getValue() == '';
	}

	protected function applyOne(DataQuery $query) {

		SS_Log::log(new Exception(print_r($this->getValue(), true)), SS_Log::NOTICE);

		return;
	}

	protected function excludeOne(DataQuery $query) {
		return;
	}
}

