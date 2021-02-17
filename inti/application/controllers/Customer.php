<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Tarif', 'tarif');
		$this->load->model('M_Customer', 'customer');
	}
	public function index()
	{
		if ($this->session->userdata('login_admin') == TRUE) {

			$data['page'] = "Customer";
			$data['show'] = $this->customer->get_customer();
			$data['daya'] = $this->tarif->get_tarif();
			$this->load->view('template', $data);	

		}else{
			redirect('admin/login','refresh');
		}
	}
	public function create()
	{
		if ($this->customer->create_customer()) {
			redirect('customer','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function delete($a)
	{
		if ($this->customer->delete_customer($a)) {
			redirect('customer','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function updateCustomer()
	{
		if ($this->customer->updateData()) {
			redirect('customer','refresh');
		}
		else{
			echo "GAGAL";
		}
	}
	public function show_data($a)
	{
		$data = $this->customer->getByID($a);
		if ($data) {
			echo json_encode($data);
		}
		else{
			return false;
		}
	}
	public function getByID($a)
	{
		return $this->db->where('id_pelanggan',$a)->get('pelanggan')->result_array();
	}

	public function login()
	{
		if ($this->session->userdata('login_pelanggan') == FALSE) {
				$this->load->view('customer_login');
			}else{
				redirect('home','refresh');
			}
	}
	public function login_cust()
	{
		
		if ($this->customer->login()->num_rows()>0) {
				$data = $this->customer->login()->row();
				// $sel = $this->db->where('id_admin',$data->id_admin)->join('level','level.id_level=admin.id_level')->get('admin')->row();

				$array = array(
					'login_pelanggan' => TRUE ,
					'id_pelanggan' => $data->id_pelanggan,
					'nama' => $data->nama,
					);
				
				$this->session->set_userdata( $array );
				redirect('home','refresh');
			}
			else{
				$this->session->set_flashdata('pesan', 'Username atau Password Salah');
				redirect('customer/login','refresh');
			}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('customer/login','refresh');
	}

}

/* End of file customer.php */
/* Location: ./application/controllers/customer.php */