<?php

class transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Zoya_model');
        $this->load->model('Transaksi_model');
        $this->load->model('Dannis_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Daftar Transaksi Barang';
        $data['transaksi'] = $this->Transaksi_model->getTransaksi();
        
        $this->load->view('templates/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
    }
    public function beli($id)
    {
        $data['judul'] = 'Form Ubah Data Barang';
        $data['zoya'] = $this->Zoya_model->getBarangById($id);
        

        $this->form_validation->set_rules('nama_pembeli', 'Nama_pembeli', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'numeric');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'numeric');
        $this->form_validation->set_rules('total_bayar', 'Total_bayar', 'numeric');
       
        if ($this->form_validation->run() == false) {
            //var_dump($this->form_validation->run());
            $this->load->view('templates/header', $data);
            $this->load->view('transaksi/beli');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'harga' => $this->input->post('harga'),
                'nama_pembeli' => $this->input->post('nama_pembeli'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'jumlah' => $this->input->post('jumlah'),
                'total_bayar' => $this->input->post('total_bayar')
                
            ];
            $this->Transaksi_model->tambahDataTransaksi($data);
            $this->session->set_flashdata('flash', 'transaksi');
            redirect('transaksi');
        }
    }
    public function hapus($id)
    {
        $this->Transaksi_model->deleteTransaksi($id);
        $this->session->set_flashdata('flash', 'Transaksi Dihapus');
        redirect('transaksi');
    }

    //danniss-----------------------------------------------------------------------------------------------------------------
    public function beli_dannis($id)
    {
        $data['judul'] = 'Form Ubah Data Barang';
        $data['dannis'] = $this->Dannis_model->getBarangById($id);
        

        $this->form_validation->set_rules('nama_pembeli', 'Nama_pembeli', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'numeric');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'numeric');
       
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('transaksi/beli_dannis');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'harga' => $this->input->post('harga'),
                'nama_pembeli' => $this->input->post('nama_pembeli'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'jumlah' => $this->input->post('jumlah'),
                'total_bayar' => $this->input->post('total_bayar')
                
            ];
            $this->Transaksi_model->tambahDataTransaksi($data);
            $this->session->set_flashdata('flash', 'transaksi');
            redirect('transaksi');
        }
    }
}
