<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryRumahM extends CI_Model {

    public function insert($data){
        return $this->db->insert('history_rumah', $data);    
    }

    public function tampilHistoryPenghuniRumah()
	{
		$this->db->select('history_rumah.*, rumah.nama_pemilik as nama_pemilik,blok.nama_blok as nama_blok, rumah.no_rumah as no_rumah');
        $this->db->join('rumah','rumah.id_rumah = history_rumah.id_rumah','left');
        $this->db->join('blok','blok.id_blok = rumah.id_blok','left');
        $data = $this->db->get('history_rumah');

        return $data->result();
	}


    public function tampilHistoryPenghuniRumah2()
	{
		$this->db->select('rumah.*, blok.nama_blok as nama_blok');
        $this->db->join('blok','blok.id_blok = rumah.id_blok','left');
        $data = $this->db->get('rumah');

        return $data->result();
	}
	public function delete($id){
        return $this->db->delete('history_rumah', array('id_penghuni_lama'=>$id));    
    }

	// public function tampilDataRT()
	// {
	// 	$this->db->select('*');
 //         $this->db->join('rumah','rumah.id_rumah = history_rumah.id_rumah');
 //        $this->db->join('blok','rumah.id_blok = blok.id_blok');
 //        $this->db->join('user_pemakai','history_rumah.id_penghuni_lama = user_pemakai.id_penghuni');
 //        $this->db->join('role','user_pemakai.id_role = role.id_role');
 //        $this->db->where("role.nama","RT");
 //        $data = $this->db->get('history_rumah');

 //        return $data->result();
	// }
	// public function tampilDataRW()
	// {
	// 	$this->db->select('*');
 //        $this->db->join('rumah','rumah.id_rumah = penghuni.id_rumah');
 //        $this->db->join('blok','rumah.id_blok = blok.id_blok');
 //        $this->db->join('user_pemakai','penghuni.id_penghuni = user_pemakai.id_penghuni');
 //        $this->db->join('role','user_pemakai.id_role = role.id_role');
 //        $this->db->where("role.nama","RW");
 //        $data = $this->db->get('penghuni');

 //        return $data->result();
	// }

	// public function dataDiri($id)
	// {
	// 	$this->db->select('*');
 //        $this->db->join('rumah','rumah.id_rumah = penghuni.id_rumah');
 //        $this->db->join('blok','rumah.id_blok = blok.id_blok');
 //        $data = $this->db->get_where('penghuni',array('penghuni.id_penghuni' => $id));

 //        return $data->result();
	// }	

	// public function dataPenghuniLain()
	// {
	// 	$id = $this->session->userdata('id_penghuni');
	// 	$this->db->select('*');
 //        $this->db->join('rumah','rumah.id_rumah = penghuni.id_rumah');
 //        $this->db->join('blok','rumah.id_blok = blok.id_blok');
 //        $this->db->where("penghuni.id_penghuni != '$id'");
 //        $data = $this->db->get('penghuni');
 //        return $data->result();
	// }	
	// public function dataAnggota($id)
	// {
	// 	$this->db->select('*');
 //        $this->db->join('anggota_keluarga','anggota_keluarga.id_penghuni = penghuni.id_penghuni');
 //        $data = $this->db->get_where('penghuni',array('penghuni.id_penghuni' => $id));

 //        return $data->result();
	// }

	// public function delete($id){
	// 	return $this->db->delete('penghuni', array('id'=>$id));	
	// }

 //    public function dd_penghuni(){
	// 	// ambil data dari db
	// 	$this->db->where('is_aktif is TRUE');
	// 	$this->db->order_by('nama_penghuni','asc');
	// 	$result = $this->db->get('penghuni');

	// 	// membuat array
	// 	$dd[''] = '-Pilih Penghuni-';
	// 	if($result->num_rows() > 0){
	// 		foreach($result->result() as $row){
	// 			$dd[$row->id] = $row->nama_penghuni;
	// 		}
	// 	}
	// 	return $dd;
	// }
}

/* End of file PenghuniM.php */
/* Location: ./application/models/PenghuniM.php */