<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Level extends CI_Model {

	public function get_level()
	{
		return $this->db->get('level')->result();
	}
	public function create_level()
	{
		$nama = $this->input->post('nama');

		$object = array('nama_level' => $nama);

		return $this->db->insert('level', $object);

	}
	public function delete_level($a)
	{
		return $this->db->where('id_level',$a)->delete('level');
	}
	public function getByID($a)
	{
		return $this->db->where('id_level',$a)->get('level')->result();
	}
	public function updateData()
	{
		$id = $this->input->post('u_id');
		$nama = $this->input->post('nama');

		$object = array('nama_level' => $nama);

		return $this->db->where('id_level',$id)->update('level', $object);
	}

	

}


/* End of file M_Level.php */
/* Location: ./application/models/M_Level.php */