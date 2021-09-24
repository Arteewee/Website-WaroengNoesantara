<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
	}
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('index');
		$this->load->view('footer');;
	}
	public function logout()
	{
		$data = ['username' => $this->session->userdata('username'),
				'level' =>  $this->session->userdata('level'),
				'nama' =>  $this->session->userdata('nama'),
				'last_login' => date('Y-m-d H:i:s')
				];
		$this->Dashboard_model->update($data,'username',$this->session->userdata('username'),'akun');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('username');
		redirect('auth/Login');
	}
}
