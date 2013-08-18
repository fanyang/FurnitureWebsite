<?php 
class Album_model extends CI_Model {
	
	function delete_product_pics($product_id)
	{
		$product_imgs = 
		$this->db->select('*')
		->from('product_img')
		->where('pid', $product_id)
		->get()->result();
		
		foreach ($product_imgs as $product_img)
		{
			unlink(getcwd().'/..'.$product_img->thumb_url);
			unlink(getcwd().'/..'.$product_img->medium_pic_url);
			unlink(getcwd().'/..'.$product_img->img_url);
			
			$this->db->where('id', $product_img->id);
			$this->db->delete('product_img');
		}
	
	}
	
	function delete_pics_by_album_id($album_id)
	{
		$product_img =
		$this->db->select('*')
		->from('product_img')
		->where('id', $album_id)
		->get()->result();
		$product_img = $product_img[0];
		
		unlink(getcwd().'/..'.$product_img->thumb_url);
		unlink(getcwd().'/..'.$product_img->medium_pic_url);
		unlink(getcwd().'/..'.$product_img->img_url);
			
		$this->db->where('id', $product_img->id);
		$this->db->delete('product_img');
		
		return $product_img->pid;
	}
	
	
	function get_pics_by_product_id($product_id)
	{
		return 
		$this->db->select('*')
		->from('product_img')
		->where('pid', $product_id)
		->get()->result();
	}
	
	
	function add_pic($pic)
	{
		$this->db->insert('product_img', $pic);
		return $this->db->insert_id();
	}
	
	
	function get_img_count_by_product_id($pid)
	{
		$img_count = 
		$this->db->select("count('id') as c")
		->from('product_img')
		->where('pid', $pid)
		->get()->result();
		
		return $img_count[0]->c;
	}
	
	
	
}


/* end of album_model */