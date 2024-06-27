<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

    <?= $this->include('layout/breadcrumbs'); ?>

    <div class="row d-flex justify-content-center align-items-center my-5">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="d-flex justify-content-start align-items-center mt-5 mb-3 mx-4">
                    <h3 class="card-title"><strong>Keranjang belanja <i class="fa-solid fa-cart-plus fa-md"></i></strong></h3>
                </div>
                <?php if (empty($cartItems)) : ?>
                    <p>Keranjang belanja Anda kosong.</p>
                <?php else : ?>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success mx-4" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody class="text-center">
                                    <?php foreach ($cartItems as $index => $item) : ?>
                                        <tr>
                                            <th scope="row"><?= $index + 1 ?></th>
                                            <td>
                                                <img src="<?= base_url('asset/img/jersey/' . $item['image']); ?>" class="sampul" alt="<?= esc($item['name']) ?>" style="height: 100px;">
                                            <td class="align-middle"><?= esc($item['name']) ?></td>
                                            <td class="align-middle"><strong><?= esc(number_to_currency($item['price'], 'IDR')) ?></strong></td>
                                            <td class="align-middle"><?= esc($item['quantity']) ?></td>
                                            <td class="align-middle"><strong><?= esc(number_to_currency($item['subtotal'], 'IDR')) ?></strong></td>
                                            <td class="align-middle">
                                                <a href="<?= base_url('/cart/remove/' . $item['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>