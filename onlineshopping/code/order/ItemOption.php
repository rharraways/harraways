<?php

class ItemOption extends DataObject {

	/**
	 * Relations for this class
	 * 
	 * @var Array
	 */
	private static $has_one = array(
		'Item' => 'Item'
	);

	/**
	 * DB fields for this class
	 * 
	 * @var Array
	 */
	private static $db = array(
		'Description' => 'Varchar',
		'Price' => 'Decimal(19,8)'
	);

	public function Amount() {

		// TODO: Multi currency

		$order = $this->Order();

		$amount = new Price();
		$amount->setAmount($this->Price);
		$amount->setCurrency($order->BaseCurrency);
		$amount->setSymbol($order->BaseCurrencySymbol);
		return $amount;
	}

	/**
	 * Display price, can decorate for multiple currency etc.
	 * 
	 * @return Price
	 */
	public function Price() {
		
		$amount = $this->Amount();

		//Transform price here for display in different currencies etc.
		$this->extend('updatePrice', $amount);

		return $amount;
	}

	public function Order() {
		return $this->Item()->Order();
	}

}
