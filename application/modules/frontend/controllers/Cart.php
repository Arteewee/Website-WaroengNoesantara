<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Cart extends MY_Controller {



	function __construct(){

		parent::__construct();

		$this->load->model('frontend/Frontend_model');



	}



	public function index()

	{

		$data['pengaturan'] =  $this->db->get('pengaturan')->row();

		$data['cart'] = $this->cart->total_items();

		$this->load->view('header',$data);

		$this->load->view('cart',$data);

		$this->load->view('footer');



	}

	public function remove()

	{

		$hapus = $this->cart->destroy();

		echo json_encode($hapus);

	}
	

	public function hapus()

	{

		$hapus1 = $this->cart->delete();

		echo json_encode($hapus1);

	}

	// public function hapus()

	// {/

	// 	$hapusmenu = $this->cart->delete();

	// 	echo json_encode($hapusmenu);

	// }

	
	public function updatee()

	{

		$cart_info = $_POST['cart'] ;

		foreach( $cart_info as $id => $cart)

		{

			$rowid = $cart['rowid'];

			$qty = $cart['qty'];

			$data = array('rowid' => $rowid,

							'qty' => $qty);

			$this->cart->update($data);

		}

		redirect('cart','refresh');

	}

	public function delete1($rowid)
	{
		//$del1 = $this->cart->remove($rowid);
		//echo json_encode($del1);
		$this->cart->remove($rowid);
		redirect('cart','refresh');
	}

	public function cekout()

	{

		$provinces = $this->rajaongkir->province(); // output json

	    $data['provinsi']= json_decode($provinces);
	 

		if($this->cart->total() == '0'){

			redirect('list-produk','refresh');

		}else

		{

		$data['pembayaran'] = $this->Frontend_model->get('pembayaran');

		$data['pengaturan'] =  $this->db->get('pengaturan')->row();

		$data['cart'] = $this->cart->total_items();

		$this->load->view('header',$data);

		$this->load->view('cekout',$data);

		$this->load->view('footer');	

		}

		

	}

	public function kota()

	{

	 $kota_id = $this->input->post('id',TRUE);	

	 $cities = $this->rajaongkir->city($kota_id);//output json 

	 $data= json_decode($cities);

	 $test = [] ;	 

	 



	 foreach ($data->rajaongkir->results as $key ) {

	 	 array_push($test,$key);

	 }

	 echo json_encode($test);

	}

	public function ongkir()

	{		

	$origin = $this->db->get_where('pengaturan',['id_pengaturan' => 1])->row()->kota_id;

	$destination = $this->input->post('id',TRUE);

	$weight = "200";

	$courier = $this->input->post('id_kurir',TRUE);



	$ongkir = $this->rajaongkir->cost($origin, $destination, "350", $courier);

	$data = json_decode($ongkir);



	$isi= $data->rajaongkir->results[0]->costs[0]->cost[0]->value;

	$hari = $data->rajaongkir->results[0]->costs[0]->cost[0]->etd;

	

	$variable = array('etd' => $hari,

					   'isi' => $isi



						 );	

	echo json_encode($variable);

	}

}

