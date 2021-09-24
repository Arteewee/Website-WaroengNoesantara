<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('frontend/Frontend_model');

	}
	public function index()
	{
		$data['pengaturan'] =  $this->db->get('pengaturan')->row();
		$data['produk'] = $this->Frontend_model->join('produk','kategori','produk.id_kategori = kategori.id_kategori');
		$data['bestproduk'] = $this->Frontend_model->bestproduk();
		$data['cart'] = $this->cart->total_items();
		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer');

	}
	function helps()
		{
		$data['pengaturan'] =  $this->db->get('pengaturan')->row();
		$data['produk'] = $this->Frontend_model->join('produk','kategori','produk.id_kategori = kategori.id_kategori');
		$data['bestproduk'] = $this->Frontend_model->bestproduk();
		$data['cart'] = $this->cart->total_items();
		$this->load->view('header',$data);
		$this->load->view('help',$data);
		$this->load->view('footer');
	}

	function tambahcart()
	{
		$data_produk= array('id' => $this->input->post('id_produk'),
							 'name' => $this->input->post('nama'),
							 'price' => $this->input->post('harga'),
							 'qty' =>$this->input->post('qty'),
							 'gambar' => $this->input->post('gambar')
							);

		$data= $this->cart->insert($data_produk);
		echo json_encode($data);

		
	}	
	function loadcart()
	{
		$data = $this->cart->total_items();
		echo json_encode($data);
	}	

	

	function detail_produk($id)
	{
		$data['gambar'] = $this->db->get_where('gambar',['id_produk' =>$id])->result();
		
		$data['detail'] = $this->Frontend_model->getjoin('produk','kategori','produk.id_kategori = kategori.id_kategori','id_produk',$id);
		$data['pengaturan'] =  $this->db->get('pengaturan')->row();
		$data['cart'] = $this->cart->total_items();
		$this->load->view('header',$data);
		$this->load->view('detail_produk',$data);
		$this->load->view('footer');
	}
	function list_produk()
	{
		$jumlah_data = $this->Frontend_model->get_data('produk')->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'list-produk';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 9;
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';


		$from = $this->uri->segment(2);
		if($from==""){
			$from = 0;
		}
		$this->pagination->initialize($config);
		$data['list_produk'] = $this->db->query("SELECT * FROM produk,kategori WHERE produk.id_kategori = kategori.id_kategori ORDER BY produk.id_produk DESC LIMIT $config[per_page] OFFSET $from")->result();
		$data['kategori'] = $this->Frontend_model->get('kategori');
		$data['search'] = "<center>Produk tidak di temukan</center>";
		$data['pengaturan'] =  $this->db->get('pengaturan')->row();
		$data['cart'] = $this->cart->total_items();
		$this->load->view('header',$data);
		$this->load->view('list_produk',$data);
		$this->load->view('footer');
	}
	function cari()
	{
		 //mengambil nilai keyword dari form pencarian
		$cari = htmlentities((trim($this->input->post('cari',true)))? trim($this->input->post('cari',true)) : '');

     		//jika uri segmen 2 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 2
		$cari = ($this->uri->segment(2)) ? $this->uri->segment(2) : $cari;


		$jumlah_artikel = $this->db->query("SELECT * FROM produk,kategori WHERE  produk.id_kategori=kategori.id_kategori  AND (produk.nama_produk LIKE '%$cari%' OR produk.harga LIKE '%$cari%' OR produk.diskon LIKE '%$cari%' OR kategori.nama_kategori LIKE '%$cari%')")->num_rows();
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'cari/'.$cari;
		$config['total_rows'] = $jumlah_artikel;
		$config['per_page'] = 9;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';


		$from = $this->uri->segment(3);
		if($from==""){
			$from = 0;
		}
		$this->pagination->initialize($config);
		$data['cari'] = $cari;
		$data['search'] = "<center>Produk tidak di temukan</center>";
		$data['list_produk'] = $this->db->query("SELECT * FROM produk,kategori WHERE produk.id_kategori=kategori.id_kategori AND (produk.nama_produk LIKE '%$cari%' OR produk.harga LIKE '%$cari%' OR produk.diskon LIKE '%$cari%' OR kategori.nama_kategori LIKE '%$cari%') ORDER BY produk.id_produk DESC LIMIT $config[per_page] OFFSET $from")->result();
		$data['kategori'] = $this->Frontend_model->get('kategori');
		$data['pengaturan'] =  $this->db->get('pengaturan')->row();
		$data['cart'] = $this->cart->total_items();
		$this->load->view('header',$data);
		$this->load->view('list_produk',$data);
		$this->load->view('footer');
	}
		function cari_kategori($id)
	{	

		$jumlah_artikel =  $this->db->query("SELECT * FROM produk,kategori WHERE produk.id_kategori=kategori.id_kategori AND produk.id_kategori='$id'")->num_rows();

		$this->load->library('pagination');
		$config['base_url'] = base_url().'kategori/'.$id;
		$config['total_rows'] = $jumlah_artikel;
		$config['per_page'] = 9;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';


		$from = $this->uri->segment(3);
		if($from==""){
			$from = 0;
		}
		
		$this->pagination->initialize($config);
		$data['cari'] = $id;
		$data['search'] = "<center>Produk tidak di temukan</center>";
		$data['list_produk'] = $this->db->query("SELECT * FROM produk,kategori WHERE  produk.id_kategori=kategori.id_kategori AND produk.id_kategori='$id' ORDER BY produk.id_produk DESC LIMIT $config[per_page] OFFSET $from")->result();
		$data['kategori'] = $this->Frontend_model->get('kategori');
		$data['pengaturan'] =  $this->db->get('pengaturan')->row();
		$data['cart'] = $this->cart->total_items();
		$this->load->view('header',$data);
		$this->load->view('list_produk',$data);
		$this->load->view('footer');
	}
	function men_parfume()
	{
		 //mengambil nilai keyword dari form pencarian
		$cari = 'parfume pria';

     		//jika uri segmen 2 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 2
	


		$jumlah_artikel = $this->db->query("SELECT * FROM produk,kategori WHERE  produk.id_kategori=kategori.id_kategori  AND (produk.nama_produk LIKE '%$cari%' OR produk.harga LIKE '%$cari%' OR produk.diskon LIKE '%$cari%' OR kategori.nama_kategori LIKE '%$cari%')")->num_rows();
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'cari/'.$cari;
		$config['total_rows'] = $jumlah_artikel;
		$config['per_page'] = 9;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';


		$from = $this->uri->segment(1);
		if($from==""){
			$from = 0;
		}
		$this->pagination->initialize($config);
		$data['cari'] = $cari;
		$data['search'] = "<center>Produk tidak di temukan</center>";
		$data['list_produk'] = $this->db->query("SELECT * FROM produk,kategori WHERE produk.id_kategori=kategori.id_kategori AND (produk.nama_produk LIKE '%$cari%' OR produk.harga LIKE '%$cari%' OR produk.diskon LIKE '%$cari%' OR kategori.nama_kategori LIKE '%$cari%') ORDER BY produk.id_produk DESC LIMIT $config[per_page] OFFSET 0")->result();
		$data['kategori'] = $this->Frontend_model->get('kategori');
		$data['pengaturan'] =  $this->db->get('pengaturan')->row();
		$data['cart'] = $this->cart->total_items();
		$this->load->view('header',$data);
		$this->load->view('list_produk',$data);
		$this->load->view('footer');
	}
	function women_parfume()
	{
		 //mengambil nilai keyword dari form pencarian
		$cari = 'parfume wanita';

     		//jika uri segmen 2 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 2
	


		$jumlah_artikel = $this->db->query("SELECT * FROM produk,kategori WHERE  produk.id_kategori=kategori.id_kategori  AND (produk.nama_produk LIKE '%$cari%' OR produk.harga LIKE '%$cari%' OR produk.diskon LIKE '%$cari%' OR kategori.nama_kategori LIKE '%$cari%')")->num_rows();
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'cari/'.$cari;
		$config['total_rows'] = $jumlah_artikel;
		$config['per_page'] = 9;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';


		$from = $this->uri->segment(1);
		if($from==""){
			$from = 0;
		}
		$this->pagination->initialize($config);
		$data['cari'] = $cari;
		$data['search'] = "<center>Produk tidak di temukan</center>";
		$data['list_produk'] = $this->db->query("SELECT * FROM produk,kategori WHERE produk.id_kategori=kategori.id_kategori AND (produk.nama_produk LIKE '%$cari%' OR produk.harga LIKE '%$cari%' OR produk.diskon LIKE '%$cari%' OR kategori.nama_kategori LIKE '%$cari%') ORDER BY produk.id_produk DESC LIMIT $config[per_page] OFFSET 0")->result();
		$data['kategori'] = $this->Frontend_model->get('kategori');
		$data['pengaturan'] =  $this->db->get('pengaturan')->row();
		$data['cart'] = $this->cart->total_items();
		$this->load->view('header',$data);
		$this->load->view('list_produk',$data);
		$this->load->view('footer');
	}


}
