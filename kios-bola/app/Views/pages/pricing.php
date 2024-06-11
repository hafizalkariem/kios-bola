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

        <div class="col-lg-3 col-md-6">
          <div class="box">
            <h3>Manchester United</h3>
            <img src="<?= base_url('/asset/img/manchester-united.png') ?>" alt="manchester-united" class="klub">
            <div class="btn-wrap">
              <a href="<?= base_url('/jersey') ?>" class="btn-buy">lihat jersey</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="box">
            <h3>Barcelona</h3>
            <img src="<?= base_url('/asset/img/barcelona.png') ?>" alt="manchester-united" class="klub">
            <div class="btn-wrap">
              <a href="<?= base_url('/jersey') ?>" class="btn-buy">lihat jersey</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="box">
            <h3>Manchester City</h3>
            <img src="<?= base_url('/asset/img/manchester-city.png') ?>" alt="manchester-united" class="klub">
            <div class="btn-wrap">
              <a href="<?= base_url('/jersey') ?>" class="btn-buy">lihat jersey</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="box">
            <h3>Bayern Muenchen</h3>
            <img src="<?= base_url('/asset/img/bayern-muenchen.png') ?>" alt="manchester-united" class="klub">
            <div class="btn-wrap">
              <a href="<?= base_url('/jersey') ?>" class="btn-buy">lihat jersey</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="box">
            <h3>Liverpool</h3>
            <img src="<?= base_url('/asset/img/liverpool.png') ?>" alt="manchester-united" class="klub">
            <div class="btn-wrap">
              <a href="<?= base_url('/jersey') ?>" class="btn-buy">lihat jersey</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="box">
            <h3>Paris Saint-Germain</h3>
            <img src="<?= base_url('/asset/img/psg.png') ?>" alt="manchester-united" class="klub">
            <div class="btn-wrap">
              <a href="<?= base_url('/jersey') ?>" class="btn-buy">lihat jersey</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Pricing Section -->

</main><!-- End #main -->
<?= $this->endsection(); ?>

<?= $this->extend('layout/template'); ?>