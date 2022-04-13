<?php

use GuzzleHttp\Client;

class Transaksi_model extends CI_model
{
      public function getTransaksi(){

        //if ($id === null) {
            return $this->db->get('tb_transaksi')->result_array(); 
        // }else {
        //     return $this->db->get_where('tb_transaksi',['id_transaksi'=> $id])->result_array();
        // }
    }
    public function getTransaksibyId($id){

        //if ($id === null) {
        //  return $this->db->get('tb_transaksi')->result_array(); 
        // }else {
            $response= $this->db->get_where('tb_transaksi',['id_transaksi'=> $id])->result_array();
        // }
        $result = json_encode($response);
        return $result;
        
    }

    public function deleteTransaksi($id){

        $this->db->delete('tb_transaksi',['id_transaksi'=> $id]);
        return $this->db->affected_rows();
    }
    
    public function tambahDataTransaksi($data){
        $this->db->insert('tb_transaksi',$data);
        return $this->db->affected_rows();
    }

    public function updateTransaksi($data,$id){
        $this->db->update('tb_transaksi',$data,['id_transaksi' => $id]);
        return $this->db->affected_rows();
    }

}

?>

