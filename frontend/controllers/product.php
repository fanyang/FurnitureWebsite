<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {


	public function index($product_id = 0)
	{
		/*
		 * 产品分类面包屑导航
		 * 产品名
		 * 产品介绍
		 * 产品图片及缩略图地址
		 * 
		 */
		$this->load->model('Product_model');
		$product = $this->Product_model->get_product_by_id($product_id);
		if (empty($product))
		{
			show_404();
		}
		else
		{
			$product = $product[0];
		}
		
		
		$sub_categories = $this->Category_model->get_sub_categories();
		$header_data['title'] = $product->pname . ' - GraceAFurniture';
		$header_data['css'] = array('product');
		$header_data['js'] = array();
		$header_data['sub_categories'] = $sub_categories;
		$this->load->view('templates/header', $header_data);
		
		$data['categories_tree'] = $this->Category_model->get_reverse_categories_tree($product->cid);
		$data['product'] = $product;
		$this->load->model('Product_img_model');
		$data['product_imgs'] = $this->Product_img_model->select_imgs_by_product_id($product->id);
		$this->load->view('product/index', $data);
		
		$this->load->view('templates/footer');
	}
}

