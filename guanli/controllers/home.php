<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('is_login') != 'true') redirect('home/login');

		$header['title'] = '后台管理首页';
		$this->load->view('templates/header', $header);
		$this->load->view('home/index');
		$this->load->view('templates/footer');
	}
	
	public function login()
	{
		session_start();
		if ($this->session->userdata('is_login') == 'true')
		{
			redirect('home');
		}
		
		if ($this->input->post('submit') != "") 
		{
			$config = $this->Config_model->get_config();
			$name = $this->input->post('username');
			$password = $this->input->post('password');
			$pass = md5( md5($password) . $config->salt );
			$captcha = $this->input->get_post('captcha');
			
			//每次登陆记录登陆信息
			$log_message = $this->input->ip_address() . " " . $name . " " . $password;
			log_message('error', $log_message);
			
			
			if ($name == $config->username 
					&& $pass == $config->password
					&& isset($_SESSION['captcha'])
					&& strcasecmp($captcha, $_SESSION['captcha']) == 0
				)
			{
				unset($_SESSION['captcha']);
				$this->session->set_userdata('username', $name);
				$this->session->set_userdata('is_login', 'true');
				redirect('home');
			}
		}
		
		unset($_SESSION['captcha']);
		$this->load->view('home/login');
	}
	
	public function logout()
	{
		$this->session->set_userdata('is_login', 'false');
		$this->session->set_userdata('username', '');
		redirect('home/login');
	}
}

/* End of file home.php */