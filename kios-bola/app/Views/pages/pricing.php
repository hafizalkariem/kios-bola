<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2 class="">Daftar Klub</h2>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Search Box ======= -->
  <section id="search" class="search">
    <div class="container d-flex justify-content-center" data-aos="fade-up">
      <form action="" method="get" class="search-form">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="keyword" value="<?= $keyword; ?>" placeholder="Search for clubs...">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
        </div>
      </form>
    </div>
  </section><!-- End Search Box -->

  <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('pesan'); ?>
    </div>
  <?php endif; ?>


  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <?php foreach ($Klub as $k) : ?>
          <div class="col-lg-3 col-md-6 mb-3">
            <div class="box">
              <h3><?= $k['nama']; ?></h3>
              <img src="<?= base_url(); ?>/asset/img/klub/<?= $k['logo']; ?>" alt="<?= $k['nama']; ?>" class="klub img-fluid" style="max-width:100%; max-height:auto;">
              <div class="btn-wrap">
                <a href="<?= base_url('/jersey?club_id=' . $k['id_klub']) ?>" class="btn-buy">lihat jersey</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>


        <?= $pager->links('klub', 'pagination') ?>
      </div>

    </div>
  </section><!-- End Pricing Section -->

</main><!-- End #main -->

<?= $this->endSection(); ?>