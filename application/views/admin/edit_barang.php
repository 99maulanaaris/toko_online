<div class="container-fluid">
    <h3><i class="fas fa-fw fa-edit"></i> EDIT DATA BARANG</h3>
    <?php foreach ($barang as $brg) : ?>
        <form action="<?= base_url('admin/data_barang/update') ?>" method="post">
            <div class="form-group">
                <label for="">Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control" value="<?= $brg['nama_brg']; ?>">
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <input type="hidden" name="id_brg" class="form-control" value="<?= $brg['id_brg']; ?>">
                <input type="text" name="keterangan" class="form-control" value="<?= $brg['keterangan']; ?>">
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?= $brg['kategori']; ?>">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga" class="form-control" value="<?= $brg['harga']; ?>">
            </div>
            <div class="form-group">
                <label for="">Stock</label>
                <input type="text" name="stock" class="form-control" value="<?= $brg['stock']; ?>">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
    <?php endforeach; ?>

</div>