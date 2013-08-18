<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {


	public function index($category_id = 0, $page = 1)
	{
		
		define('PAGE_SIZE', 6);
		
		$category = $this->Category_model->get_category_by_id($category_id);
		if (empty($category))
		{
			show_404();
		}
		else
		{
			$category = $category[0];
		}
		
		$sub_categories = $this->Category_model->get_sub_categories();
		$header_data['title'] = $category->cname . ' - GraceAFurniture';
		$header_data['css'] = array('category');
		$header_data['js'] = array();
		$header_data['sub_categories'] = $sub_categories;
		$this->load->view('templates/header', $header_data);
		
		$categories_array = $this->Category_model->get_categories_tree($category_id);
		$this->load->model('Product_model');
		$data['products_count'] = $this->Product_model->get_products_count_by_categories($categories_array);
		$data['current_page'] = $page;
		$data['total_page'] = ceil($data['products_count']/PAGE_SIZE);
		$data['total_page'] = ($data['total_page']==0) ? 1 : $data['total_page'];
		if ( $page < 1 || ($page > $data['total_page']) )
		{
			show_404();
		}
		$data['products'] = $this->Product_model->get_products_by_categories($categories_array, $page, PAGE_SIZE);
		$data['category']= $category;
		$data['sub_categories'] = $sub_categories;
		$this->load->view('category/index', $data);
		
		$this->load->view('templates/footer');
	}
}



/* end of file category.php*/