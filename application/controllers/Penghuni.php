<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghuni extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->helper(array('url','html','form','download'));
		$this->load->library('form_validation');
		$this->load->library('session');      
        $this->load->model('PenghuniM');
        $this->load->model('AnggotaKeluargaM');
        $this->load->model('RumahM');
        
        if ($this->session->userdata('username')=="") {
			echo "<script>alert('Session telah habis!');
                    window.location.href='".base_url('login')."';
                </script>";
		}
		         $this->gallery_path = realpath(APPPATH . '../data/images/ktp/');
       	$this->gallery_path_url = base_url() . 'data/images/ktp/';
	}

	public function index($id=NULL)
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Data Penghuni';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'penghuni';
	 	
	 	$data['data'] 	= $this->PenghuniM->tampilDataPenghuni();
		$this->template->display('penghuni/admin',$data);
	}

	public function datapenghuni($id=NULL)
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Data Penghuni';
		$data['hirarki_menu'] 	= 'View ';
		$data['menu'] 			= 'Data Penghuni';
	 	
	 	$data['data'] 	= $this->PenghuniM->dataDiri( $this->session->userdata('id_penghuni'));
	 	$data['anggota'] 	= $this->PenghuniM->dataAnggota( $this->session->userdata('id_penghuni'));
		$this->template->display('penghuni/datadiri',$data);
	}

	public function vieworganisasi()
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Data Penghuni';
		$data['hirarki_menu'] 	= 'View ';
		$data['menu'] 			= 'organisasi';
	 	
	 	$data['rt'] 	= $this->PenghuniM->tampilDataRT();
	 	$data['rw'] 	= $this->PenghuniM->tampilDataRW();
		$this->template->display('penghuni/vieworganisasi',$data);
	}

		public function datapenghunilain($id=NULL)
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Data Penghuni Lain';
		$data['hirarki_menu'] 	= 'View ';
		$data['menu'] 			= 'Data Penghuni Lain';
	 	
	 	$data['data'] 	= $this->PenghuniM->dataPenghuniLain();
		$this->template->display('penghuni/datapenghunilain',$data);
	}

	public function tambah()
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Tambah Penghuni';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'penghuni';

		$data['rumah'] 			= $this->RumahM->tampilDataRumah2();
		$this->template->display('penghuni/tambah',$data);
	}

	public function insert()
	{
		$status = '';
		$status_detail_keluarga = 'berhasil';
		$message = '';

		$id_rumah = $this->input->post('id_rumah');
		$nama_pemilik = $this->input->post('nama_pemilik');

		$nama_penghuni = $this->input->post('nama_penghuni');
		$alamat_lengkap = $this->input->post('alamat_lengkap');
		$no_ktp = $this->input->post('no_ktp');
		$status_penghuni = $this->input->post('status_penghuni');
		$pekerjaan = $this->input->post('pekerjaan');
		$no_telepon = $this->input->post('no_telepon');
		
		$jeniskelamin = $this->input->post('jeniskelamin');
		$status_dikeluarga = $this->input->post('status_dikeluarga');
		$ktp 			= $this->input->post('ktp');
		$kk 			= $this->input->post('kk');
		$is_aktif  = true;

		$config['upload_path']    = $this->gallery_path;
     	$config['allowed_types']  = 'gif|jpg|png|jpeg|pdf|doc|txt|xml|zip|rar|docx|xls|xlsx';
     	$config['max_size']       = "50000000000000000";
     	$config['max_width']      = 2000;
     	$config['max_height']     = 2000;
     	$config['file_name']      = 'ktp-'.trim(str_replace(" ","",date('dmYHis')));

		$this->load->library('upload', $config);
 	 	$this->upload->initialize($config);


 		if ($this->upload->do_upload("ktp")){
 		$ktp = $this->upload->file_name;
		

		$config2['upload_path']    = $this->gallery_path;
     	$config2['allowed_types']  = 'gif|jpg|png|jpeg|pdf|doc|txt|xml|zip|rar|docx|xls|xlsx';
     	$config2['max_size']       = "50000000000000000"	;
     	$config2['max_width']      = "50000000000000000"	;
     	$config2['max_height']     = "50000000000000000"	;
     	$config2['file_name']      = 'kk-'.trim(str_replace(" ","",date('dmYHis')));


		$this->load->library('upload', $config2);
 	 	$this->upload->initialize($config2);

 		if ($this->upload->do_upload("kk")){
 		$kk = $this->upload->file_name;

		$anggota = $_POST['anggota'];
		$jml_anggota_keluarga = count($anggota);
		$object = array(
			'id_rumah'=>$id_rumah,
			'no_ktp'=>$no_ktp,
			'nama_penghuni'=>$nama_penghuni,
			'status_penghuni'=>$status_penghuni,
			'jeniskelamin'=>$jeniskelamin,
			'pekerjaan'=>$pekerjaan,
			'no_telepon'=>$no_telepon,
			'jml_anggota_keluarga'=>$jml_anggota_keluarga,
			'status_dikeluarga'=>$status_dikeluarga,
			'is_aktif'=>$is_aktif,
			'foto_ktp' => $ktp,
			'foto_kk' => $kk,
		);

		$insert = $this->PenghuniM->insert($object);
		
		if($insert){
			//update data rumah
		 
			$status = 'berhasil';
			if($status_dikeluarga != 'Lajang'){
            if(count($anggota) > 0){
                foreach($anggota as $i=>$data){
                    $this->db->from('penghuni');
                    $this->db->order_by("id_penghuni", "DESC");
                    $this->db->limit(1);
                    $data_penghuni = $this->db->get(); 
                    $data_penghuni = $data_penghuni->row();
                    $id_penghuni = isset($data_penghuni) ? $data_penghuni->id_penghuni : null;


	                


                    $nama = $data['nama'];
                    $no_ktp = $data['no_ktp'];
                    $jeniskelamin = $data['jeniskelamin'];
                    $tempat_lahir = $data['tempat_lahir'];
                    $tanggal_lahir = $data['tanggal_lahir'];
                    $tgl_lahir = explode('-',$tanggal_lahir);
                    $tanggal_lahir = $tgl_lahir[2].'-'.$tgl_lahir[1].'-'.$tgl_lahir[0];
                    $tanggal_lahir = $tanggal_lahir;
                    $status = $data['status'];

                    $object_detail_anggota = array(
                        'id_penghuni'=>$id_penghuni,
                        'nama'=>$nama,
                        'jeniskelamin'=>$jeniskelamin,
                        'status'=>$status,
                        'tempat_lahir'=>$tempat_lahir,
                        'tanggal_lahir'=>$tanggal_lahir,
                        'no_ktp'=>$no_ktp
                    );
                    $insert_detail_anggota = $this->AnggotaKeluargaM->insert($object_detail_anggota);
                    if($insert_detail_anggota){
                    	$status_detail_keluarga = 'berhasil';
                    }else{
                    	$status_detail_keluarga = 'gagal';
                    }
                }
            }
            }			
		}

		if($status == 'berhasil'){
			$message = array('message'=>'Data berhasil disimpan', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal disimpan', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		
		//echo $ktp;
 			}else{
			$message = array('message'=>'Data Scan KK Gagal Diunggah', 'class'=>'alert alert-danger fade in');
			$this->session->set_flashdata('item', $message);

		}
			}else{
			$message = array('message'=>'Data Scan KTP Gagal Diunggah', 'class'=>'alert alert-danger fade in');
			$this->session->set_flashdata('item', $message);

		}
 		redirect('penghuni');

	}

	public function hapus($id)
	{
		$message = '';

		$hapus = $this->PenghuniM->delete($id);
		
		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil dihapus', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal dihapus', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('Penghuni');
	}

	public function edit($id = null)
	{		
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');
        
		$data['judulHeader'] 	= 'Ubah Data Penghuni';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'penghuni';

		$data['editdata'] 		= $this->db->get_where('penghuni',array('id_penghuni'=>$id))->row();
		$id_rumah 				= isset($data['editdata']) ? $data['editdata']->id_rumah : null;
		$data['data_rumah']     = $this->db->get_where('rumah',array('id_rumah'=>$id_rumah))->row();
		$data['detail_anggota'] = $this->db->get_where('anggota_keluarga',array('id_penghuni'=>$id))->result_object();
		$data['rumah'] 			= $this->RumahM->tampilDataRumah();
		$this->template->display('penghuni/edit',$data);
	}

	public function update()
	{
		$message = '';
		$angg = $this->input->post('anggota');
		$id_penghuni = $this->input->post('id_penghuni');
		$id_rumah = $this->input->post('id_rumah');
		$nama_penghuni = $this->input->post('nama_penghuni');
		$no_ktp = $this->input->post('no_ktp');
		$status_penghuni = $this->input->post('status_penghuni');
		$status_dikeluarga = $this->input->post('status_dikeluarga');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$pekerjaan = $this->input->post('pekerjaan');
		$no_telepon = $this->input->post('no_telepon');
		$jml_anggota_keluarga = count($angg);
		$ktp 			= $this->input->post('ktp');
		$kk 			= $this->input->post('kk');
		$ktp_lama 			= $this->input->post('ktp_lama');
		$kk_lama			= $this->input->post('kk_lama');

		$config['upload_path']    = $this->gallery_path;
     	$config['allowed_types']  = 'gif|jpg|png|jpeg|pdf|doc|txt|xml|zip|rar|docx|xls|xlsx';
     	$config['max_size']       = "50000000000000000";
     	$config['max_width']      = "50000000000000000";
     	$config['max_height']     = "50000000000000000"	;
     	$config['file_name']      = 'ktp-'.trim(str_replace(" ","",date('dmYHis')));

		$this->load->library('upload', $config);
 	 	$this->upload->initialize($config);

 		if ($this->upload->do_upload("ktp")){
 			$ktp = $this->upload->file_name;
		
		}else{
			$ktp = $ktp_lama;
			

		}

		$config2['upload_path']    = $this->gallery_path;
     	$config2['allowed_types']  = 'gif|jpg|png|jpeg|pdf|doc|txt|xml|zip|rar|docx|xls|xlsx';
     	$config2['max_size']       = "50000000000000000"	;
     	$config2['max_width']      = "50000000000000000"	;
     	$config2['max_height']     = "50000000000000000"	;
     	$config2['file_name']      = 'kk-'.trim(str_replace(" ","",date('dmYHis')));


		$this->load->library('upload', $config2);
 	 	$this->upload->initialize($config2);

 		if ($this->upload->do_upload("kk")){
 		$kk = $this->upload->file_name;
 		}else{
			$kk = $kk_lama;

		}

		$object = array(
			'id_rumah'=>$id_rumah,
			'nama_penghuni'=>$nama_penghuni,
			'no_ktp'=>$no_ktp,
			'status_penghuni'=>$status_penghuni,
			'status_dikeluarga'=>$status_dikeluarga,
			'jeniskelamin'=>$jeniskelamin,
			'pekerjaan'=>$pekerjaan,
			'no_telepon'=>$no_telepon,
			'jml_anggota_keluarga' => $jml_anggota_keluarga,
			'foto_ktp' => $ktp,
			'foto_kk' => $kk
		);

		$this->db->where('id_penghuni', $id_penghuni);
		$this->db->update('penghuni', $object);
		//print_r($object);
		
		if($status_dikeluarga != 'Lajang'){
		foreach($angg as $key=>$val){


			$idangx = $angg[$key]['id_anggota'];
			//echo $idangx;

		$cek = $this->db->query("SELECT id_anggota FROM anggota_keluarga where id_anggota ='$idangx'");
			//echo $angg[$key]['id_anggota'];
		
		if($cek->num_rows() > 0){
			$this->db->where('id_anggota', $idangx);
			$this->db->update('anggota_keluarga', $angg[$key]);
		}else{
			 $tanggal_lahir = $data['tanggal_lahir'];
                    $tgl_lahir = explode('-',$angg[$key]['tanggal_lahir']);
                    $tanggal_lahir = $tgl_lahir[2].'-'.$tgl_lahir[1].'-'.$tgl_lahir[0];
                    $tanggal_lahir = $tanggal_lahir;
			$object_detail_anggota = array(
                        'id_penghuni'=>$id_penghuni,
                        'nama'=>$angg[$key]['nama'],
                        'jeniskelamin'=>$angg[$key]['jeniskelamin'],
                        'status'=>$angg[$key]['status'],
                        'tempat_lahir'=>$angg[$key]['tempat_lahir'],
                        'tanggal_lahir'=>$tanggal_lahir,
                        'no_ktp'=>$angg[$key]['no_ktp']
                    );
                    $insert_detail_anggota = $this->AnggotaKeluargaM->insert($object_detail_anggota);
		}
		}
		}
		//echo '<pre>'; print_r($angg); echo '</pre>';
		if($this->db->affected_rows() >= 0){
			$message = array('message'=>'Data berhasil diubah', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Error Data gagal diubah', 'class'=>'alert alert-danger fade in');
			$this->session->set_flashdata('item', $message);			
		}
		//$this->session->keep_flashdata('item',$message);
		
		
		redirect('Penghuni');
	}

	public function block_aktif($id)
	{
		$aksi 	= $this->input->get('aksi');
		$is_aktif = '';
		$message = '';

		if($aksi == 'aktif'){
			$is_aktif = true;
		}else{
			$is_aktif = false;
		}
		$object = array(
			'is_aktif'=>$is_aktif,
		);

		$this->db->where('id_penghuni', $id);
		$this->db->update('penghuni', $object);

		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil di-aktif/non-aktif kan', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal di-aktif/non-aktif kan', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('Penghuni');
	}

	public function setFormKeluarga(){
		$data['tr'] = '';
		$data['tr'] .= '<tr>';
		$data['tr'] .= '<td><input id="anggota_0_nama" name="anggota[0][nama]" type="text" class="form-control" required></td>';
		$data['tr'] .= '<td><input id="anggota_0_no_ktp" name="anggota[0][no_ktp]" type="text" class="form-control numbers-only"></td>';
		$data['tr'] .= '<td><select id="anggota_0_jeniskelamin" name="anggota[0][jeniskelamin]" class="form-control" required>
                                        <option value="">--Pilih--</option>
                                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                    </select></td>';
		$data['tr'] .= '<td><textarea id="anggota_0_tempat_lahir" name="anggota[0][tempat_lahir]" class="form-control"></textarea></td>';
		$data['tr'] .= '<td><input id="anggota_0_tanggal_lahir" name="anggota[0][tanggal_lahir]" type="text" class="form-control datepicker"></td>';
		$data['tr'] .= '<td><select id="anggota_0_status" name="anggota[0][status]" class="form-control" required>
                                        <option value="">--Pilih--</option>
                                        <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                        <option value="Anak">Anak</option>
                                        <option value="Kerabat">Kerabat</option>
                                    </select></td>';
		$data['tr'] .= '<td><a href="javascript:tambahKeluarga(this);"><button onclick="tambahKeluarga();" id="tambahKeluarga" type="button" class="btn btn-small btn-success"><i class="entypo-plus"></i></button></a> <br><br><a href="javascript:hapusKeluarga(this);"><button type="button" class="btn btn-small btn-danger" onClick="hapusKeluarga(this);"><i class="entypo-minus"></i></button></a></td>';
		$data['tr'] .= '</tr>';
		echo json_encode($data); 
		exit;
	}
}

/* End of file Penghuni.php */
/* Location: ./application/controllers/Penghuni.php */