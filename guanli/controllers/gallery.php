<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') != 'true') redirect('home/login');
		
		$this->load->model('Gallery_model');
		
		
	}
	
	public function view($page=1)
	{
		define('PAGE_SIZE', 10);
		$header['title'] = '查看图片';
		$this->load->view('templates/header', $header);
		
		$data['total_pages'] = $this->Gallery_model->get_total_pages(PAGE_SIZE);
		$data['current_page'] = $page;
		$data['galleries'] = $this->Gallery_model->get_galleries($page, PAGE_SIZE);
		$this->load->view('gallery/view', $data);
		
		$this->load->view('templates/footer');
	}
	
	public function do_upload()
	{
		/*
		 * 上传图片
		 * 生成缩略图
		 * 存入数据库
		 */
		$config = array();
		$config['upload_path'] = getcwd().'/../galleryimg/source/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = date('YmdHis', mktime()).mt_rand(10000, 99999);
		$config['max_size']	= '10000';
		$this->load->library('upload', $config);

		if ( $this->input->post('title') == ""
				|| ! $this->upload->do_upload() 
				)
		{
			$message_data['message'] = '输入错误.';
			$message_data['url'] = base_url('gallery/add');
			$this->load->view('templates/message', $message_data);
			return;
		}
		else
		{
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			$new_image = date('YmdHis', mktime()).mt_rand(10000, 99999).$upload_data['file_ext'];
			$title = $this->input->post('title');
			
			$config = array();
			$config['image_library'] = 'gd2';
			$config['source_image']	= getcwd().'/../galleryimg/source/'.$file_name;
			$config['new_image']	= getcwd().'/../galleryimg/thumb/'.$new_image;
			$config['maintain_ratio'] = TRUE;
			$config['width']	 = 400;
			$config['height']	= 300;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			
			$pic['title'] = $title;
			$pic['img_url'] = '/galleryimg/source/'.$file_name;
			$pic['thumb_url'] = '/galleryimg/thumb/'.$new_image;
			$pic_id = $this->Gallery_model->add_pic($pic);
			
			$message_data['message'] = '添加成功. 图片编号为: ' . $pic_id;
			$message_data['url'] = base_url('gallery/add');
			$this->load->view('templates/message', $message_data);
			return;
		}
	}
	
	function add()
	{
		$header['title'] = '添加图片';
		$this->load->view('templates/header', $header);
		
		
		$this->load->helper(array('form'));
		$this->load->view('gallery/add');
		
		$this->load->view('templates/footer');

	}
	
	public function delete($id=0)
	{
		if ($id == 0)
		{
			$id = $this->input->post('id');
		}
		$pic = $this->Gallery_model->get_pic_by_id($id);
		if (!empty($pic))
		{
			$pic = $pic[0];
			unlink(getcwd().'/..'.$pic->img_url);
			unlink(getcwd().'/..'.$pic->thumb_url);
			$this->Gallery_model->delete_pic_by_id($id);
			
			$message_data['message'] = '删除成功. 图片编号: ' . $id;
			$message_data['url'] = base_url('gallery/view');
			$this->load->view('templates/message', $message_data);
			return;
		}
		
		$header['title'] = '删除画廊图片';
		$this->load->view('templates/header', $header);
		
		$this->load->view('gallery/delete');
		
		$this->load->view('templates/footer');
		
	}
	
	
	public function modify($id=0)
	{
		
		if($this->input->post('submit') != "")
		{
			$pic['id'] = $id;
			$pic['title'] = $this->input->post('title');
			$this->Gallery_model->update_gallery($pic);
			
			$message_data['message'] = '修改成功.图片编号: ' . $id;
			$message_data['url'] = base_url('gallery/view');
			$this->load->view('templates/message', $message_data);
			return;
		}
		else
		{
			$pic = $this->Gallery_model->get_pic_by_id($id);
			$pic = $pic[0];
			
			$header['title'] = '画廊图片修改';
			$this->load->view('templates/header', $header);
			
			
			$this->load->view('gallery/modify', array('pic'=>$pic));
			
			$this->load->view('templates/footer');
		}

	}
	
	
	
}



/* End of file gallery.php */