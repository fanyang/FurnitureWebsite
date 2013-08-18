<?php 
class Gallery_model extends CI_Model {

	function get_gallery_imgs_count()
	{
		$gallery_imgs_count = 
		$this->db->select("count('id') as num")
		->from('gallery')
		->get()->result();
		return $gallery_imgs_count[0]->num;
	}
	
	
	function get_gallery_imgs_by_page($page, $page_size)
	{	
		$gallery_imgs = 
		$this->db->select('*')
		->from('gallery')
		->order_by('id', 'DESC')
		->limit($page_size, ($page-1)*$page_size)
		->get()->result();
		
		return $gallery_imgs;
	}

}


/* End of file gallery_model.php */