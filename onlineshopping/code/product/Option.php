<?php

class Option extends DataObject {

	private static $singular_name = 'Option';
	private static $plural_name = 'Options';

	/**
	 * DB fields for this Option
	 * 
	 * @var Array
	 */
	private static $db = array(
		'Title' => 'Varchar(255)',
		'Description' => 'Text',
		'SortOrder' => 'Int'
	);

	/**
	 * Has one relations for an Option
	 * 
	 * @var Array
	 */
	private static $has_one = array(
		'Attribute' => 'Attribute',
		'Product' => 'Product'
	);
	
	/**
	 * Belongs many many relations for an Option
	 * 
	 * @var Array
	 */
	private static $belongs_many_many = array(
		'Variations' => 'Variation'
	);

	private static $default_sort = 'SortOrder';

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName('Variations');
		$fields->removeByName('ProductID');
		$fields->removeByName('AttributeID');
		$fields->removeByName('SortOrder');
		return $fields;
	}

}

class Option_Default extends Option {

	private static $singular_name = 'Option';
	private static $plural_name = 'Options';

	public function onBeforeWrite() {
		parent::onBeforeWrite();
		$this->ProductID = 0;
	}
}