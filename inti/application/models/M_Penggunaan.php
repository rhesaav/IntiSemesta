<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Penggunaan extends CI_Model {

	public function get_penggunaan($id)
	{
		return $this->db->where('id_pelanggan',$id)->get('penggunaan')->result();
	}

	public function create_penggunaan()
	{
		$id_pelanggan = $this->input->post('id_pelanggan');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$metwal = $this->input->post('metwal');
		$methir = $this->input->post('methir');

		$object = array('id_pelanggan' => $id_pelanggan,
						'bulan' => $bulan, 
						'tahun' => $tahun,
						'meter_awal' => $metwal,
						'meter_akhir' => $methir,
		);

		$ins_peng = $this->db->insert('penggunaan', $object);

		if ($ins_peng) {
			$penggunaan = $this->db->where('id_pelanggan',$id_pelanggan)
								   ->order_by('id_penggunaan','desc')
								   ->limit(1)
								   ->get('penggunaan')
								   ->row();
			$tagihan_arr = array('id_penggunaan' => $penggunaan->id_penggunaan, 
								 'bulan' => $bulan,
								 'tahun' => $tahun,
								 'jumlah_meter' => $methir - $metwal,
								 'status' => 0
			);
			return $this->db->insert('tagihan', $tagihan_arr);
		}
		else{
			echo "GAGAL";
		}

	}
	public function delete_tarif($a)
	{
		return $this->db->where('id_tarif',$a)->delete('tarif');
	}

	

}

/* End of file M_Penggunaan.php */
/* Location: ./application/models/M_Penggunaan.php */