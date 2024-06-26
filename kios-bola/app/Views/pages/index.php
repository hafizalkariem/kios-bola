<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
  <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h1>Tampil Beda<br />Dengan Jersey Bola</h1>
    <h2>Temukan Jersey Klub Favoritmu Hanya Di KIOS BOLA</h2>
    <?php if (!logged_in()) : ?>
      <a href="<?= base_url('login'); ?>" class="btn-get-started">Get Started</a>
    <?php endif; ?>
  </div>
</section>
<!-- End Hero -->

<main id="main">
  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2 img-container" data-aos="fade-left" data-aos-delay="100">
          <img src="/asset/img/mudryk.png" class="img-fluid" alt="" />
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <h3>
            Tampil beda dengan jersey bola yang up to date
          </h3>
          <p class="fst-italic">
            <strong>KIOS BOLA</strong>memberikan pengalaman terbaik bagi para pelanggan dalam memilih
            jersey sepakbola klub kesayangan kita. keunggulan
          </p>
          <ul>
            <li>
              <i class="bi bi-check-circle"></i> Bekerja sama dengan apparel kaos terbaik
            </li>
            <li>
              <i class="bi bi-check-circle"></i> Menyediakan Jersey Up to Date dan jersey vintage
            </li>
            <li>
              <i class="bi bi-check-circle"></i> berkualitas tinggi dan memberikan pelayanan terbaik
            </li>
          </ul>
          <p>
            Dengan <strong>KOIS BOLA</strong> menuju new era dalam perkembangan sepakbola
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts section-bg">

    <!--<div class="row" data-aos="zoom-in" data-aos-delay="100">
      
      <div class="col d-flex align-items-stretch">
        <div class="course-item col-lg-8">
          </div>
        </div>
        
      </div>-->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="container">
          <div class="section-title">
            <h2>Kolaborasi</h2>
            <p>Apparel Collaborators</p>
          </div>

          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
              <?php foreach ($Apparel as $a) : ?>
                <div class="swiper-slide">
                  <!-- <div class="testimonial-wrap">
                    <div class="testimonial-item"> -->
                  <img src="asset/img/apparel/<?= $a['sampul']; ?>" alt="<?= $a['nama']; ?>" class="rounded mx-auto d-block apparel-img" />
                  <!-- </div>
                  </div> -->
                </div><!-- End testimonial item -->
              <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
    </section>


    </div>
  </section><!-- End Counts Section -->
  <!-- End Counts Section -->

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="content">
            <h3>Mengapa Harus <strong>KIOS BOLA</strong>?</h3>

            <p>
              Kios Bola adalah tempat terbaik untuk membeli jersey sepakbola terbaru. Kami bekerja sama dengan apparel ternama untuk menyediakan produk berkualitas tinggi dan desain terkini. Dengan koleksi lengkap dan autentik, Anda tidak perlu khawatir tentang keaslian. Belanja di Kios Bola mudah dan aman, didukung layanan pelanggan yang siap membantu. Temukan jersey favorit Anda dan dukung tim kesayangan hanya di Kios Bola!
            </p>

            <div class="text-center">
              <a href="<?= base_url('/about'); ?>" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-receipt"></i>
                  <h4>Corporis voluptates sit</h4>
                  <p>
                    Consequuntur sunt aut quasi enim aliquam quae harum pariatur
                    laboris nisi ut aliquip
                  </p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Ullamco laboris ladore pan</h4>
                  <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt
                  </p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-images"></i>
                  <h4>Labore consequatur</h4>
                  <p>
                    Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut
                    maiores omnis facere
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- End .content-->
        </div>
      </div>
    </div>
  </section>
  <!-- End Why Us Section -->

  <!-- ======= Features Section ======= -->
  <!-- <section id="features" class="features">
    <div class="container" data-aos="fade-up">
      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <div class="col-lg-3 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line" style="color: #ffbb2c"></i>
            <h3><a href="">Lorem Ipsum</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line" style="color: #5578ff"></i>
            <h3><a href="">Dolor Sitema</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-calendar-todo-line" style="color: #e80368"></i>
            <h3><a href="">Sed perspiciatis</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="ri-paint-brush-line" style="color: #e361ff"></i>
            <h3><a href="">Magni Dolores</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-database-2-line" style="color: #47aeff"></i>
            <h3><a href="">Nemo Enim</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-gradienter-line" style="color: #ffa76e"></i>
            <h3><a href="">Eiusmod Tempor</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-file-list-3-line" style="color: #11dbcf"></i>
            <h3><a href="">Midela Teren</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-price-tag-2-line" style="color: #4233ff"></i>
            <h3><a href="">Pira Neve</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-anchor-line" style="color: #b2904f"></i>
            <h3><a href="">Dirada Pack</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-disc-line" style="color: #b20969"></i>
            <h3><a href="">Moton Ideal</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-base-station-line" style="color: #ff5828"></i>
            <h3><a href="">Verdo Park</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-fingerprint-line" style="color: #29cc61"></i>
            <h3><a href="">Flavor Nivelanda</a></h3>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- End Features Section -->

  <!-- ======= Popular Courses Section ======= -->
  <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Jersey</h2>
        <p>Popular Items</p>
      </div>
      <div class="card-container">
        <!-- fisrt popular jerseybitems -->
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="asset/img/psg.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <!-- end -->
        <!-- fisrt popular jerseybitems -->
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="asset/img/psg.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <!-- end --><!-- fisrt popular jerseybitems -->
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="asset/img/psg.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <!-- end --><!-- fisrt popular jerseybitems -->
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="asset/img/psg.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <!-- end -->
      </div>


      <!-- ======= Trainers Section ======= -->
      <section id="trainers" class="trainers">
        <div class="container" data-aos="fade-up">
          <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="" />
                <div class="member-content">
                  <h4>Walter White</h4>
                  <span>Web Development</span>
                  <p>
                    Magni qui quod omnis unde et eos fuga et exercitationem. Odio
                    veritatis perspiciatis quaerat qui aut aut aut
                  </p>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="" />
                <div class="member-content">
                  <h4>Sarah Jhinson</h4>
                  <span>Marketing</span>
                  <p>
                    Repellat fugiat adipisci nemo illum nesciunt voluptas
                    repellendus. In architecto rerum rerum temporibus
                  </p>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="" />
                <div class="member-content">
                  <h4>William Anderson</h4>
                  <span>Content</span>
                  <p>
                    Voluptas necessitatibus occaecati quia. Earum totam consequuntur
                    qui porro et laborum toro des clara
                  </p>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Trainers Section -->
</main>
<!-- End #main -->
<?= $this->endsection(); ?>

<?= $this->extend('layout/template') ?>