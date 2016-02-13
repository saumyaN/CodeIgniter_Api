<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_Products extends My_model {
	protected $_table = 'products'; //same table name as in DB
	protected $_primary_key = 'PRODUCT_ID';
	protected $return_type = 'array';
}