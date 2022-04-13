<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Transaksi
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $transaksi['id_transaksi']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $transaksi['kode_barang']; ?></h6>
                    <p class="card-text"><?= $transaksi['nama_barang']; ?></p>
                    <p class="card-text"><?= $transaksi['jumlah']; ?></p>
                    <p class="card-text"><?= $transaksi['total_bayar']; ?></p>
                    <a href="<?= base_url(); ?>transaksi" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>