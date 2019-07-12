<?php
/**
 * Remove orders that were placed while the site was in 'dev' mode. Useful for cleaning up after
 * testing a new site.
 */

class RemoveDevOrdersTask extends BuildTask {
	
	protected $title = "Remove testing orders";
	
	protected $description = "Remove orders that were placed while website was in 'dev' mode.";

	function run($request) {
		$orders = Order::get()
			->where("\"Order\".\"Env\" = 'dev'");

		if ($orders && $orders->exists()) foreach ($orders as $order) {
			$order->delete();
			$order->destroy();
		}
	}
}
