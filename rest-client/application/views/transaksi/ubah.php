<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Transaksi
                </div>
                <div class="card-body">
                    <form action="" method="post">
                    
                    <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" id="kode_barang" value="<?= $transaksi['kode_barang']; ?>">
                            <!-- <small class="form-text text-danger"><?= form_error('kode_barang'); ?></small> -->
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="<?= $transaksi['nama_barang'];?>">
                            <!-- <small class="form-text text-danger"><?= form_error('nama_barang'); ?></small> -->
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" id="harga" value="<?= $transaksi['harga'];?>">
                            <!-- <small class="form-text text-danger"><?= form_error('harga'); ?></small> -->
                        </div>
                    <!-- </fieldset> -->
                        <div class="form-group">
                            <label for="nama_pembeli">Nama Pembeli</label>
                            <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli" value="<?= $transaksi['nama_pembeli'];?>">
                            <small class="form-text text-danger"><?= form_error('nama_pembeli'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $transaksi['alamat'];?>">
                            <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No telp</label>
                            <input type="text" name="no_telp" class="form-control form-control-lg" id="no_telp" value="<?= $transaksi['no_telp'];?>">
                            <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" name="jumlah" class="form-control form-control-lg" id="jumlah" value="<?= $transaksi['jumlah'];?>">
                            <small class="form-text text-danger"><?= form_error('jumlah'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Total Bayar</label>
                            <input type="text" name="total_bayar" class="form-control form-control-lg" id="total_bayar" value="<?= $transaksi['total_bayar'];?>">
                            <small class="form-text text-danger"><?= form_error('total_bayar'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>