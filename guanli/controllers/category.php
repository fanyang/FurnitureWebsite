<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') != 'true') redirect('home/login');
		
		$this->load->model('Category_model');
		
	}
	
	public function view()
	{
		$header['title'] = '分类查看';
		$this->load->view('templates/header', $header);
		
		$data['categories'] = $this->Category_model->get_categories();
		$this->load->view('category/view', $data);
		
		$this->load->view('templates/footer');
	}
	
	public function add()
	{
		if ($this->input->post('submit') != "")
		{
			if ($this->input->post('fid') == "" || $this->input->post('cname') == "")
			{
				$message_data['message'] = '输入错误.';
				$message_data['url'] = base_url('category/add');
				$this->load->view('templates/message', $message_data);
				return;
			}
			
			$add_category['fid'] = $this->input->post('fid');
			$add_category['cname'] = $this->input->post('cname');
			$insert_id = $this->Category_model->add_one_category($add_category);
			
			$message_data['message'] = '添加成功. 分类编号为: ' . $insert_id;
			$message_data['url'] = base_url('category/add');
			$this->load->view('templates/message', $message_data);
			return;
		}
		
		
		$header['title'] = '分类添加';
		$this->load->view('templates/header', $header);
		
		$this->load->model('Category_model');
		$data['categories'] = $this->Category_model->get_categories();
		$this->load->view('category/add', $data);
		
		$this->load->view('templates/footer');
	}
	
	public function delete()
	{
		if ($this->input->post('submit') != "")
		{
			if ($this->input->post('id') == "" 
					|| $this->input->post('id') == "0"
					|| $this->input->post('id') == "1"
					|| $this->input->post('id') == "2"
					|| $this->input->post('id') == "3"
					)
			{
				$message_data['message'] = '输入错误.';
				$message_data['url'] = base_url('category/delete');
				$this->load->view('templates/message', $message_data);
				return;
			}
				
			$category_id = $this->input->post('id');
			$this->Category_model->delete_category_by_id($category_id);
			
			$message_data['message'] = '删除成功. 分类编号为: ' . $category_id;
			$message_data['url'] = base_url('category/delete');
			$this->load->view('templates/message', $message_data);
			return;
		}
		
		
		$header['title'] = '分类删除';
		$this->load->view('templates/header', $header);
		
		$data['categories'] = $this->Category_model->get_categories();
		$this->load->view('category/delete', $data);
		
		$this->load->view('templates/footer');
	}
	
	public function modify()
	{
		if ($this->input->post('submit') != "")
		{
			if ($this->input->post('id') == "" 
					|| $this->input->post('fid') == ""
					|| $this->input->post('cname') == "")
			{
				$message_data['message'] = '输入错误.';
				$message_data['url'] = base_url().'category/modify';
				$this->load->view('templates/message', $message_data);
				return;
			}

			$category['id'] = $this->input->post('id');
			$category['fid'] = $this->input->post('fid');
			$category['cname'] = $this->input->post('cname');
			$this->Category_model->modify_category($category);
			
			$message_data['message'] = '修改成功. 分类编号为:' . $category['id'];
			$message_data['url'] = base_url('category/modify');
			$this->load->view('templates/message', $message_data);
			return;
		}
		
		$header['title'] = '分类修改';
		$this->load->view('templates/header', $header);
		
		$data['categories'] = $this->Category_model->get_categories();
		$this->load->view('category/modify', $data);
		
		$this->load->view('templates/footer');
	}
	
	
	
}



/* End of file category.php */