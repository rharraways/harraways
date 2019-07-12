<?php

class Attribute extends DataObject {

	private static $singular_name = 'Attribute';
	private static $plural_name = 'Attributes';

	public $firstWrite = false;

	/**
	 * DB fields for the Attribute
	 * 
	 * @see Product_Controller::AddToCartForm()
	 * @var Array
	 */
	private static $db = array(
		'Title' => 'Varchar(100)',
		'Description' => 'Text',
		'SortOrder' => 'Int'
	);
	
	/**
	 * Has many relations for the Attribute
	 * 
	 * @var Array
	 */
	private static $has_many = array(
		'Options' => 'Option'
	);

	private static $has_one = array(
		'Product' => 'Product',
		'DefaultAttribute' => 'Attribute_Default'
	);
	
	/**
	 * Searchable fields for Attributes
	 * 
	 * @var Array
	 */
	private static $searchable_fields = array(
		'Title'
	);
	
	/**
	 * Summary fields for Attributes
	 * 
	 * @var Array
	 */
	private static $summary_fields = array(
		'Title' => 'Title',
		'Description' => 'Description',
		'OptionSummary' => 'Options'
	);

	private static $default_sort = 'SortOrder';
	
	/**
	 * Add some fields to the CMS for managing Attributes.
	 * 
	 * @see DataObject::getCMSFields()
	 * @return FieldList
	 */
	function getCMSFields() {

		$fields = new FieldList(
			$rootTab = new TabSet('Root',
				$tabMain = new Tab('Attribute',
					TextField::create('Title')
						->setRightTitle('For displaying on the product page'),
					TextField::create('Description')
						->setRightTitle('For displaying on the order'),
					HiddenField::create('ProductID')
				)
			)
		);

		if (!$this->ID) {
			$defaultAttributes = Attribute_Default::get();
			if ($defaultAttributes && $defaultAttributes->exists()) {

				$fields->addFieldToTab(
					'Root.Attribute', 
					DropdownField::create(
						'DefaultAttributeID', 
						'Use existing attribute',
						$defaultAttributes->map('ID', 'TitleOptionSummary')->toArray()
					)->setHasEmptyDefault(true),
					'Title'
				);
				$fields->addFieldToTab('Root.Attribute', new HeaderField('AttributeOr', 'Or create new one...', 5), 'Title');
			}
		}

		if ($this->ID) {
			$fields->addFieldToTab('Root.Options', GridField::create(
				'Options',
				'Options',
				$this->Options(),
				GridFieldConfig_BasicSortable::create()
			));
		}

		$this->extend('updateCMSFields', $fields);
		return $fields;
	}

	public function OptionSummary() {
		$summary = '';
		$options = $this->Options();
		if ($options && $options->exists()) {
			$summary = implode(', ', $options->map()->values());
		}
		return $summary;
	}

	public function TitleOptionSummary() {

		$optionString = '';
		$options  = $this->Options();
		if ($options && $options->exists()) {
			$optionString = implode(', ', $options->map()->toArray());
		}
		return $this->Title . " - $optionString";
	}

	public function onBeforeWrite() {
		parent::onBeforeWrite();
		$this->firstWrite = !$this->isInDB();

		if ($this->firstWrite) {

			$defaultAttribute = $this->DefaultAttribute();
			if ($defaultAttribute && $defaultAttribute->exists()) {

				$this->Title = $defaultAttribute->Title;
				$this->Description = $defaultAttribute->Description;
			}
		}
	}

	public function onAfterWrite() {
		parent::onAfterWrite();

		//Check if first write
		if ($this->firstWrite) {

			$defaultAttribute = $this->DefaultAttribute();
			if ($defaultAttribute && $defaultAttribute->exists()) {

				$options = $defaultAttribute->Options();
				if ($options && $options->exists()) foreach ($options as $option) {
					$newOption = new Option();
					$newOption->update($option->tomap());
					$newOption->ID = null;
					$newOption->AttributeID = $this->ID;
					$newOption->write();
				}
			}
		}

		//If product variation does not have a complete set of valid options, then disable it
		$product = $this->Product();
		$variations = $product->Variations();

		if ($variations) foreach ($variations as $variation) {
			if (!$variation->hasValidOptions()) {
				$variation->Status = 'Disabled';
				$variation->write();
			}
		}
	}

	public function getOptionField($prev = null) {
		return Attribute_OptionField::create($this, $prev);
	}

}

class Attribute_OptionField extends DropdownField {

	public function __construct($attr, $prev = null) {

		Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
		Requirements::javascript(THIRDPARTY_DIR . '/jquery-entwine/dist/jquery.entwine-dist.js');
		Requirements::javascript('swipestripe/javascript/Attribute_OptionField.js');

		$product = $attr->Product();

		//Pass in the attribute ID
		$name = "Options[" . $attr->ID . "]";
		$title = $attr->Title;
		$source = $product->getOptionsForAttribute($attr->ID)->map();
		$value = null;
		
		$this->addExtraClass('dropdown');

		//If previous attribute field exists, listen to it and react with new options
		if ($prev && $prev->exists()) {

			$this->setAttribute('data-prev', "Options[" . $prev->ID  . "]");

			$variations = $product->Variations();

			$options = array();
			$temp = array();
			if ($variations && $variations->exists()) foreach ($variations as $variation) {

				$prevOption = $variation->getOptionForAttribute($prev->ID);
				$option = $variation->getOptionForAttribute($attr->ID);

				if ($prevOption && $prevOption->exists() && $option && $option->exists()) {
					$temp[$prevOption->ID][$option->SortOrder][$option->ID] = $option->Title;
				}
			}

			//Using SortOrder to sort the options
			foreach ($temp as $prevID => $optionArray) {
				ksort($optionArray);
				$sorted = array();
				foreach ($optionArray as $sort => $optionData) {
					$sorted += $optionData;
				}
				$options[$prevID] = $sorted;
			}

			$this->setAttribute('data-map', json_encode($options));
		}
		
		parent::__construct($name, $title, $source, $value);
	}
}

class Attribute_Default extends Attribute {

	private static $singular_name = 'Attribute';
	private static $plural_name = 'Attributes';

	private static $has_one = array(
		'ShopConfig' => 'ShopConfig'
	);

	public function onBeforeWrite() {
		parent::onBeforeWrite();
		$this->ProductID = 0;
	}

	function getCMSFields() {

		$fields = new FieldList(
			$rootTab = new TabSet('Root',
				$tabMain = new Tab('Attribute',
					TextField::create('Title')
						->setRightTitle('For displaying on the product page'),
					TextField::create('Description')
						->setRightTitle('For displaying on the order'),
					HiddenField::create('ProductID')
				)
			)
		);

		if ($this->ID) {
			$fields->addFieldToTab('Root.Options', GridField::create(
				'Options',
				'Options',
				$this->Options(),
				GridFieldConfig_Basic::create()
			));
		}

		return $fields;
	}
}


