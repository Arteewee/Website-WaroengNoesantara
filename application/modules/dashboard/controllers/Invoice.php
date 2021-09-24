<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Invoice extends MY_Controller {



	function __construct(){

		parent::__construct();

		if($this->session->userdata('username')=== null){

			$this->session->set_flashdata('message','<div class ="alert alert-danger" role = "alert">harap login terlebih dahulu!!! </div>');

			redirect('auth/Auth','refresh');

		}

		$this->load->model('dashboard/Dashboard_model');



	}

	public function index($id)

	{

		$data['barang'] = $this->Dashboard_model->getinvoiceid($id);

		$data['invoice'] = $this->Dashboard_model->invoiceid($id);

		$data['nama'] = $this->session->userdata('username');

		$data['nama1'] = $this->session->userdata('nama');

		$this->load->view('header');

		$this->load->view('sidebar',$data);

		$this->load->view('invoice');

		$this->load->view('footer');

	}

	function ubahstatus()

	{

		$bayar = $this->input->post('bayar');

		$batal = $this->input->post('batal');

		$masak = $this->input->post('masak');

		// $print = $this->input->post('print');

		$done = $this->input->post('done');

		$id = $this->input->post('id');

		if($bayar)

		{

			$this->db->set('status',$bayar);

			$this->db->where('id_order',$id);

			$this->db->update('order_detail');

			$this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Edit Status Berhasil </div>');

			redirect('dashboard/Dashboard/','refresh');

		}elseif($batal){

			$this->db->set('status',$batal);

			$this->db->where('id_order',$id);

			$this->db->update('order_detail');

			$this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Edit Status Berhasil </div>');

			redirect('dashboard/Dashboard/','refresh');



		}
		// elseif($print){

		// 	window.print();

		// 	redirect('dashboard/Dashboard/','refresh');



		// }
		elseif($done){

			$this->db->set('status',$done);

			$this->db->where('id_order',$id);

			$this->db->update('order_detail');

			$this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Edit Status Berhasil </div>');

			redirect('dashboard/Dashboard/','refresh');



		}else

		{

			$this->db->set('status',$masak);

			$this->db->where('id_order',$id);

			$this->db->update('order_detail');

			$this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Edit Status Berhasil </div>');

			redirect('dashboard/Dashboard/','refresh');

		}

	}

	function delete($id1)

	{

		$this->db->where('id_order_detail',$id1);

		$this->db->delete('order_detail');

		$this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Hapus Order Berhasil </div>');

		redirect('dashboard/Dashboard/','refresh');

		

	}



}

