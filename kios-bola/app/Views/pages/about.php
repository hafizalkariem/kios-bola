<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>About Us</h2>
            <p>Kami berusaha untuk memberikan yang terbaik dalam menyediakan pelayanan dan solusi atas kebutuhan Anda. Setiap masukan dan pertanyaan Anda sangat berarti bagi kami. Kami siap membantu dan menjawab segala pertanyaan yang Anda miliki. </p>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2 img-container" data-aos="fade-left" data-aos-delay="100">
                    <img src="/asset/img/neymar.png" class="img-fluid" alt="" />
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

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
        <div class="container">

            <div class="row counters">
                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="<?= $totalUser; ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Members</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="<?= $totalApparels; ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Apparels</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="<?= $totalJersey; ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Jerseys</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="<?= $totalklub; ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Clubs</p>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Testimonials</h2>
                <p>What are they saying</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="asset/img/rashford.jpg" class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen
                                    aliquam, risus at semper.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->



                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

</main><!-- End #main -->
<?= $this->endsection(); ?>
<?= $this->extend('layout/template'); ?>