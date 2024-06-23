<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2 class="">Daftar Klub</h2>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <?php foreach ($Klub as $k) : ?>
          <div class="col-lg-3 col-md-6 mb-3">
            <div class="box">
              <h3><?= $k['nama']; ?></h3>
              <img src="asset/img/klub/<?= $k['logo']; ?>" alt="<?= $k['nama']; ?>" class="klub img-fluid" style="max-width:100%; max-height:auto;">
              <div class="btn-wrap">
                <a href="<?= base_url('/jersey?club_id=' . $k['id_klub']) ?>" class="btn-buy">lihat jersey</a>
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