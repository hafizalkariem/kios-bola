<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container d-flex justify-content-center gap-3 mt-3">
            <?php if (!empty($Jerseys)) : ?>
                <!-- Ambil nama klub dari jersey pertama -->
                <h2><?= $Jerseys[0]['club_nama']; ?></h2>
            <?php else : ?>
                <!-- Handle jika tidak ada data jersey -->
                <h2>Club Tidak Memiliki Jersey</h2>
            <?php endif; ?>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= jersey Section ======= -->
    <section id="jersey" class="jersey">
        <div class="container">
            <div class="row row-cols-lg-3 ">
                <?php foreach ($Jerseys as $j) : ?>
                    <div class="col-lg-4 col-md-6" data-aos-delay="100" style="max-width: 540px;">
                        <div class="card mb-3 shadow" data-aos="zoom-in">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?= base_url('asset/img/jersey/' . $j['sampul']); ?>" class="img-fluid rounded-start" alt="<?= $j['judul']; ?>">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title my-3"><strong><?= $j['judul']; ?></strong></h5>
                                        <div class="d-flex justify-content-start gap-3">
                                            <img src="<?= base_url('asset/img/apparel/' . $j['apparel']); ?>" class="small-img mb-3" alt="apparel">
                                            <img src="<?= base_url('asset/img/klub/' . $j['club_logo']); ?>" class="small-img mb-3" alt="club_logo">
                                        </div>
                                        <h5 class="card-text"><strong><?= number_to_currency($j['harga'], 'IDR'); ?></strong></h5>
                                        <p class="card-text my-3">Jumlah Tersedia: <strong><?= $j['ketersediaan']; ?></strong></p>
                                        <div class="col d-flex justify-content-start align-items-center gap-3 mb-3">
                                            <a href="<?= base_url('cart/add/' . $j['id']); ?>" class="add-to-cart">
                                                <i class="fa-solid fa-cart-plus fa-2xl" style="color: #cf1006;"></i>
                                            </a>
                                            <div class="divider-vertical"></div>
                                            <button type="submit" class="btn">
                                                <i class="fas fa-credit-card fa-2xl" style="color: #cf1006;"></i>
                                            </button>
                                        </div>
                                        <p class="card-text"><small class="text-body-secondary">Dibuat pada <strong><?= $j['created_at']; ?></strong></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section><!-- End Pricing Section -->
</main><!-- End #main -->
<?= $this->endSection(); ?>