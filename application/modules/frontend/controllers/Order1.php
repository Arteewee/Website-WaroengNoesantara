<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Order extends MY_Controller {



	function __construct(){

		parent::__construct();

		$this->load->model('frontend/Frontend_model');



	}

	public function index()

	{

	
	
	
	$this->form_validation->set_rules('meja', 'Meja', 'trim|required');

	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');




		if($this->form_validation->run() == false)

		{		

			

				if($this->cart->total() == '0'){

					redirect('list-produk','refresh');

				}else

				{



				$data['pengaturan'] =  $this->db->get('pengaturan')->row();

				$data['cart'] = $this->cart->total_items();

				$this->load->view('header',$data);

				$this->load->view('cekout',$data);

				$this->load->view('footer');	

				}

		

		}else{


		//-------------------------Input data pelanggan--------------------------

		$data_pelanggan =  array('meja' => $this->input->post('meja'),
								 'nama_lengkap' => $this->input->post('nama'),'no_hp' => $this->input->post('nomor')

								

							);

		$id_pelanggan = $this->Frontend_model->insert_pelanggan($data_pelanggan);

		//-------------------------Input data order------------------------------

		$data_order = array('tanggal' => date('Y-m-d'),

					   		'id_pelanggan' => $id_pelanggan);

		$id_order = $this->Frontend_model->insert_order($data_order);

		//-------------------------Input data detail order-----------------------

		if ($cart = $this->cart->contents())

		{

			foreach ($cart as $item ) 

			{

				$data_detail  =  array('id_order' =>$id_order ,

										'produk' =>$item['name'],

										'qty' => $item['qty'],

										'harga' => $item['price'],

										'total_pembayaran'=> $item['subtotal'],

										'catatan' => $this->input->post('catatan'),

										'status' => 'pending',

							);

			 $this->Frontend_model->insert('order_detail',$data_detail);

		    }

			
	

        // Tampilkan pesan sukses atau error
   
			
			$this->cart->destroy();
			$data['pengaturan'] =  $this->db->get('pengaturan')->row();

			$this->session->set_flashdata('message','Harap tunggu, pesanan anda akan segera di buat dan pelayan akan mengantarkan pesanan ke meja anda.');
			$this->session->set_flashdata('message1','id order anda adalah : '.$id_order);
	 
			 $data['cart'] = $this->cart->total_items();
	 
			 $this->load->view('header',$data);
	 
			 $this->load->view('konfirmasi_pembayaran',$data);
	 
			 $this->load->view('footer');
	 
			 
          
       
    


	   }

	}

   }
   
   
   public function index_OLD()

	{

	
	
	
	$this->form_validation->set_rules('meja', 'Meja', 'trim|required');

	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');




		if($this->form_validation->run() == false)

		{		

			

				if($this->cart->total() == '0'){

					redirect('list-produk','refresh');

				}else

				{



				$data['pengaturan'] =  $this->db->get('pengaturan')->row();

				$data['cart'] = $this->cart->total_items();

				$this->load->view('header',$data);

				$this->load->view('cekout',$data);

				$this->load->view('footer');	

				}

		

		}else{


		//-------------------------Input data pelanggan--------------------------

		$data_pelanggan =  array('meja' => $this->input->post('meja'),
								 'nama_lengkap' => $this->input->post('nama'),

								

							);

		$id_pelanggan = $this->Frontend_model->insert_pelanggan($data_pelanggan);

		//-------------------------Input data order------------------------------

		$data_order = array('tanggal' => date('Y-m-d'),

					   		'id_pelanggan' => $id_pelanggan);

		$id_order = $this->Frontend_model->insert_order($data_order);

		//-------------------------Input data detail order-----------------------

		if ($cart = $this->cart->contents())

		{

			foreach ($cart as $item ) 

			{

				$data_detail  =  array('id_order' =>$id_order ,

										'produk' =>$item['name'],

										'qty' => $item['qty'],

										'harga' => $item['price'],

										'total_pembayaran'=> $item['subtotal'],

										'catatan' => $this->input->post('catatan'),

										'status' => 'pending',

							);

			 $this->Frontend_model->insert('order_detail',$data_detail);

		    }

			
		// Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => '#',  // Email gmail
            'smtp_pass'   => '#',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('pemesan'.$this->input->post('nama'));

        // Email penerima
        $this->email->to('#'); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject('Pesanan no: '.$id_order.' atas nama : '.$this->input->post('nama').' Meja : '.$this->input->post('meja'));
		$nama = '';
		foreach($cart as $item){
			
			$nama .= $item['name'].' '.$item['qty'].',';
			
		}
		$message = 'Pesanan :'.$nama.'<br>'.'Catatan : '.$this->input->post('catatan').'<br>'.'total pembayaran : '.$this->cart->total();
        // Isi email
        $this->email->message($message);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
			
			$this->cart->destroy();
			$data['pengaturan'] =  $this->db->get('pengaturan')->row();

			$this->session->set_flashdata('message','Harap tunggu pelayan akan ke meja anda untuk konfirmasi id order anda adalah :'.$id_order);
	 
			 $data['cart'] = $this->cart->total_items();
	 
			 $this->load->view('header',$data);
	 
			 $this->load->view('konfirmasi_pembayaran',$data);
	 
			 $this->load->view('footer');
	 
			 
          
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    


	   }

	}

   }



	

}

