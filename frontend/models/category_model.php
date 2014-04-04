<?php 
class Category_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }
    
    function get_sub_categories()
    {
    	$sub_categories = array();
    	for ($i=1; $i<=3; $i++)
    	{
    		$sub_categories[$i] = 
    		$this->db->select('id, cname')
    		->from('category')
    		->where('fid', $i)
    		->order_by('cname', 'ASC')
    		->get()
    		->result();
    	}
        
        return $sub_categories;
    }
    
    function get_category_by_id($id)
    {
    	$category = 
    	$this->db->select('*')
    	->from('category')
    	->where('id', $id)
    	->get()
    	->result();
    	
    	return $category;
    }
    
    
    function get_categories_tree($category_id)
    {
    	if ($category_id == 0)
    	{
    		$categories =
    		$this->db->select('id')
    		->from('category')
    		->where('id !=', $category_id)
    		->get()->result();
    	}
    	else
    	{
    		$categories =
    		$this->db->select('id')
    		->from('category')
    		->where('id', $category_id)
    		->or_where('fid', $category_id)
    		->get()->result();
    	}
    	
    	 
    	$categories_array = array();
    	foreach ($categories as $category)
    	{
    		$categories_array[] = $category->id;
    	}
    	
    	return $categories_array;
    }
    
    function get_reverse_categories_tree($category_id)
    {
    	$categories_tree = array();
    	
    	$category = $this->get_category_by_id($category_id);
    	
    	while (!empty($category))
    	{
    		$category = $category[0];
    		$categories_tree[] = $category;
    		$category_id = $category->fid;
    		$category = $this->get_category_by_id($category_id);
    	}
    	
    	return array_reverse($categories_tree);
    }


}


/* End of file category_model.php */