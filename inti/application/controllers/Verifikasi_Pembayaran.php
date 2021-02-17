<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi_Pembayaran extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Pembayaran','pembayaran');
	}
	public function index()
	{
		if($this->session->userdata('login_admin') == TRUE) {
			$data['page'] = "verifikasi_pembayaran";
			$data['show'] = $this->pembayaran->get_pembayaran();
			$this->load->view('template', $data);	
		}else{
			redirect('admin/login','refresh');
		}
	}
	public function ver($pembayaran,$tagihan,$status)
	{
		return $this->pembayaran->verify($pembayaran,$tagihan,$status);
	}

}

/* End of file Verifikasi_Pembayaran.php */
/* Location: ./application/controllers/Verifikasi_Pembayaran.php */