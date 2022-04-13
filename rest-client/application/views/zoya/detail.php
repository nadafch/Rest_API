<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Barang
                </div>
                <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                            <img src="<?= $zoya['gambar']; ?>" class="img-fluid">
                            </div>
                                <div class="col-md-8">
                                    <ul class="list-group">
                                    <li class="list-group-item">Kode Barang : <?= $zoya['kode_barang']; ?></li>
                                    <li class="list-group-item"><h3><?= $zoya['nama_barang'];?></h3></li>
                                    <li class="list-group-item">Harga : <?= $zoya['harga']; ?></li>
                                    <li class="list-group-item">Jenis : <?= $zoya['jenis']; ?></li>
                                    <li class="list-group-item">Deskripsi : <?= $zoya['deskripsi']; ?></li>
                                    <a href="<?= base_url(); ?>zoya" class="btn btn-primary">Kembali</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

