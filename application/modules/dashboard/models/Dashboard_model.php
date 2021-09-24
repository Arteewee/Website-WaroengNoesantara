<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard_model extends CI_Model {





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

	function delete($idt,$id,$table)

	{

		$this->db->where($idt,$id);

		return $this->db->delete($table);



	}

	function insert($table,$data)

	{

		return $this->db->insert($table,$data);

	}

	public function insert_batch($table,$data = array()){

        // Insert Ke Database dengan Banyak Data Sekaligus

        return $this->db->insert_batch($table,$data);

    }

	function getid($idtbl,$id,$table)

	{

		return $this->db->get_where($table,[$idtbl=>$id])->row();

	}

	function update($data,$idtbl,$id,$table)

	{

		$this->db->set($data);

		$this->db->where($idtbl,$id);

		return $this->db->update($table);

	}

	function join($table,$table2,$kondisi,$typejoin)

	{

		$this->db->select('*');


		$this->db->from($table);

		$this->db->join($table2,$kondisi,$typejoin);

		$this->db->order_by('produk.id_produk','DESC');

		return $this->db->get()->result();

	}

	function invoice()

	{

		$this->db->select('*,tbl_order.id_order as tbl_id_order');

		$this->db->group_by('tbl_order.id_order');

		$this->db->from('tbl_order');

		$this->db->join('pelanggan','pelanggan.id_pelanggan = tbl_order.id_pelanggan');

		$this->db->join('order_detail','order_detail.id_order = tbl_order.id_order');

		$this->db->order_by('tbl_order.tanggal','DESC');

		return $this->db->get()->result();	

	}

	function getinvoiceid($id)

	{

		$this->db->select('*,tbl_order.id_order as tbl_id_order');


		$this->db->from('tbl_order');

		$this->db->join('pelanggan','pelanggan.id_pelanggan = tbl_order.id_pelanggan');

		$this->db->join('order_detail','order_detail.id_order = tbl_order.id_order');

		$this->db->where('order_detail.id_order',$id);
		

		$this->db->order_by('tbl_order.tanggal','DESC');

		return $this->db->get()->result();	

	}

	function invoiceid($id)

	{

		$this->db->select('*,tbl_order.id_order as tbl_id_order');


		$this->db->from('tbl_order');

		$this->db->join('pelanggan','pelanggan.id_pelanggan = tbl_order.id_pelanggan');


		$this->db->join('order_detail','order_detail.id_order = tbl_order.id_order');

		$this->db->where('tbl_order.id_order',$id);

		return $this->db->get()->row();

	}



}