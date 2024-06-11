<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2 class="">Daftar Klub</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= jersey Section ======= -->
    <section id="jersey" class="jersey">
        <div class="container" data-aos="fade-up">
            <div class="row row-cols-lg-3 ">
                <?php foreach ($Jersey as $j) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="asset/img/<?= $j['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title my-3"><strong><?= $j['judul']; ?></strong></h5>
                                        <img src="asset/img/<?= $j['apparel']; ?>" class="small-img mb-3" alt="apparel">
                                        <h5 class="card-text"><strong>Rp <?= $j['harga']; ?></strong></h5>
                                        <p class="card-text my-3">Jumlah Tersedia : <strong><?= $j['ketersediaan']; ?></strong></p>
                                        <div class="col d-flex justify-content-start gap-3 mb-3">
                                            <a href="#" class="btn btn-primary">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </a>
                                            <a href="#" class="btn btn-primary">Beli sekarang</a>
                                        </div>
                                        <p class="card-text"><small class="text-body-secondary"><?= $j['created_at']; ?></small></p>
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
<?= $this->endsection(); ?>
<?= $this->extend('layout/template'); ?>