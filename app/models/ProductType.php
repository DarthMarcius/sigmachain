<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Product extends ProductType{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_types';
}
