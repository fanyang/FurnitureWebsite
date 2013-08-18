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
	
	function update_config($update_config)
	{
		$object = new stdClass();
		
		foreach ($update_config as $key=>$value)
		{
			$object->value = $value;
			$this->db->where('attribute', $key);
			$this->db->update('config', $object);
		}
	}
}


/* End of file config_model.php */