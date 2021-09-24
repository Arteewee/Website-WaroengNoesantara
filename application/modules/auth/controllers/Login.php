<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}
	
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[7]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]');
		if ($this->form_validation->run() ==  FALSE) 
		{	
			
			
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('footer');
		} else 
		{
			$this->_login();
		}
		
	}
	private function _login()
	{
	
		$username = htmlspecialchars($this->input->post('username'));	
		$password = htmlspecialchars($this->input->post('password'));
		$login = $this->Auth_model->login($username,$password);
		$username_check = $this->Auth_model->username_check($username);
		if($username_check)
		{
			
			if($login)
			{
				if($this->session->userdata('penalty')){
					//jika sesson penalty bernilai true makan tidak akan bisa login
					$this->session->set_flashdata('password', "<small class='text-danger pl-3'>Anda Tidak dapat login selama 3menit</small>");
					
					$this->load->view('header');
					$this->load->view('index');
					$this->load->view('footer');
				}else
				{
					$this->session->unset_userdata('login');
					$getuser = $this->Auth_model->getid('username',$username,'akun');
					$data = ['username' => $username,
							 'level' =>  $getuser->level,
							 'nama' => $getuser->nama,
							 'last_login' => date('Y-m-d H:i:s')
					];
					$this->session->set_userdata($data);
					redirect('dashboard/Admin');
				}
			}else
			{			
				$session  = $this->session->userdata('login');
				$session++	;
				$this->session->set_userdata('login',$session);
				if($session > 3)
				{
					$this->session->set_flashdata('password', "<small class='text-danger pl-3'>Anda Tidak dapat login selama 3menit</small>");
					$this->session->set_tempdata('penalty', true, 20);//jika 3x salah password maka akan membuat sessason pelanty yang bernilai true selama 1800 detik
					$this->load->view('header');
					$this->load->view('index');
					$this->load->view('footer');	
					

				}else
				{
					$this->session->set_flashdata('password', "<small class='text-danger pl-3'>Password salah!!</small>");
					$this->load->view('header');
					$this->load->view('index');
					$this->load->view('footer');	
				}
			}
		}else
		{
			$this->session->set_flashdata('username', "<small class='text-danger pl-3'>Username.$username.tidak tersedia</small>");	
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('footer');
		}
		

	}
	
}
