<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MY_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('username')=== null){
			$this->session->set_flashdata('message','<div class ="alert alert-danger text-center" role = "alert">Harap Login Terlebih Dahulu! </div>');
			redirect('auth/Auth','refresh');
		}
		$this->load->model('dashboard/Dashboard_model');

	}
	public function index()
	{
		$data['kategori'] = $this->Dashboard_model->get('kategori');
		$data['nama'] = $this->session->userdata('username');
		$data['nama1'] = $this->session->userdata('nama');
		$this->load->view('header',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('kategori_produk',$data);
		$this->load->view('footer',$data);
	}
	function delete($id)
	{
	$idt = "id_kategori";
	$this->Dashboard_model->delete($idt,$id,'kategori');
	redirect('dashboard/Kategori','refresh');
	}
	function tambah()
	{
		$this->form_validation->set_rules('nama_kategori', 'Kategori', 'trim|required|min_length[2]');
		if ($this->form_validation->run() == FALSE)
		{

		$data['nama'] = $this->session->userdata('username');
		$data['nama1'] = $this->session->userdata('nama');
		$this->load->view('header');
		$this->load->view('sidebar',$data);
		$this->load->view('tambah_kategori_produk',$data);
		$this->load->view('footer');
		}else
		{
			$kategori['nama_kategori'] = $this->input->post('nama_kategori');
			
			$this->Dashboard_model->insert('kategori',$kategori);
			 $this->session->set_flashdata('message', '<div class="alert alert-success text-left"  role="alert" >Berhasil Menambah Kategori </div>');
		    redirect('dashboard/kategori');
		}
	}
	function edit($id)
	{
		$idtbl = "id_kategori";
			$this->form_validation->set_rules('nama_kategori', 'Kategori', 'trim|required|min_length[2]');
		if ($this->form_validation->run() == FALSE)
		{
		
		$data['nama'] = $this->session->userdata('username');
		$data['nama1'] = $this->session->userdata('nama');
		$data['kategori'] =$this->Dashboard_model->getid($idtbl,$id,'kategori');
		$this->load->view('header');
		$this->load->view('sidebar',$data);
		$this->load->view('edit_kategori_produk',$data);
		$this->load->view('footer');
		}else
		{
			$kategori['nama_kategori'] = $this->input->post('nama_kategori');
			$id = $this->input->post('id_kategori');
			$this->Dashboard_model->update($kategori,$idtbl,$id,'kategori');
			 $this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Berhasil Mengubah Kategori </div>');
		    redirect('dashboard/kategori');
		}
	}

}
