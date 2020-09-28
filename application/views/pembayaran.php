<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success mb-3">
                <?php $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo '<h5>Total Belanjaan anda : Rp. ' . number_format($grand_total, 0, ',', '.');

                ?>
            </div>
            <h4>Input Alamat Pengiriman dan Pembayaran</h4>
            <form action="<?= base_url('dashboard/proses_pesanan'); ?>" method="post">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="" placeholder="Nama Lengkap Anda..." class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <input type="text" name="alamat" id="" placeholder="Alamat Lengkap Anda..." class="form-control">
                </div>
                <div class="form-group">
                    <label for="no_tlp">No Telepon</label>
                    <input type="text" name="no_tlp" id="" placeholder="No Telepon Anda..." class="form-control">
                </div>
                <div class="form-group">
                    <label for="no_tlp">Jasa Pengiriman</label>
                    <select name="" id="" class="form-control">
                        <option value="">JNE</option>
                        <option value="">TIKI</option>
                        <option value="">POS Indonesia</option>
                        <option value="">Gojek</option>
                        <option value="">Grab</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="no_tlp">Pilih Bank</label>
                    <select name="" id="" class="form-control">
                        <option value="">BCA - xxxxxxx</option>
                        <option value="">BNI - xxxxxxx</option>
                        <option value="">BRI - xxxxxxx</option>
                        <option value="">Mandiri - xxxxxxx</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Pesan</button>

            </form>
        <?php
                } else {
                    echo '<h4>Anda Belum Membuat Pesanan';
                }
        ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>