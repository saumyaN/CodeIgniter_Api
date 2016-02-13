<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_Products extends My_model {
	protected $_table = 'products'; //same table name as in DB
	protected $_primary_key = 'PRODUCT_ID';
	protected $return_type = 'array';
	
	protected $after_get = array('remove_sensitive_data');  
	//to remove data we dont want to send 
	protected $before_create = array('prep_data');
	protected $before_update = array('update_timestamp');
	protected function remove_sensitive_data($product)
	{
		unset($product['PRODUCT_STOCK']);
		return $product;
	}
	
	protected function prep_data($product){
		
	//	$product['password'] = md5($student['password']); // to hash the password use if using password
		$product['CREATED_TIMESTAMP']= date('y-m-d-h-i-s');
		return $product;
	}
	protected function update_timestamp($product){
		
	//	$product['password'] = md5($student['password']); // to hash the password use if using password
		$product['UPDATED_TIMESTAMP']= date('y-m-d-h-i-s');
		return $product;
	}
}  


