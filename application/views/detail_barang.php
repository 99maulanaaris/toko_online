<div class="container-fluid">
    <div class="card ">
        <h5 class="card-header text-dark">Detail Produk</h5>
        <div class="card-body">
            <?php
            foreach ($barang as $brg) : ?>
                <div class="row ">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/') . $brg['gambar']; ?>" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama Produk</td>
                                <td><strong><?= $brg['nama_brg']; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td><strong><?= $brg['keterangan']; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><strong><?= $brg['kategori']; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Stock</td>
                                <td><strong><?= $brg['stock']; ?></strong></td>
                            </tr>
                            <tr>
                                <td>harga</td>
                                <td><strong>
                                        <div class="btn btn-sm btn-success">Rp. <?= number_format($brg['harga'], 0, ',', '.'); ?></div>
                                    </strong></td>
                            </tr>
                        </table>
                        <?= anchor('dashboard/', '<div class="btn btn-danger btn-sm">Kembali</div>'); ?>
                        <?= anchor('dashboard/tambah_ke_keranjang/' . $brg['id_brg'], '<div class="btn btn-primary btn-sm">Tambah Kekeranjang</i></div>'); ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>