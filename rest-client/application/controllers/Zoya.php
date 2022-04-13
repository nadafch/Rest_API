<?php

class Zoya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Zoya_model');
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Merek Zoya';
        $data['zoya'] = $this->Zoya_model->getAllBarang();
        
        $this->load->view('templates/header', $data);
        $this->load->view('zoya/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Barang';

        $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required');

        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('zoya/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Zoya_model->tambahDataBarang();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('zoya');
        }
    }

    public function hapus($id)
    {
        $this->Zoya_model->hapusDataBarang($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('zoya');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Barang';
        $data['zoya'] = $this->Zoya_model->getBarangById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('zoya/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Barang';
        $data['zoya'] = $this->Zoya_model->getBarangById($id);


        $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required');

        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            //var_dump($this->form_validation->run());
            $this->load->view('templates/header', $data);
            $this->load->view('zoya/ubah',$data);
            $this->load->view('templates/footer');
        } else {
            $this->Zoya_model->ubahDataBarang();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('zoya');
        }
    }   
}
