<?php 
function potongteks($teks,$jumlah_karakter){
	$karakter = $teks{$jumlah_karakter-1};
	while($karakter != ' '){
		$karakter = $teks{--$jumlah_karakter};
	}
	return substr($teks, 0, $jumlah_karakter);
}
?>
<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
        <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Barang <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>zoya/tambah" class="btn btn-primary">Tambah
                Data Barang</a>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Barang</h3>
            <div class="row row-cols-1 row-cols-md-2">
                <?php foreach ($zoya as $zy) : ?>
                    <div class="col-md-6">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= $zy['gambar']; ?>" class="card-img-top" style="width:100%; height:20vw;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $zy['nama_barang'];?> </h5>
                            <?php $hasil_potong = potongteks($zy['deskripsi'],50); ?>                    
                            <p class="card-text"><?= $hasil_potong;?>...</p>
                            <a href="<?= base_url(); ?>zoya/hapus/<?= $zy['kode_barang']; ?>" class="badge badge-danger float-right tombol-hapus">hapus</a>
                            <a href="<?= base_url(); ?>zoya/ubah/<?= $zy['kode_barang']; ?>" class="badge badge-success float-right">ubah</a>
                            <a href="<?= base_url(); ?>zoya/detail/<?= $zy['kode_barang']; ?>" class="badge badge-primary float-right">detail</a>
                            <a href="<?= base_url(); ?>transaksi/beli/<?= $zy['kode_barang']; ?>" class="badge badge-warning float-right">input pembelian</a>
                        </div>
                    </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>