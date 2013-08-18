<?php
class Product_img_model extends CI_Model {
	
	function select_imgs_by_product_id($product_id)
	{
		$product_imgs = 
		$this->db->select('*')
		->from('product_img')
		->where('pid', $product_id)
		->get()->result();
		
		return $product_imgs;
	}


}





















/* End of file category_model.php */