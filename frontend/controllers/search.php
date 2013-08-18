<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {


	public function index()
	{

		$product_id = $this->input->post('pid');
		$this->load->model('Product_model');
		$product = $this->Product_model->get_product_by_id($product_id);
		
		if (!empty($product))
		{
			redirect(base_url('product/' . $product[0]->id));
		}
		else
		{
			$message_data['message'] = 'Product not found.';
			$message_data['url'] = base_url();
			
			$this->load->view('templates/message', $message_data);
		}
		
	}
}









/* end of file search.php */