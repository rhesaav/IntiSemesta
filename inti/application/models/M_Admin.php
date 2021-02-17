<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	public function get_admin()
	{
		return $this->db->join('level','level.id_level = admin.id_level')->get('admin')->result();
	}
	public function create_admin()
	{
		$nama = $this->input->post('fullname');
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$level = $this->input->post('level');

		$object = array('nama_admin' => $nama,
						'username' => $username,
						'password' => $pass,
						'id_level' => $level
		);

		return $this->db->insert('admin', $object);

	}
	public function delete_admin($a)
	{
		return $this->db->where('id_admin',$a)->delete('admin');
	}
	public function getByID($a)
	{
		return $this->db->where('id_admin',$a)->get('admin')->result();
	}
	public function updateData()
	{
		$id = $this->input->post('u_id');
		$nama = $this->input->post('fullname');
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$level = $this->input->post('level');

		$object = array('nama_admin' => $nama,
						'username' => $username,
						'password' => $pass,
						'id_level' => $level
		);

		return $this->db->where('id_admin',$id)->update('admin', $object);
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		return $this->db->where('username' , $username)
						->where('password' , $password)
						->get('admin');
	}

}

/* End of file M_Admin.php */
/* Location: ./application/models/M_Admin.php */