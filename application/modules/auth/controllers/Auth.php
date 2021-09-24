<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	function __construct(){
		parent::__construct();
		

	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');

	}
	// public function register()
	// {
	// 	$this->load->view('header');
	// 	$this->load->view('register');
	// 	$this->load->view('footer');		
	// }
	public function registerdb()
	{
		$username = $this->input->get('username');
		$password = sha1($this->input->get('password'));
		$sql="INSERT INTO pengguna (username, password)VALUES('$_POST[username]','$_POST[password]')";
		redirect('dashboard/index','refresh');
		
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));
		$cekpw= $this->db->get_where('pengguna',['password' => $password,'username'=> $username]);
		$getuser = $this->db->get_where('pengguna',['username'=>$username])->row_array();
		if($cekpw->num_rows() > 0 )
		{
			$data = ['nama'=> $getuser['nama'],
					 'username' => $getuser['username'],
					 'level' => $getuser['level'],
					 'last_login'=>date('Y-m-d H:i:s')
					];
			$this->session->set_userdata($data);
			$this->db->where('username',$username);
            $this->db->update('pengguna', array('last_login'=> date('Y-m-d H:i:s')));
			redirect('dashboard/Dashboard','refresh');
		}else
		{
			$this->session->set_flashdata('message','<div class ="alert alert-danger" role = "alert">Password salah !! </div>');
            redirect('auth/Auth','refresh');
		}
	}

}