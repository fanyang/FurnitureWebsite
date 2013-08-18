<?php 
class Category_model extends CI_Model {

	function get_categories()
	{
		$categories = 
		$this->db->select('*')
		->from('category')
		->order_by('id', 'ASC')
		->get()->result();
		
		return $categories;
	}
	
	function add_one_category($add_category)
	{
		$this->db->insert('category', $add_category);
		return $this->db->insert_id();
	}
	
	function delete_category_by_id($category_id)
	{
		$this->db->where('id', $category_id);
		$this->db->delete('category');
	}
	
	function modify_category($category)
	{
		$this->db->where('id', $category['id']);
		$this->db->update('category', $category);
	}
	
}


/* End of file category_model.php */