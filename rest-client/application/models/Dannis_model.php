<?php

use GuzzleHttp\Client;

class Dannis_model extends CI_model
{
    private $_client;
    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/uas-praksister-rest-api/rest-server-dannis/api/',
            'auth' => ['admin','1234'],
        ]);
    }

    public function getAllBarang()
    {

        $response = $this->_client ->request('GET', 'dannis',[
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

        $response = $this->_client ->request('POST', 'dannis',[
            'form_params'=> $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
    }

    public function hapusDataBarang($id)
    {
        $response = $this->_client ->request('DELETE', 'dannis',[
            'form_params'=>[
                'kunci' => 'asekasek',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(),true);

    }

    public function getBarangById($id)
    {

        $response = $this->_client ->request('GET', 'dannis',[
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

        $response = $this->_client ->request('PUT', 'dannis',[
            'form_params'=> $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
    }

    public function cariDataBarang()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_barang', $keyword);
        $this->db->or_like('jenis_barang', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('gambar', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        return $this->db->get('tb_barang')->result_array();
    }
}
