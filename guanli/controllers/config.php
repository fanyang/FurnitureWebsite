<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('is_login') != 'true') redirect('home/login');
		
		$this->load->model('Config_model');
		
	}

	public function index()
	{
		$header['title'] = '系统设置';
		$this->load->view('templates/header', $header);
		
		$data['config'] = $this->Config_model->get_config();
		$this->load->view('config/index', $data);
		
		$this->load->view('templates/footer');
	}
	
	function submit()
	{
		$config = $this->Config_model->get_config();
		if ($this->input->post('submit') == ""
				|| $this->input->post('username') == ""
				|| $this->input->post('email') == ""
				|| $this->input->post('latest') == ""
				)
		{
			$message_data['message'] = '输入错误.';
			$message_data['url'] = base_url('config');
			$this->load->view('templates/message', $message_data);
			return;
		}
		
		if ($this->input->post('old_password') != "")
		{
			if (md5(md5($this->input->post('old_password')).$config->salt) == $config->password
					&& $this->input->post('new_password') == $this->input->post('new_password_again')
					&& $this->input->post('new_password') != ""
			)
			{
				$update_config['password'] = md5(md5($this->input->post('new_password')).$config->salt);
			}
			else
			{
				$message_data['message'] = '密码输入不正确.';
				$message_data['url'] = base_url('config');
				$this->load->view('templates/message', $message_data);
				return;
			}
			
		}
		
		$update_config['username'] = $this->input->post('username');
		$update_config['email'] = $this->input->post('email');
		$update_config['latest'] = $this->input->post('latest');
		$this->Config_model->update_config($update_config);
		
		$message_data['message'] = '修改成功.';
		$message_data['url'] = base_url('config');
		$this->load->view('templates/message', $message_data);
		return;
		
	}
	
	

}

/* End of file config.php */