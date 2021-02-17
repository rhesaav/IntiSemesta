<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_level', 'level');
	}

	public function index()
	{
		$data['page'] = "Level";
		$data['show'] = $this->level->get_level();
		$this->load->view('template', $data);
	}
	public function create()
	{
		if ($this->level->create_level()) {
			redirect('level','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function delete($a)
	{
		if ($this->level->delete_level($a)) {
			redirect('level','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function updatelevel()
	{
		if ($this->level->updateData()) {
			redirect('level','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function show_data($a)
	{
		$data = $this->level->getByID($a);
		if ($data) {
			echo json_encode($data);
		}
		else{
			return false;
		}
	}

}

/* End of file Level.php */
/* Location: ./application/controllers/Level.php */