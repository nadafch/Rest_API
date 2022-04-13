<?php

use GuzzleHttp\Client;

class Zoya_model extends CI_model
{
    private $_client;
    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/uas-praksister-rest-api/rest-server-zoya/api/',
            'auth' => ['admin','1234'],
        ]);
    }

    public function getAllBarang()
    {

        $response = $this->_client ->request('GET', 'zoya',[
            'query'=>[
                'kunci' => 'asekasek'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(),true);

        return $result['data'];
    }

    public function tambahDataBarang()
    {   
        $data = [
            "kode_barang" => $this->input->post('kode_barang', true),
            "nama_barang" => $this->input->post('nama_barang', true),
            "harga" => $this->input->post('harga', true),
            "jenis" => $this->input->post('jenis', true),
            "gambar" => $this->input->post('gambar', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "kunci" => 'asekasek'
        ];

        $response = $this->_client ->request('POST', 'zoya',[
            'form_params'=> $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
    }

    public function hapusDataBarang($id)
    {
        $response = $this->_client ->request('DELETE', 'zoya',[
            'form_params'=>[
                'kunci' => 'asekasek',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(),true);

    }

    public function getBarangById($id)
    {

        $response = $this->_client ->request('GET', 'zoya',[
            'auth' => ['admin','1234'],
            'query'=>[
                'kunci' => 'asekasek',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(),true);

        return $result['data'][0];
    }

    public function ubahDataBarang()
    {
        $data = [
            "id" => $this->input->post('kode_barang', true),
            "nama_barang" => $this->input->post('nama_barang', true),
            "harga" => $this->input->post('harga', true),
            "jenis" => $this->input->post('jenis', true),
            "gambar" => $this->input->post('gambar', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "kunci" => 'asekasek'
        ];

        $response = $this->_client ->request('PUT', 'zoya',[
            'form_params'=> $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
    }
    
    public function createPembeli(){
        $data = [
            		"kode_barang" => $this->input->post('kode_barang', true),
            		"nama_barang" => $this->input->post('nama_barang', true),
            		"nama_pembeli" => $this->input->post('nama_pembeli', true),
                    "alamat" => $this->input->post('alamat', true),
                    "no_telp" => $this->input->post('no_telp', true)
                    
            	];
        $this->db->insert('tb_pembelian',$data);
    }
}
