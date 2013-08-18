<?php 
class Product_model extends CI_Model {
	
	function get_products($page, $page_size)
	{
		$products =
		$this->db->select('*')
		->from('product')
		->order_by('id', 'DESC')
		->limit($page_size, ($page-1)*$page_size)
		->get()->result();
	
		return $products;
	}
	
	function get_total_pages($page_size)
	{
		$total =
		$this->db->select("count('id') as c")
		->from('product')
		->get()->result();
	
		return ceil(($total[0]->c)/$page_size);
	}
	
	function add_product($product)
	{
		$this->db->insert('product', $product);
		return $this->db->insert_id();
	}
	
	function get_product_by_id($product_id)
	{
		return
		$this->db->select('*')
		->from('product')
		->where('id', $product_id)
		->get()->result();
	}
	
	function update_product($product)
	{
		$this->db->where('id', $product['id']);
		$this->db->update('product', $product);
	}
	
	
	function delete_product($product_id)
	{
		$this->db->where('id', $product_id);
		$this->db->delete('product'); 
	}
	
}


/* end of product_model */