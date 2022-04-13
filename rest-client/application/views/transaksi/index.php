<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
        <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data transaksi <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-9">
            <h3>Daftar transaksi</h3>
            <?php if (empty($transaksi)) : ?>
                <div class="alert alert-danger" role="alert">
                    data transaksi tidak ditemukan.
                </div>
            <?php endif; ?>
            <!-- <ul class="list-group"> -->
                
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">id transaksi</th>
                        <th scope="col">kode barang</th>
                        <th scope="col">nama pembeli</th>
                        <th scope="col">Total bayar</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <?php foreach ($transaksi as $trs) : ?>
                    <tbody>
                        <tr>
                        <td> <?= $trs['id_transaksi']; ?></td>
                        <td><?= $trs['kode_barang']; ?></td>
                        <td><?= $trs['nama_pembeli']; ?></td>
                        <td><?= $trs['total_bayar']; ?></td>
                        <td>
                        <!-- <li class="list-group-item">                       -->
                        <a href="<?= base_url(); ?>transaksi/hapus/<?= $trs['id_transaksi']; ?>" class="badge badge-danger float-right tombol-hapus">hapus</a>
                        <!-- <a href="<?= base_url(); ?>transaksi/ubah/<?= $trs['id_transaksi']; ?>" class="badge badge-success float-right">ubah</a>
                        <a href="<?= base_url(); ?>transaksi/detail/<?= $trs['id_transaksi']; ?>" class="badge badge-primary float-right">detail</a> -->
                        <!-- </li> -->
                        </td>
                        </tr>
                        <tr>
                    </tbody>
                    <?php endforeach; ?>
                    </table>
                
               
            <!-- </ul> -->
        </div>
    </div>

</div>