<?php
class Zoya_model extends CI_Model{

    public function getBarang($id = null){

        if ($id === null) {
            return $this->db->get('tb_barang')->result_array(); 
        }else {
            return $this->db->get_where('tb_barang',['kode_barang'=> $id])->result_array();
        }
    }

    public function deleteBarang($id){

        $this->db->delete('tb_barang',['kode_barang'=> $id]);
        return $this->db->affected_rows();
    }

    public function createBarang($data){
        $this->db->insert('tb_barang',$data);
        return $this->db->affected_rows();
    }

    public function updateBarang($data,$id){
        $this->db->update('tb_barang',$data,['kode_barang' => $id]);
        return $this->db->affected_rows();
    }
}

?>