<?php  if(!defined('BASEPATH'))  exit('No direct script access allowed');

$config = array(
'product_put' => array(
array('field' => 'PRODUCT_NAME' , 'label' => 'PRODUCT_NAME', 'rules' => 'trim|required|max_length[10]'),
array('field' => 'PRODUCT_COST' , 'label' => 'PRODUCT_COST', 'rules' => 'trim|required|max_length[16]'),
array('field' => 'PRODUCT_WEIGHT' , 'label' => 'PRODUCT_WEIGHT', 'rules' => 'trim|required|max_length[16]'),

),

'product_post' => array(
array('field' => 'PRODUCT_NAME' , 'label' => 'PRODUCT_NAME', 'rules' => 'trim|max_length[10]'),
array('field' => 'PRODUCT_COST' , 'label' => 'PRODUCT_COST', 'rules' => 'trim|max_length[16]'),
array('field' => 'PRODUCT_WEIGHT' , 'label' => 'PRODUCT_WEIGHT', 'rules' => 'trim|max_length[16]'),

),
);
?>