<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') != 'true') redirect('home/login');
		
		$this->load->model('Product_model');
	}
	
	public function view($page=1)
	{
		define('PAGE_SIZE', 20);
		$header['title'] = '产品列表';
		$this->load->view('templates/header', $header);
	
		$data['total_pages'] = $this->Product_model->get_total_pages(PAGE_SIZE);
		$data['current_page'] = $page;

		$this->load->model('Album_model');
		$products = $this->Product_model->get_products($page, PAGE_SIZE);
		foreach ($products as $key=>$value)
		{
			$products[$key]->img_count = $this->Album_model->get_img_count_by_product_id($value->id);
		}
		
		$data['products'] = $products;
		$this->load->view('product/view', $data);
	
		$this->load->view('templates/footer');
	}
	
	public function add()
	{
		if ($this->input->post('submit') != "")
		{
			$product['pname'] = $this->input->post('pname');
			$product['cid'] = $this->input->post('cid');
			$product['description'] = $this->input->post('description');
			
			//添加完之后修改产品标题
			$product['id'] = $this->Product_model->add_product($product);
			$product['pname'] = 'GAF-'.$product['id'].' '.$product['pname'];
			unset($product['description']);
			$this->Product_model->update_product($product);
			
			$message_data['message'] = '添加成功. 产品编号为: ' . $product['id'];
			$message_data['url'] = base_url('product/modify/' . $product['id']);
			$this->load->view('templates/message', $message_data);
			return;
			
		}
		
		
		$header['title'] = '添加产品';
		$this->load->view('templates/header', $header);
	
		$this->load->view('product/add');
	
		$this->load->view('templates/footer');
	}
	
	
	public function modify($product_id)
	{
		if ($this->input->post('submit') != "")
		{
			$product['id'] = $this->input->post('id');
			$product['img_id'] = $this->input->post('img_id');
			$product['pname'] = $this->input->post('pname');
			$product['cid'] = $this->input->post('cid');
			$product['description'] = $this->input->post('description');
				
			$this->Product_model->update_product($product);
			
			$message_data['message'] = '修改成功. 产品编号为: ' . $product_id;
			$message_data['url'] = base_url('product/modify/' . $product_id);
			$this->load->view('templates/message', $message_data);
			return;
		}
	
	
		$header['title'] = '修改产品';
		$this->load->view('templates/header', $header);
	
		$product = $this->Product_model->get_product_by_id($product_id);
		$this->load->view('product/modify', array('product'=>$product[0]));
	
		$this->load->view('templates/footer');
	}
	
	public function delete($product_id)
	{
		$this->Product_model->delete_product($product_id);
		
		$this->load->model('Album_model');
		$this->Album_model->delete_product_pics($product_id);
		
		$message_data['message'] = '删除成功. 产品编号为: ' . $product_id;
		$message_data['url'] = base_url('product/view');
		$this->load->view('templates/message', $message_data);
		return;
		
	}
	
}



/* end of product.php */