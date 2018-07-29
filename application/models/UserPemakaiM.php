<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPemakaiM extends CI_Model {
    
    public function cek_user($data) {     

        $this->db->where($data);
        $query = $this->db->get('user_pemakai');
        return $query;
    }

    public function cek_user_login($data) {     

        $this->db->select('user_pemakai.*, role.id_role as id_role, role.nama as nama_role');
        $this->db->where($data);
        $this->db->join('role', 'role.id_role = user_pemakai.id_role','left');
        $query = $this->db->get('user_pemakai');
        return $query;
    }
    
    public function cek_data($username) {
        $this->db->where("username", $username);
        $query = $this->db->get("user_pemakai");
        return $query->row_array();
    }

    public function insert($data){
        return $this->db->insert('user_pemakai', $data);    
    }

    public function tampilDataUser($num, $offset, $username)
    {
        $this->db->order_by('username', 'ASC');
        if($username != ''){
            $this->db->like('username', $username);
        }
        $data = $this->db->get('user_pemakai', $num, $offset);

        return $data->result();
    }

    public function delete($id){
        return $this->db->delete('user_pemakai', array('id_user_pemakai'=>$id));    
    }

    public function tampilDataUserPemakai()
    {
        $this->db->select('user_pemakai.*,penghuni.nama_penghuni as nama_penghuni, role.nama as nama_role');
        $this->db->join('role','role.id_role = user_pemakai.id_role','left');
        $this->db->join('penghuni','penghuni.id_penghuni = user_pemakai.id_penghuni');
        $data = $this->db->get('user_pemakai');

        return $data->result();
    }
}

/* End of file UserPemakaiM.php */
/* Location: ./application/models/UserPemakaiM.php */