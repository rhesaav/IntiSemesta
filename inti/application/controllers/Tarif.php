<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Tarif', 'tarif');
	}

	public function index()
	{
		if ($this->session->userdata('login_admin') == TRUE) {
			$data['page'] = "Tarif";
			$data['show'] = $this->tarif->get_tarif();
			$this->load->view('template', $data);
		}else{
			redirect('admin/login','refresh');
		}
		
	}
	public function create()
	{
		if ($this->tarif->create_tarif()) {
			redirect('tarif','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function delete($a)
	{
		if ($this->tarif->delete_tarif($a)) {
			redirect('tarif','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function updateTarif()
	{
		if ($this->tarif->updateData()) {
			redirect('tarif','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function show_data($a)
	{
		$data = $this->tarif->getByID($a);
		if ($data) {
			echo json_encode($data);
		}
		else{
			return false;
		}
	}

}

/* End of file tarif.php */
/* Location: ./application/controllers/tarif.php */