<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {


	public function index($page = 1)
	{
		define('PAGE_SIZE', 10);
		
		$sub_categories = $this->Category_model->get_sub_categories();
		$header_data['title'] = 'Gallery - GraceAFurniture';
		$header_data['css'] = array('gallery');
		$header_data['js'] = array();
		$header_data['sub_categories'] = $sub_categories;
		$this->load->view('templates/header', $header_data);
		
		$this->load->model('Gallery_model');
		$data['gallery_img_count'] = $this->Gallery_model->get_gallery_imgs_count();
		$data['current_page'] = $page;
		$data['total_page'] = ceil($data['gallery_img_count']/PAGE_SIZE);
		$data['total_page'] = ($data['total_page']==0) ? 1 : $data['total_page'];
		if ( $page < 1 || ($page > $data['total_page']) )
		{
			show_404();
		}
		
		$data['gallery_imgs'] = $this->Gallery_model->get_gallery_imgs_by_page($page, PAGE_SIZE);
		$this->load->view('gallery/index', $data);
		
		$this->load->view('templates/footer');
	}
}

