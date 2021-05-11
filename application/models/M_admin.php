<?php
class M_admin extends CI_model {
    public function selectAlladmin($id){
        $sql='SELECT * FROM tb_admin JOIN tb_bidang ON tb_admin.admin_bidang = tb_bidang.bidang_id WHERE admin_id!=?';
        return $this->db->query($sql, $id)->result_array();
    }



    public function get_pengguna($v_id){
        return $this->db->get_where('tb_admin',  ['admin_id' => $v_id])->row_array();
    }

    public function create_admin ($v_data)
    {
        $this->db->insert('tb_admin', $v_data);
        return $this->db->affected_rows();
    }



    public function auth($v_username, $v_password, $v_idbidang){
        $sql='SELECT * FROM tb_admin where admin_username=? AND admin_password=? AND admin_bidang=?';
        return $this->db->query($sql, array($v_username,$v_password,$v_idbidang))->row_array();
    }

    public function selectIdAdmin($v_username){
        return $this->db->get_where('tb_admin',  ['admin_username' => $v_username])->row_array();
    }


    public function hapus_admin($v_id) {
        $this->db->where('admin_id', $v_id);
        $this->db->delete('tb_admin');
    }


    public function cek_username($username, $id){
        $sql='SELECT * FROM tb_admin where admin_username = ? AND admin_id != ?';
         return $this->db->query($sql, array($username,$id))->row_array();
    }
    
    public function edit_admin($id, $data){     
        $this->db->update('tb_admin', $data, array('admin_id' => $id));
    }


}