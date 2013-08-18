<?php 
class Product_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }
    
    function get_latest_products($product_ids)
    {
    	
    	$latest_products = 
    	$this->db->select('p.id, p.pname, i.thumb_url as pic')
    	->from('product as p')
    	->join('product_img as i', 'p.img_id = i.id')
    	->order_by('p.id', 'DESC')
    	->where_in('p.id', $product_ids)
    	->get()->result();

        
        return $latest_products;
    }
    
    
    function get_product_by_id($product_id)
    {
    	$product =
    	$this->db->select('*')
    	->from('product')
    	->where('id', $product_id)
    	->get()->result();
    	
    	return $product;
    }
    
    
    
    function get_products_count_by_categories($categories_array)
    {
    	$products_count = 
    	$this->db->select('count(id) as number')
    	->from('product')
    	->where_in('cid', $categories_array)
    	->get()->result();
    	
    	return $products_count[0]->number;
    }
    

    
    function get_products_by_categories($categories_array, $page, $page_size)
    {
    	$products = 
    	$this->db->select('p.id, p.pname, i.thumb_url as pic')
    	->from('product as p')
    	->join('product_img as i', 'p.img_id = i.id')
    	->where_in('p.cid', $categories_array)
    	->order_by('p.id', 'DESC')
    	->limit($page_size, ($page-1)*$page_size)
    	->get()->result();
    	
    	return $products;
    }


}


/* End of file product_model.php */