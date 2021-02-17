<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tarif extends CI_Model {

	public function get_tarif()
	{
		return $this->db->get('tarif')->result();
	}
	public function create_tarif()
	{
		$daya = $this->input->post('daya');
		$harga = $this->input->post('harga');

		$object = array('daya' => $daya,
						'harga' => $harga 
		);

		return $this->db->insert('tarif', $object);

	}
	public function delete_tarif($a)
	{
		return $this->db->where('id_tarif',$a)->delete('tarif');
	}
	public function getByID($a)
	{
		return $this->db->where('id_tarif',$a)->get('tarif')->result();
	}
	public function updateData()
	{
		$id = $this->input->post('u_id');
		$daya = $this->input->post('daya');
		$harga = $this->input->post('harga');

		$object = array('daya' => $daya,
						'harga' => $harga 
		);

		return $this->db->where('id_tarif',$id)->update('tarif', $object);
	}

	

}

/* End of file M_Tarif.php */
/* Location: ./application/models/M_Tarif.php */