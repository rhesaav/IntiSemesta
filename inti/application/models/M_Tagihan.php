<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tagihan extends CI_Model {

	public function get_tagihan($id)
	{
		return $this->db->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan')
						->where('id_pelanggan',$id)->get('tagihan')->result();
	}

	public function delete_tarif($a)
	{
		return $this->db->where('id_tarif',$a)->delete('tarif');
	}

	public function get_tagihan_all()
	 {
	 	return $this->db
			// ->join('pembayaran','pembayaran.id_tagihan=tagihan.id_tagihan')
			->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan')
			->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
			->join('tarif','tarif.id_tarif=pelanggan.id_tarif')
			->where('penggunaan.id_pelanggan',7)
			->order_by('tagihan.id_tagihan','desc')
			->get('tagihan')->result();
	 } 
	 public function cek_pembayaran($a)
	 {
		return $this->db
			->where('id_tagihan',$a)
			->get('pembayaran')->row();
	 }


}

/* End of file M_Tagihan.php */
/* Location: ./application/models/M_Tagihan.php */