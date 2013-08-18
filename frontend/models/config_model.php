<?php 
class Config_model extends CI_Model {

	function get_config()
	{
		$config_array = 
		$this->db->select('*')
		->from('config')
		->get()->result();
		
		$config = new stdClass();
		foreach ($config_array as $conf)
		{
			$config->{$conf->attribute} = $conf->value;
		}
		
		return $config;
	}
}


/* End of file config_model.php */