<div class="container-fluid">
    <div class="row">
        <?= $this->session->flashdata('pesan'); ?>
    </div>
    <h4>Keranjang Belanja</h4>
    <table class="table table-bordered table-hover table-striped">
        <tr align="center">
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub Total</th>
        </tr>
        <?php $no = 1;
        foreach ($this->cart->contents() as $items) : ?>
            <tr>
                <td align="center"><?= $no++; ?></td>
                <td><?= $items['name']; ?></td>
                <td align="center"><?= $items['qty']; ?></td>
                <td align="right">Rp. <?= number_format($items['price'], 0, ',', '.'); ?></td>
                <td align="right">Rp. <?= number_format($items['subtotal'], 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4">
            <td align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
            </td>
        </tr>
    </table>
    <div align="right">
        <a href="<?= base_url('dashboard/hapus_keranjang'); ?> " class="btn btn-sm btn-danger"> Hapus Keranjang</a>
        <a href="<?= base_url('dashboard'); ?> " class="btn btn-sm btn-primary"> Lanjutkan Belanja</a>
        <a href="<?= base_url('dashboard/pembayaran'); ?> " class="btn btn-sm btn-success"> Pembayaran</a>
    </div>
</div>