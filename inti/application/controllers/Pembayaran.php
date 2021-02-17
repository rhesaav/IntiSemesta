<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Customer', 'customer');
		$this->load->model('M_Tagihan', 'tagihan');
		$this->load->model('M_Pembayaran', 'pembayaran');
	}

	public function index()
	{
		if ($this->session->userdata('login_pelanggan') == TRUE) {
			$id = $this->session->userdata('id_pelanggan');
			$data['page'] = "Pembayaran";
			$data['pelanggan'] = $this->customer->getByID($id);
			$data['show'] = $this->tagihan->get_tagihan_all();
			$this->load->view('template', $data);	
		}else{
			$this->session->set_flashdata('pesan', 'Anda Belum Login');
			redirect('customer/login','refresh');
		}
	}
	public function bukti()
	{
			$config['upload_path'] = './assets/bukti/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '10000';
			$config['max_width']  = '102400';
			$config['max_height']  = '76800';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti')){
				echo  $this->upload->display_errors();
				redirect('pembayaran','refresh');
			}
			else{
				$update=$this->pembayaran->update_pembayaran();
				if($update){
					redirect('pembayaran','refresh');
				} else {
					redirect('pembayaran','refresh');
				}
			}	
	}

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */