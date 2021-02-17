<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Customer extends CI_Model {

	public function get_customer()
	{
		return $this->db->join('tarif', 'tarif.id_tarif=pelanggan.id_tarif')->get('pelanggan')->result();
	}
	public function create_customer()
	{
		$no_meter = $this->input->post('meter');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$alamat = $this->input->post('alamat');
		$daya = $this->input->post('daya');

		$object = array('no_meter' => $daya,
						'nama' => $nama,
						'email' => $email,
						'username' => $username,
						'password' => $password,
						'alamat' => $alamat,
						'id_tarif' => $daya
		);

		return $this->db->insert('pelanggan', $object);

	}	
	public function delete_customer($a)
	{
		return $this->db->where('id_pelanggan',$a)->delete('pelanggan');
	}
	public function getByID($a)
	{
		return $this->db->where('id_pelanggan',$a)->get('pelanggan')->result();
	}
	public function updateData()
	{
		$id = $this->input->post('u_id');
		$no_meter = $this->input->post('meter');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$alamat = $this->input->post('alamat');
		$daya = $this->input->post('daya');

		$object = array('no_meter' => $daya,
						'nama' => $nama,
						'email' => $email,
						'username' => $username,
						'password' => $password,
						'alamat' => $alamat,
						'id_tarif' => $daya
		);

		return $this->db->where('id_pelanggan',$id)->update('pelanggan', $object);
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		return $this->db->where('username' , $username)
						->where('password' , $password)
						->get('pelanggan');
	}

}

/* End of file M_Customer.php */
/* Location: ./application/models/M_Customer.php */