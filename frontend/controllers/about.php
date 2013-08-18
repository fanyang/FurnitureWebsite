<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {


	public function index()
	{

		$header_data['title'] = 'About - GraceAFurniture';
		$header_data['css'] = array('about');
		$header_data['js'] = array();
		$header_data['sub_categories'] = $this->Category_model->get_sub_categories();
		$this->load->view('templates/header', $header_data);
		
		$this->load->view('/about/index');
		
		$this->load->view('templates/footer');
		
	}
}

