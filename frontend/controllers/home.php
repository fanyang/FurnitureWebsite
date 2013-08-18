<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$header_data['title'] = 'GraceAFurniture';
		$header_data['css'] = array('home');
		$header_data['js'] = array();
		$header_data['sub_categories'] = $this->Category_model->get_sub_categories();
		$this->load->view('templates/header', $header_data);
		
		$this->load->model('Product_model');
		$this->load->model('Config_model');
		$product_ids = $this->Config_model->get_config()->latest;
		$product_ids = explode(',', $product_ids);
		$data = array('products'=>$this->Product_model->get_latest_products($product_ids));
		$this->load->view('home/index', $data);
		
		$this->load->view('templates/footer');
	}
}

/* End of file home.php */