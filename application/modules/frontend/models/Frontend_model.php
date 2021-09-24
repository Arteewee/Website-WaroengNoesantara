<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Frontend_model extends CI_Model {





	function get($table)

	{

		$this->db->select('*');

		$this->db->from($table);

		return $this->db->get()->result();

	}

	function get_data($table)

	{

		return $this->db->get($table);

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

	function insert_pelanggan($data)

	{

		$this->db->insert('pelanggan', $data);

		$id = $this->db->insert_id();

		return (isset($id)) ? $id : FALSE;

	}

	function insert_order($data)

	{

		$this->db->insert('tbl_order', $data);

		$id = $this->db->insert_id();

		return (isset($id)) ? $id : FALSE;

	}

	function getid($idtbl,$id,$table)

	{

		return $this->db->get_where($table,[$idtbl=>$id])->row();

	}

	function update($data,$id,$table)

	{

		$this->db->set($data);

		$this->db->where($id,$id);

		return $this->db->update($table);



	}

	function upddata($dataupd) {
	    extract($dataupd);
	    $this->db->where('nama_produk', $nama_produk);
	    $this->db->update($table_name, array('jumlah' => $jumlah));
	    return true;
	}
	//query untuk update data stock setelah order

	function join($table,$table2,$kondisi)

	{

     	$this->db->select('*');

     	$this->db->from($table);

		$this->db->join($table2,$kondisi);

		//perintah untuk cari produk terbaru < 14 hari 
		$tgl_skrg = date("Y-m-d");
		$tgl_sebelum = 	date('Y-m-d', strtotime('-31 days', strtotime($tgl_skrg))); 
		$this->db->where('tanggal >=', $tgl_sebelum);
		$this->db->where('tanggal <=', $tgl_skrg);
		//
		return $this->db->get()->result();

	}

	function getjoin($table,$table2,$kondisi,$kolom,$nama)

	{

     	$this->db->select('*');

     	$this->db->from($table);

		$this->db->join($table2,$kondisi);

		return $this->db->where($kolom,$nama)->get()->row();

	}

	function bestproduk()

	{

		$this->db->select('*');

     	$this->db->from('produk');

		$this->db->join('kategori','kategori.id_kategori = produk.id_kategori');



		return $this->db->get()->result();

	}

	function sum()

	{



	

	}



}