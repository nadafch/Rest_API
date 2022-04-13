<?php

class Dannis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dannis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Merek Dannis';
        $data['dannis'] = $this->Dannis_model->getAllBarang();
        if ($this->input->post('keyword')) {
            $data['dannis'] = $this->Dannis_model->cariDataBarang();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('dannis/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Barang';

        $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required');

        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('dannis/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Dannis_model->tambahDataBarang();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('dannis');
        }
    }

    public function hapus($id)
    {
        $this->Dannis_model->hapusDataBarang($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('dannis');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Barang';
        $data['dannis'] = $this->Dannis_model->getBarangById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('dannis/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Barang';
        $data['dannis'] = $this->Dannis_model->getBarangById($id);

        $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required');

        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('dannis/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Dannis_model->ubahDataBarang();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('dannis');
        }
    }
}
