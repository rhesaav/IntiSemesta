<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Customer', 'customer');
		$this->load->model('M_Tagihan', 'tagihan');
	}

	public function detail($id_pelanggan)
	{
		if ($this->session->userdata('login_admin') == TRUE) {
			$data['page'] = "Detail_Tagihan";
			$data['pelanggan'] = $this->customer->getByID($id_pelanggan);
			$data['show'] = $this->tagihan->get_tagihan($id_pelanggan);
			$this->load->view('template', $data);
		}else{
			redirect('admin/login','refresh');
		}
	}
	public function delete($a)
	{
		if ($this->tarif->delete_tagihan($a)) {
			redirect('tagihan','refresh');
		}
		else{
			echo "GAGAL";
		}
	}

}

/* End of file Tagihan.php */
/* Location: ./application/controllers/Tagihan.php */