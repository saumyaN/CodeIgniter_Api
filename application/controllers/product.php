<?php defined('BASEPATH') OR exit('No direct script access ALLOWED');

require APPPATH.'/libraries/REST_CONTROLLER.php';

class Product extends REST_Controller
 {
	function __construct()
	{
		
		parent::__construct();
        $this->load->helper('my_api');		
	}
	function product_get()
	{
		$PRODUCT_ID= $this->uri->segment(3);
		$this->load->model('model_products');
		$product = $this->model_products->get_by(array('PRODUCT_ID'=> $PRODUCT_ID,'status' => 'active'));
		if(isset($product['PRODUCT_ID']))
		{ 
		$this->response(array('status'=> 'success','message'=> $product));
		}
		else
		{
			$this->response(array('status'=>'failure','message'=>'product not found'));
		}
	}
	
	function product_put()
	{
		$this->load->library('form_validation');
		$data = remove_unknown_fields($this->put(), $this->form_validation->get_field_names('product_put'));
		$this->form_validation->set_data($data);
		if($this->form_validation->run('product_put') !=  false)
		{
			$this->load->model('model_Products');
			//$product = $this->put();
	
			$product_id = $this->model_Products->insert($data);
			if(!$product_id)
			{
				$this->response(array( 'status' =>'failure', 'message' => 'An unexcepted erroRS occured while trying to create the product'),REST_CONTROLLER::HTTP_INTERNAL_SERVER_ERROR);
			}
			else
			{
			$this->response(array('status'=> 'success','message'=> 'created'));
				
			}
		}
		else
		{
			$this->response(array( 'status' =>'failure', 'message' => $this->form_validation->get_error_as_array()),REST_CONTROLLER::HTTP_BAD_REQUEST);
			//die('BAD data');
			}
			
	}
			
			
			
	function product_post()
	{
		$PRODUCT_ID= $this->uri->segment(3);
		$this->load->model('model_products');
		$product = $this->model_products->get_by(array('PRODUCT_ID'=> $PRODUCT_ID,'status' => 'active'));
		if(isset($product['PRODUCT_ID']))
		{ 
			$this->load->library('form_validation');
			$data = remove_unknown_fields($this->post(), $this->form_validation->get_field_names('product_post'));
			$this->form_validation->set_data($data);
			if($this->form_validation->run('product_post') !=  false)
			{
				$this->load->model('model_Products');
				//$product = $this->put();
		
				$updated = $this->model_Products->update($PRODUCT_ID , $data);
				if(!$updated)
				{
					$this->response(array( 'status' =>'failure', 'message' => 'An unexcepted erroRS occured while trying to update the product'),REST_CONTROLLER::HTTP_INTERNAL_SERVER_ERROR);
				}
				else
				{
				$this->response(array('status'=> 'success','message'=> 'updated'));
					
				}  
			}
		}
		else
		{
			$this->response(array('status'=>'failure','message'=>'product not found'));
		}
			
	}
		function product_delete()
	{
		$PRODUCT_ID= $this->uri->segment(3);
		$this->load->model('model_products');
		$product = $this->model_products->get_by(array('PRODUCT_ID'=> $PRODUCT_ID,'status' => 'active'));
		if(isset($product['PRODUCT_ID']))
		{ 
		$data['status'] = 'deleted';
		$deleted = $this->model_products->update($PRODUCT_ID, $data);
			if(!deleted)
			{
				$this->response(array( 'status' =>'failure', 'message' => 'An unexcepted erroRS occured while trying to delete the product'),REST_CONTROLLER::HTTP_INTERNAL_SERVER_ERROR);
			}
			else
				{
				$this->response(array('status'=> 'success','message'=> 'deleted'));
					
				}  
		}
		else
		{
			$this->response(array('status'=>'failure','message'=>'product not found'));
		}
	}
	
}


