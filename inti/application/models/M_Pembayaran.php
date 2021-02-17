<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pembayaran extends CI_Model {

	public function update_pembayaran()
	{
		$bayar = $this->db->where('id_tagihan',$this->input->post('id_tagihan'))
							->get('pembayaran');

		$tagihan = $this->db->where('id_tagihan',$this->input->post('id_tagihan'))
							 ->get('tagihan')->row();

		// $tarif = $this->db->where('id_tarif',$this->session->userdata('id_tarif'))->get('tarif')->row();
		$tarif = $this->db->where('id_tarif',4)->get('tarif')->row();

		$biaya_admin=2500;

		if($bayar->num_rows()>0){

			$data_bayar=$bayar->row();

			$data=array(
				'bukti' => $this->upload->data('file_name'),
				'status'=> 2
			);
			$az = $this->db->where('id_pembayaran',$data_bayar->id_pembayaran)->update('pembayaran',$data);
			if ($az) {
				$tag = array('status' => 2);
				return $this->db->where('id_tagihan',$this->input->post('id_tagihan'))->update('tagihan',$tag);
			}
			else{
				return FALSE;
			}

			

		} else {
			$data=array(
				'id_tagihan'=>$this->input->post('id_tagihan'),
				'tanggal'=>date('Y-m-d'),
				'bulan_bayar'=>$tagihan->bulan.'-'.$tagihan->tahun,
				'biaya_admin'=>$biaya_admin,
				'total_bayar'=>($biaya_admin+($tagihan->jumlah_meter+$tarif->harga)),
				'status'=> 2,
				'bukti'=>$this->upload->data('file_name'),
				'id_admin'=> 0
			);
			$ax = $this->db->insert('pembayaran',$data);

			if ($ax) {
				$tag = array('status' => 2);
				return $this->db->where('id_tagihan',$this->input->post('id_tagihan'))->update('tagihan',$tag);
			}
			else{
				return FALSE;
			}
			
		}
	}

	public function get_pembayaran()
	{
		return $this->db->select('*,pembayaran.status as status_bayar')
				->join('tagihan','tagihan.id_tagihan=pembayaran.id_tagihan')
				->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan')
				->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
				->join('tarif','tarif.id_tarif = pelanggan.id_tarif')
				->order_by('id_pembayaran','desc')
				->where('pembayaran.status',2)
				->get('pembayaran')->result();
	}

	public function verify($pembayaran,$tagihan,$status)
	{
		$arr = array('status'=>$status,'id_admin'=> 1);
		$az = $this->db->where('id_pembayaran',$pembayaran)->update('pembayaran',$arr);

			if ($az) {
				$tag = array('status' => 1);
				return $this->db->where('id_tagihan',$tagihan)->update('tagihan',$tag);
				return $this->db->where('id_pembayaran',$pembayaran)->update('pembayaran',$tag);
			}
			else{
				return FALSE;
			}
	}

}

/* End of file M_Pembayaran.php */
/* Location: ./application/models/M_Pembayaran.php */