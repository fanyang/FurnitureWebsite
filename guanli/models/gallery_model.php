<?php 
class Gallery_model extends CI_Model {

	function get_galleries($page, $page_size)
	{
		$galleries = 
		$this->db->select('*')
		->from('gallery')
		->order_by('id', 'DESC')
		->limit($page_size, ($page-1)*$page_size)
		->get()->result();
		
		return $galleries;
	}
	
	function get_total_pages($page_size)
	{
		$total =
		$this->db->select("count('id') as c")
		->from('gallery')
		->get()->result();
		
		return ceil(($total[0]->c)/$page_size);
	}
	
	function add_pic($pic)
	{
		$this->db->insert('gallery', $pic);
		return $this->db->insert_id();
	}
	
	function get_pic_by_id($id)
	{
		return 
		$this->db->select('*')
		->from('gallery')
		->where('id', $id)
		->get()->result();
	}
	
	function delete_pic_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('gallery');
	}
	
	
	function update_gallery($pic)
	{
		$this->db->where('id', $pic['id']);
		$this->db->update('gallery', $pic);
	}
	
}


/* End of file gallery_model.php */