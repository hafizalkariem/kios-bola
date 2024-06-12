<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('asset/img/favicon.png'); ?>" rel="icon">
    <link href="<?= base_url('asset/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('asset/vendor/animate.css/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('asset/vendor/aos/aos.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('asset/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('asset/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('asset/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('asset/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('asset/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('asset/css/style.css'); ?>" rel="stylesheet">
    <!-- link bootsrapt -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- =======================================================
    * Template Name: Mentor - v4.9.1
    * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-around">

            <h1 class="logo me-auto"><a href="<?= base_url('/'); ?>"> KIOS BOLA</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href=" index.html" class="logo me-auto"><img src="<?= base_url('assets/img/logo.png'); ?>" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li class="<?= $activePage == 'home' ? 'active' : ''; ?>"><a href="<?= base_url('/'); ?>">Home</a></li>
                    <li class="<?= $activePage == 'about' ? 'active' : ''; ?>"><a href="<?= base_url('/about'); ?>">About</a></li>
                    <li class="<?= $activePage == 'contact' ? 'active' : ''; ?>"><a href="<?= base_url('/contact'); ?>">Contact</a></li>
                    <li class="<?= $activePage == 'pricing' ? 'active' : ''; ?>"><a href="<?= base_url('/shop'); ?>">Shop</a></li>
                    <li class="dropdown <?= $activePage == 'AdminJersey' ? 'active' : ''; ?>"><a href="#"><span>Admin</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= base_url('/admin/jersey'); ?>">Jersey</a></li>
                            <li><a href="<?= base_url('/admin/klub'); ?>">Klub</a></li>
                            <li><a href="<?= base_url('/admin/apparel'); ?>">Apparel</a></li>
                        </ul>
                    </li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <!-- search -->
            <form class="d-flex mx-4" role="search">
                <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">

                <button class="btn btn-outline-success rounded-pill bg-danger text-white" type="submit">Search</button>
            </form>
            <!-- end search -->

            <a href="<?= base_url('/courses'); ?>" class="get-started-btn">Get Started</a>

        </div>
    </header><!-- End Header -->

    <?= $this->renderSection('content') ?>

    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>KIOS BOLA</h3>
                        <p>
                            Q737+R6G, Karangmekar,<br> Kedungwaringin, Bekasi Regency, <br>West Java 17540 <br>
                            <strong>Phone:</strong> +62 822 2622 1535<br>
                            <strong>Email:</strong> ahmadhapiz224@gmail.com<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('/') ?>">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('/about') ?>">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('/shop') ?>">Shop</a></li>

                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('') ?>">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('') ?>">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('') ?>">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('') ?>">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('') ?>">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Join Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>KIOS BOLA</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/KIOS BOLA-free-education-bootstrap-theme/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="<?= base_url('') ?>" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="<?= base_url('') ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="<?= base_url('') ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="<?= base_url('') ?>" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="<?= base_url('') ?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('asset/vendor/purecounter/purecounter_vanilla.js'); ?>"></script>
    <script src="<?= base_url('asset/vendor/aos/aos.js'); ?>"></script>
    <script src="<?= base_url('asset/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('asset/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
    <script src="<?= base_url('asset/vendor/php-email-form/validate.js'); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('asset/js/main.js'); ?>"></script>

</body>

</html>