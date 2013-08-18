<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
	
		$header_data['title'] = 'Contact - GraceAFurniture';
		$header_data['css'] = array('contact');
		$header_data['js'] = array();
		$header_data['sub_categories'] = $this->Category_model->get_sub_categories();
		$this->load->view('templates/header', $header_data);
		
		$this->load->view('/contact/index');
		$this->load->view('templates/footer');
	}
	
	public function submit()
	{
		session_start();
		$captcha = $this->input->get_post('captcha');
		
		if (!isset($_SESSION['captcha']) || strcasecmp($captcha, $_SESSION['captcha']) != 0)
		{
			unset($_SESSION['captcha']);
			$message_data['message'] = 'The answer you entered for the CAPTCHA was not correct.';
		}
		else
		{
			unset($_SESSION['captcha']);
			
			$this->load->model('Config_model');
			$config = $this->Config_model->get_config();
			
			$message = "";
			$message .="<html>";
			$message .="<head>";
			$message .="</head>";
			$message .="<body>";
			$message .="<table border=1>";
			$message .= '<tr><th>Name: </th><td>' . $this->_filter_post_string('name', 50) . '</td></tr>';
			$message .= '<tr><th>Email: </th><td>' . $this->_filter_post_string('email', 50) . '</td></tr>';
			$message .= '<tr><th>Phone: </th><td>' . $this->_filter_post_string('phone', 50) . '</td></tr>';
			$message .= '<tr><th>Message: </th><td>' . $this->_filter_post_string('message', 2000) . '</td></tr>';
			$message .="</table>";
			$message .="</body>";
			$message .="</html>";
			
			$email_config['mailtype'] = 'html';
			$email_config['charset'] = 'utf-8';
			
			$this->load->library('email');
			$this->email->initialize($email_config);
			$this->email->from('info@graceafurniture.com', 'GraceAFurniture.com');
			$this->email->to($config->email);
			$this->email->subject('GraceAFurniture Web Message');
			$this->email->message($message);
			$this->email->send();
			
			$message_data['message'] = 'Thank you, your submission has been received.';
		}
		
		$message_data['url'] = base_url('contact');
		$this->load->view('templates/message', $message_data);
		return;
	}
	
	private function _filter_post_string($post_name, $length)
	{
		$str = $this->input->get_post($post_name);
		$str = substr($str, 0, $length);
		$str = htmlentities($str,ENT_QUOTES,'UTF-8');
		return $str;
	}
}


/* end of file contact.php */