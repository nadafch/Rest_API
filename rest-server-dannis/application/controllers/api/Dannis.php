<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Dannis extends REST_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dannis_model','dannis');
		// $this->methods['index_get']['limit'] = 500; // 2 requests per hour per user/key
		// $this->methods['index_delete']['limit'] = 500; // 2 requests per hour per user/key
	}

	public function index_get(){
		$id = $this->get('id');

		if ($id === null) {
			$dannis = $this->dannis->getBarang(); 
		} else {
			$dannis = $this->dannis->getBarang($id);
		}

		if ($dannis) {
			$this->response([
				'status' => TRUE,
				'data' => $dannis
			], REST_Controller::HTTP_OK);	
		}else {
			$this->response([
				'status' => FALSE,
				'message' => "Barang tidak ditemukan"
			], REST_Controller::HTTP_NOT_FOUND);
	
		}
	}
	public function index_delete()
	{
		$id = $this->delete('id');

		if ($id === null) {
			$this->response([
				'status' => FALSE,
				'message' => "id tidak dimasukkan"
			], REST_Controller::HTTP_BAD_REQUEST);
		}else {
			if ($this->dannis->deleteBarang($id)>0) {
				//sukses
				$this->response([
					'status' => TRUE,
					'kode_barang' => $id,
					'message' => 'data dihapus!'
				], REST_Controller::HTTP_OK);
			}else {
				//id tidak ada
				$this->response([
					'status' => FALSE,
					'message' => "id tidak ditemukan"
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		}

	}

	public function index_post()
	{
		$data = [
			'kode_barang' => $this->post('kode_barang'),
			'nama_barang' => $this->post('nama_barang'),
			'harga' => $this->post('harga'),
			'jenis' => $this->post('jenis'),
			'gambar' => $this->post('gambar'),
			'deskripsi' => $this->post('deskripsi')
			
		];

		if ($this->dannis->createBarang($data)>0) {
			$this->response([
				'status' => TRUE,
				'message' => 'Data berhasil ditambahkan!'
			], REST_Controller::HTTP_CREATED);
		}
		else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data gagal ditambahkan!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put(){
		$id = $this->put('id');

		$data = [
			'nama_barang' => $this->put('nama_barang'),
			'harga' => $this->put('harga'),
			'jenis' => $this->put('jenis'),
			'gambar' => $this->put('gambar'),
			'deskripsi' => $this->put('deskripsi')
			
		];

		if ($this->dannis->updateBarang($data,$id)>0) {
			$this->response([
				'status' => TRUE,
				'message' => 'Data berhasil diupdate!'
			], REST_Controller::HTTP_OK);
		}
		else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data gagal diupdate!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}

?>