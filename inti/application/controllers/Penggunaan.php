<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggunaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Tarif', 'tarif');
		$this->load->model('M_Customer', 'customer');
		$this->load->model('M_Penggunaan', 'penggunaan');
	}
	public function index()
	{
		if ($this->session->userdata('login_admin') == TRUE) {
			$data['page'] = "Penggunaan";
			$data['show'] = $this->customer->get_customer();
			$data['daya'] = $this->tarif->get_tarif();
			$this->load->view('template', $data);	
		}else{
			redirect('admin/login','refresh');
		}
	}
	public function create()
	{
		if ($this->penggunaan->create_penggunaan()) {
			redirect('penggunaan','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function detail($id_pelanggan)
	{
		$data['page'] = "Detail_Penggunaan";
		$data['pelanggan'] = $this->customer->getByID($id_pelanggan);
		$data['show'] = $this->penggunaan->get_penggunaan($id_pelanggan);
		$this->load->view('template', $data);
	}
	public function delete($a)
	{
		if ($this->tarif->delete_penggunaan($a)) {
			redirect('penggunaan','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
}

/* End of file Penggunaan.php */
/* Location: ./application/controllers/Penggunaan.php */