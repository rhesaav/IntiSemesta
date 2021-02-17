<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Admin', 'admin');
		$this->load->model('M_Level', 'level');
	}

	public function index()
	{
		if ($this->session->userdata('login_admin') == TRUE) {

			$data['page'] = "Admin";
			$data['show'] = $this->admin->get_admin();
			$data['level'] = $this->level->get_level();
			$this->load->view('template', $data);
			
		}else{
			redirect('admin/login','refresh');
		}
	}
	public function create()
	{
		if ($this->admin->create_admin()) {
			redirect('admin','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function delete($a)
	{
		if ($this->admin->delete_admin($a)) {
			redirect('admin','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function updateadmin()
	{
		if ($this->admin->updateData()) {
			redirect('admin','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function show_data($a)
	{
		$data = $this->admin->getByID($a);
		if ($data) {
			echo json_encode($data);
		}
		else{
			return false;
		}
	}
	public function login()
	{
		if ($this->session->userdata('login_admin') == FALSE) {
				$this->load->view('admin_login');
			echo $this->session->userdata('login_admin');
		}else{
				redirect('home','refresh');
				echo $this->session->userdata('login_admin');
		}
	}
	public function login_admin()
	{
		
		if ($this->admin->login()->num_rows()>0) {
				$data = $this->admin->login()->row();
				$sel = $this->db->where('id_admin',$data->id_admin)->join('level','level.id_level=admin.id_level')->get('admin')->row();

				$array = array(
					'login_admin' => TRUE ,
					'id_admin' => $data->id_admin,
					'nama_admin' => $data->nama_admin,
					'nama_level' => $sel->nama_level,
					);
				
				$this->session->set_userdata( $array );
				redirect('home','refresh');
			}
			else{
				$this->session->set_flashdata('pesan', 'Username atau Password Salah');
				redirect('admin/login','refresh');
			}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login','refresh');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */