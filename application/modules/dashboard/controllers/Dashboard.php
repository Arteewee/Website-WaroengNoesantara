<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	 function __construct(){
		parent::__construct();
		if($this->session->userdata('username')=== null){
			$this->session->set_flashdata('message','<div class ="alert alert-danger text-center" role = "alert">Harap Login Terlebih Dahulu! </div>');
			redirect('auth/Auth','refresh');
		}
		$this->load->model('Dashboard_model');
			
	}

	
	public function index()
	{
		$data['invoice'] = $this->Dashboard_model->invoice();
		$data['nama'] = $this->session->userdata('username');
		$data['nama1'] = $this->session->userdata('nama');
		$this->load->view('header');
		$this->load->view('sidebar',$data);
		$this->load->view('index');
		$this->load->view('footer');

	}
	public function produk()
	{
		$data['nama'] = $this->session->userdata('username');
		$data['nama1'] = $this->session->userdata('nama');
		$data['produk'] = $this->Dashboard_model->join('produk','kategori','kategori.id_kategori = produk.id_kategori','left');
		$this->load->view('header');
		$this->load->view('sidebar',$data);
		$this->load->view('produk',$data);
		$this->load->view('footer');
	}
	public function help()
	{
		$data['nama'] = $this->session->userdata('username');
		$data['nama1'] = $this->session->userdata('nama');
		$this->load->view('header');
		$this->load->view('sidebar',$data);
		$this->load->view('help',$data);
		$this->load->view('footer');
	}
	public function delete_produk($id1)
	{
	$getimgr= $this->db->get_where('gambar',['id_produk'=> $id1]);//menghitung jumlah kolom
	$getimg= $this->db->get_where('gambar',['id_produk'=> $id1])->result_array();//mendapat array gambar dari db

    if($getimg != null)
    {	
    $num = $getimgr->num_rows();
    $gambar = array_column($getimg,'gambar');	
	    for ($i=0;$i<$num;$i++)
	    {
	    	$path[$i] = 'assets/gambar/frontend/'.$gambar[$i];
	           
	    }
	  array_map('unlink', $path);
	}
	$getsampul= $this->db->get_where('produk',['id_produk'=> $id1])->row()->gambar;
    $pathsampul = 'assets/gambar/frontend/'.$getsampul;
    unlink($pathsampul);
	$idt="id_produk";
	$this->Dashboard_model->delete($idt,$id1,'produk');
	$this->Dashboard_model->delete($idt,$id1,'gambar');
	redirect('dashboard/produk','refresh');
	}
	public function edit_produk($id='')
	{
		$this->form_validation->set_rules('nama_produk', 'Nama', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('diskon', 'Diskon', 'trim|required');	
		$this->form_validation->set_rules('jumlah', 'Stock', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');	
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');	
		$idtbl = "id_produk";	
		$id_produk = $this->input->post('id_produk');
			if($this->form_validation->run() == false)
			{			
				
				$data['nama'] = $this->session->userdata('username');
				$data['nama1'] = $this->session->userdata('nama');
				$data['edit'] = $this->Dashboard_model->getid($idtbl,$id,'produk');
				$data['kategori'] = $this->Dashboard_model->get('kategori');

				$this->load->view('header');
				$this->load->view('sidebar',$data);
				$this->load->view('edit_produk',$data);
				$this->load->view('footer');
			}else
			{

				        $config['upload_path']          = 'assets/gambar/frontend/';
		                $config['allowed_types']        = 'gif|jpg|png|jpeg';
		               	

		                $this->load->library('upload', $config);

		                if ( empty($this->upload->data('')['file_name']) AND ! $this->upload->do_upload('gambar'))
		                {
		                    $nama_produk = $this->input->post('nama_produk');
		                    $kategori = $this->input->post('kategori');
		                    $harga = $this->input->post('harga');
		                    $diskon = $this->input->post('diskon');
		                    $jumlah = $this->input->post('jumlah');
		                    $tanggal = $this->input->post('tanggal');
		                    $deskripsi = $this->input->post('deskripsi');
		                    
		                    $data =  array('nama_produk' => $nama_produk,
		                    				'id_kategori' => $kategori,
		                    				'harga' => $harga,
		                    				'diskon' => $diskon,
		                    				'jumlah' => $jumlah,
		                    				'tanggal' => $tanggal,
		                    				'deskripsi' => $deskripsi
		                    			   );
		                    $this->Dashboard_model->update($data,$idtbl,$id_produk,'produk');
							$this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Berhasil Memperbaharui Produk </div>');
						    redirect('dashboard/produk');
		                }
		                else
		                {
		             
		                	$getimg= $this->db->get_where('produk',['id_produk'=> $id_produk])->row()->gambar;
		                	$path = 'assets/gambar/frontend/'.$getimg;
                			unlink($path);
		                    $nama_produk = $this->input->post('nama_produk');
		                    $kategori = $this->input->post('kategori');
		                    $harga = $this->input->post('harga');
		                    $diskon = $this->input->post('diskon');
		                    $jumlah = $this->input->post('jumlah');
		                    $tanggal = $this->input->post('tanggal');
		                    $deskripsi = $this->input->post('deskripsi');
						    $gambar = $this->upload->data('')['file_name'];
						    $data =  array('nama_produk' => $nama_produk,
		                    				'id_kategori' => $kategori,
		                    				'harga' => $harga,
		                    				'diskon' => $diskon,
		                    				'jumlah' => $jumlah,
		                    				'tanggal' => $tanggal,
		                    				'deskripsi' => $deskripsi,
		                    				'gambar' => $gambar
		                    			   );
								
							$this->Dashboard_model->update($data,$idtbl,$id_produk,'produk');
							$this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Perbarui  Akun Berhasil </div>');
						    redirect('dashboard/produk');
		                	
		                }
			}


	}

	public function tambah_produk()
	{
		$this->form_validation->set_rules('nama_produk', 'Nama', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('diskon', 'Diskon', 'trim|required');	
		$this->form_validation->set_rules('jumlah', 'Stock', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');	
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');	
		if($this->form_validation->run() == false)
		{
			$data['nama'] = $this->session->userdata('username');
			$data['nama1'] = $this->session->userdata('nama');
			$data['kategori'] = $this->Dashboard_model->get('kategori');
			$this->load->view('header');
			$this->load->view('sidebar',$data);
			$this->load->view('tambah_produk',$data);
			$this->load->view('footer');
		}else
		{
			 $config['upload_path']          = 'assets/gambar/frontend/';
		     $config['allowed_types']        = 'gif|jpg|png|jpeg';
		    
		     $this->load->library('upload', $config);
		     if ($this->upload->do_upload('gambar'))
		     {
		     $nama_produk = $this->input->post('nama_produk');
		     $kategori = $this->input->post('kategori');
		     $harga = $this->input->post('harga');
		     $diskon = $this->input->post('diskon');
		     $jumlah = $this->input->post('jumlah');
		     $tanggal = $this->input->post('tanggal');
		    
		     $deskripsi = $this->input->post('deskripsi');
		     $gambar = $this->upload->data();
		     $img = $gambar['file_name'];
		     
		     
			 $data =  array('nama_produk' => $nama_produk,
		                    'id_kategori' => $kategori,
		                    'harga' => $harga,
		                    'diskon' => $diskon,
		                    'jumlah' => $jumlah,
		                    'tanggal' => $tanggal,
		                    'deskripsi' => $deskripsi,
		                    'gambar' => $img
		                   );
			$this->Dashboard_model->insert('produk',$data);
		    $this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Berhasil Menambah Produk</div>');
		    redirect('dashboard/produk');
		}else
		{
			$data['nama'] = $this->session->userdata('username');
			$data['nama1'] = $this->session->userdata('nama');
			$data['kategori'] = $this->Dashboard_model->get('kategori');
			$this->load->view('header');
			$this->load->view('sidebar',$data);
			$this->load->view('tambah_produk',$data);
			$this->load->view('footer');
		}


		}

	}
	public function gambar_produk($id)
	{
		$data['nama'] = $this->session->userdata('username');
		$data['nama1'] = $this->session->userdata('nama');
		$this->load->view('header');
		$this->load->view('sidebar',$data);
		$this->load->view('add_gambar_produk',$data);
		$this->load->view('footer');
	}
	function gambar_produk1()
	{
		$jumlahData = count($_FILES['gambar']['name']);
		
	

		// Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
		for ($i=0; $i < $jumlahData ; $i++):

			// Inisialisasi Nama,Tipe,Dll.
			$_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
			$_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
			$_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
			$_FILES['file']['size']     = $_FILES['gambar']['size'][$i];

			// Konfigurasi Upload
			$config['upload_path']          = 'assets/gambar/frontend/';
			$config['allowed_types']        = 'gif|jpg|png|pdf';

			// Memanggil Library Upload dan Setting Konfigurasi
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('file')){ // Jika Berhasil Upload

				$fileData = $this->upload->data();
				 // Lakukan Upload Data
				$uploadData[$i]['gambar'] = $fileData['file_name'];
				$uploadData[$i]['id_produk'] = $this->input->post('id_produk');

			}else
			{
				echo "gagal";
			}

		endfor; // Penutup For
		$this->Dashboard_model->insert_batch('gambar',$uploadData);
		$this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Berhasil Menambah Gambar</div>');
		redirect('dashboard/produk');
		                	
	}
	function pengaturan()
	{
		$this->form_validation->set_rules('nama_web', 'Nama', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('kontak', 'Harga', 'trim|required');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
		$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	
		if($this->form_validation->run() == false)
		{
			$provinces = $this->rajaongkir->province(); // output json
			$data['provinsi']= json_decode($provinces);
			$data['nama'] = $this->session->userdata('username');
			$data['nama1'] = $this->session->userdata('nama');
			$data['pembayaran'] = $this->Dashboard_model->get('pembayaran');
			$this->load->view('header');
			$this->load->view('sidebar',$data);
			$this->load->view('pengaturan',$data);
			$this->load->view('footer');	
		}else{
		$result = $this->input->post('provinsi');
        $result_explode = explode('|', $result);
		$provinsi = $result_explode[1];
		$provinsi_id = $result_explode[0];
		$result1 = $this->input->post('kota');
        $result_explode1 = explode('|', $result1);
        $kota= $result_explode1[1];
			$data = array('nama_toko' => $this->input->post('nama_web'),
						  'kontak' => $this->input->post('kontak'),
						  'provinsi_toko' => $provinsi,
						  'provinsi_id' => $provinsi_id,
						  'kota_toko' => $kota,
						  'kota_id' => $this->input->post('kota')

			 );
			$this->db->set($data);
			$this->db->where('id_pengaturan','1');
			$this->db->update('pengaturan');
			$this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Edit Pengaturan Berhasil</div>');
			redirect('dashboard/Dashboard/pengaturan','refresh');

		}
	}
	function tambah_rekening()
	{
		$this->form_validation->set_rules('atm', 'Nama', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('nama_atm', 'Harga', 'trim|required');
		$this->form_validation->set_rules('no_rekening', 'Harga', 'trim|required');
	
		if($this->form_validation->run() == false)
		{
			$data['nama'] = $this->session->userdata('username');
			$data['nama1'] = $this->session->userdata('nama');
			$data['pembayaran'] = $this->Dashboard_model->get('pembayaran');
			$this->load->view('header');
			$this->load->view('sidebar',$data);
			$this->load->view('tambah_rekening',$data);
			$this->load->view('footer');	
		}else{
			$data =   array('atm' => $this->input->post('atm'),
							'nama_atm' => $this->input->post('nama_atm'),
							'no_rekening' => $this->input->post('no_rekening')

				 );
			$this->Dashboard_model->insert('pembayaran',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Berhasil Menambah rekening</div>');
			redirect('dashboard/Dashboard/pengaturan','refresh');


		}
	}
	function delete_pembayaran($id1)
	{
		$this->db->where('id_pembayaran',$id1);
		$this->db->delete('pembayaran');
		$this->session->set_flashdata('message', '<div class="alert alert-success"  role="alert" >Berhasil Menghapus ATM</div>');
		redirect('dashboard/Dashboard/penngaturan','refresh');
		
	}
	

	public function logout()
	{
		$this->_destroy();
	}
	private function _destroy()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('last_login');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('message','<div class ="alert alert-success text-center" role = "alert">Logout Berhasil</div>');
		redirect('auth/Auth','refresh');
	}
}