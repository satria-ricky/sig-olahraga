<?php
class M_bulu_tangkis extends CI_model {

    public function select_status(){
      return $this->db->get('tb_status')->result_array();
    }

    public function select_bulu_tangkis(){
        $sql='SELECT * FROM tb_bt';
        return $query=$this->db->query($sql)->result_array(); 
    }

    public function total_bt(){
        $sql='SELECT * FROM tb_bt';
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
        
    }




    public function create_bt($v_data)
    {
        $this->db->insert('tb_bt', $v_data);
        return $this->db->affected_rows();
    }


}