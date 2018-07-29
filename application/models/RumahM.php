<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RumahM extends CI_Model {

    public function insert($data){
        return $this->db->insert('rumah', $data);    
    }

    public function tampilDataRumah()
	{
		$this->db->select('rumah.*, blok.nama_blok as nama_blok');
        $this->db->join('blok','blok.id_blok = rumah.id_blok','left');
        $data = $this->db->get('rumah');

        return $data->result();
	}
	public function tampilDataRumah3($id_rumah)
	{
		$this->db->select('rumah.*, blok.nama_blok as nama_blok');
		$this->db->from('rumah');
        $this->db->join('blok','blok.id_blok = rumah.id_blok');
        $this->db->where('rumah.id_rumah', $id_rumah);
        $data = $this->db->get()->row();

        return $data;
	}

	public function tampilDataRumah2()
	{
	
        $data = $this->db->query("SELECT * FROM rumah join blok using(id_blok)  left join penghuni y using(id_rumah) where y.id_penghuni is null");;

        return $data->result();
	}


	public function delete($id){
		return $this->db->delete('rumah', array('id_rumah'=>$id));	
	}

    public function dd_rumah(){
		// ambil data dari db
		$this->db->where('is_aktif is TRUE');
		$this->db->order_by('nama_rumah','asc');
		$result = $this->db->get('rumah');

		// membuat array
		$dd[''] = '-Pilih Rumah-';
		if($result->num_rows() > 0){
			foreach($result->result() as $row){
				$dd[$row->id] = $row->nama_rumah;
			}
		}
		return $dd;
	}
	public function cek_rumah($id,$no)
	{
		$this->db->select('*');
		$this->db->where("no_rumah ='$no' AND id_blok = '$id'");

		return $this->db->get('rumah');
	}
}

/* End of file RumahM.php */
/* Location: ./application/models/RumahM.php */