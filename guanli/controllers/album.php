<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Album extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') != 'true') redirect('home/login');
		
		$this->load->model('Album_model');
	}
	
	function view($product_id)
	{
		$header['title'] = '产品相册';
		$this->load->view('templates/header', $header);
		
		$data['product_id'] = $product_id;
		$data['pics'] = $this->Album_model->get_pics_by_product_id($product_id);
		$this->load->helper('form');
		$this->load->view('album/view', $data);
		
		$this->load->view('templates/footer');
	}
	
	function upload()
	{
		/*
		 * 上传图片
		* 生成缩略图
		* 生成中等图
		* 存入数据库
		*/
		$config = array();
		$config['upload_path'] = getcwd().'/../upload/source/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = date('YmdHis', mktime()).mt_rand(10000, 99999);
		$config['max_size']	= '10000';
		$this->load->library('upload', $config);
		
		if (! $this->upload->do_upload())
		{
			$message_data['message'] = '上传错误';
			$message_data['url'] = base_url('album/view/' . $this->input->post('product_id'));
			$this->load->view('templates/message', $message_data);
			return;
		}
		
		$upload_data = $this->upload->data();
		$file_name = $upload_data['file_name'];
		$thumb_name = date('YmdHis', mktime()).mt_rand(10000, 99999).$upload_data['file_ext'];
		$medium_pic_name = date('YmdHis', mktime()).mt_rand(10000, 99999).$upload_data['file_ext'];
		$pid = $this->input->post('product_id');

		$this->load->library('image_lib');
		$config = array();
		$config['image_library'] = 'gd2';
		$config['source_image']	= getcwd().'/../upload/source/'.$file_name;
		$config['new_image']	= getcwd().'/../upload/thumb/'.$thumb_name;
		$config['maintain_ratio'] = TRUE;
		$config['width']	 = 200;
		$config['height']	= 200;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		
		$config['new_image']	= getcwd().'/../upload/thumb/'.$medium_pic_name;
		$config['width']	 = 400;
		$config['height']	= 400;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		
		
		$pic['pid'] = $pid;
		$pic['img_url'] = '/upload/source/'.$file_name;
		$pic['thumb_url'] = '/upload/thumb/'.$thumb_name;
		$pic['medium_pic_url'] = '/upload/thumb/'.$medium_pic_name;
		$pic_id = $this->Album_model->add_pic($pic);

		$message_data['message'] = '添加成功. 图片编号为: ' . $pic_id;
		$message_data['url'] = base_url('album/view/' . $pid);
		$this->load->view('templates/message', $message_data);
		return;
		
		
	}
	
	function delete($album_id)
	{
		$product_id = $this->Album_model->delete_pics_by_album_id($album_id);
		
		$message_data['message'] = '删除成功.';
		$message_data['url'] = base_url('album/view/' . $product_id);
		$this->load->view('templates/message', $message_data);
		return;
	}
	
}









/* end of album.php */