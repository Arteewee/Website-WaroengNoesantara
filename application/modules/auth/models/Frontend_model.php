<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_model extends CI_Model {


	function get($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get()->result();
	}
	function limit($table,$limit)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($limit);
		return $this->db->get()->result();
	}
	function delete($id,$table)
	{
		$this->db->where($id,$id);
		return $this->db->delete($table);

	}
	function insert($table,$data)
	{
		return $this->db->insert($table,$data);
	}
	function getid($id,$table)
	{
		return $this->db->get_where($table,[$id=>$id])->row();
	}
	function update($data,$id,$table)
	{
		$this->db->set($data);
		$this->db->where($id,$id);
		return $this->db->update($table);

	}
	function join($table,$table2,$kondisi)
	{
     	$this->db->select('*');
     	$this->db->from($table);
		$this->db->join($table2,$kondisi);
		$this->db->limit(8);
		return $this->db->get()->result();
	}
	function bestproduk()
	{
		$this->db->select('*');
     	$this->db->from('produk');
		$this->db->join('kategori','kategori.id_kategori = produk.id_kategori');
		$this->db->join('rating','rating.id_produk = produk.id_produk');
		$this->db->group_by('rating.id_produk');
		return $this->db->get()->result();
	}
	function sum()
	{

	
	}

}