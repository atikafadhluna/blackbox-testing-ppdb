<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Bootstrap CSS -->
    <meta charset="utf-8" />
    <title><?= $title ?> | <?= $subtitle ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/home/nav-style-trans.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/home/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/home/aos.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/media/logos/kemenag.ico" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/home/my-style.css">


    <link href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .tooltip-inner {
            min-width: 350px;
            /* If max-width does not work, try using width instead */
            width: 350px;
        }

        .bg-jumbotron {
            background: url('<?= base_url(); ?>/assets/media/bg/bg-cover.jpg') no-repeat right top;
            -webkit-background-size: cover !important;
            -moz-background-size: cover !important;
            -o-background-size: cover !important;
            background-size: cover !important;
        }

        .text-kemenag {
            color: #307f44;
        }

        .text-danger {
            color: #f64e60;
        }

        .wp-button {
            margin-top: 14px;
        }

        .float {
            position: fixed;
            width: 50px;
            height: 50px;
            bottom: 40px;
            right: 40px;
            background-image: url('<?= base_url(); ?>/logo/whatsapp.svg');
            background-size: contain;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 35px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }
    </style>
</head>

<body>
    <section id="navbarSection">
        <nav id="navbar_mobile" class="navbar navbar-expand-lg navbar-kemenag bg-kemenag fixed-top">
            <div class="container">
                <a class="navbar-brand">
                    <img id="logoNavbar" class="nav-logo" src="<?= base_url('logo/' . $setting['logo_sekolah']) ?>" alt=" sid desa">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="<?= base_url('home') ?>" class="nav-link">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('home/alurPendaftaran') ?>" class="nav-link">Alur Pendaftaran</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $setting['website'] ?>" target="_blank" class="nav-link">Web Profil</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('home/kontak') ?>" class="nav-link">Hubungi Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>


    <?= $this->renderSection('content'); ?>


    <section class="mt-10">
        <div class="row footer-info justify-content-center" id="#kontak">
            <div class="container row">
                <div class="col-12 col-md-4 kontak-wrap">
                    <h4 class="mt-2 mb-4 text-white">Kontak</h4>
                    <p class="d-none">
                        <i class="fa fa-phone-alt"></i>
                        <a href="tel:+6281260741115" style="color: inherit;"><?= $setting['telepon_sekolah'] ?></a>
                    </p>
                    <p class="d-none">
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:mtsn4acehbesar@gmail.com" style="color: inherit;"><?= $setting['email'] ?></a>
                    </p>
                    <a class="btn btn-outline-warning rounded-pill mb-3 px-3" href="tel:+6281260741115">
                        <i class="fa fa-phone-alt"></i>
                        <?= $setting['telepon_sekolah'] ?>
                    </a>
                    <a class="btn btn-outline-warning rounded-pill mb-3 px-3" href="mailto:mtsn4acehbesar@gmail.com">
                        <i class="fa fa-envelope"></i>
                        <?= $setting['email'] ?>
                    </a>
                </div>
                <div class="col-12 col-md-4 sosmed-icon-wrap">
                    <h4 class="mt-2 mb-4 text-center text-white">Sosial Media</h4>
                    <div class="wrap-sosmed">
                        <a href="https://www.facebook.com/digitaldesa.id" target="_blank">
                            <img class="logo-sosmed" src="https://digitaldesa.id/templates/homepage/media/logo/facebook.svg" />
                        </a>
                        <a href="https://www.instagram.com/digitaldesa.id" target="_blank">
                            <img class="logo-sosmed" src="https://digitaldesa.id/templates/homepage/media/logo/instagram.svg" />
                        </a>
                        <a href="https://twitter.com/digitaldesa" target="_blank">
                            <img class="logo-sosmed" src="https://digitaldesa.id/templates/homepage/media/logo/twitter.svg" />
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=628114448585&text=Halo%20saya%20mau%20tanya%20tentang%20digides..." target="_blank">
                            <img class="logo-sosmed" src="https://digitaldesa.id/templates/homepage/media/logo/whatsapp.svg" />
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 sosmed-icon-wrap">
                    <h4 class="mt-2 mb-4 text-white">Alamat</h4>
                    <p class="text-white">
                        <i class="fa fa-map-marker-alt "></i>
                        <?= $setting['alamat_lengkap'] ?>
                    </p>
                </div>
            </div>

        </div>
        <div class="card-footer" style=" background-color: #256335;">
            <!--begin::Container-->
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                <!--begin::Copyright-->
                <div>
                    <span class="text-dark font-weight-bold mr-2">Copyright © <?= date('Y'); ?> PPDB
                    </span>
                    <a href="<?= $setting['website'] ?>" target="_blank" class="text-white text-hover-primary"><?= $setting['nama_sekolah'] ?></a>
                </div>

                <!--end::Copyright-->
            </div>
            <!--end::Container-->
        </div>
    </section>
    <script>
        AOS.init();

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <!--BEGIN::WhatsApp button-->

    <a href="https://wa.me/6281260741115" class="float" target="_blank"></a>
    <!--END::WhatsApp button-->

    <script src="<?= base_url(); ?>/assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/scroll-navbar.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url(); ?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="//rum-static.pingdom.net/pa-5f5ae28b8e83fa0015000ad0.js" async></script>
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "https://digitaldesa.id/",
            "sameAs": [
                "https://www.facebook.com/digitaldesa.id",
                "https://www.instagram.com/digitaldesa.id",
                "https://twitter.com/digitaldesa"
            ],
            "@id": "https://digitaldesa.id/",
            "name": "Digital Desa",
            "logo": "https://digitaldesa.id/templates/homepage/media/misc/favicon/android-icon-144x144.png"
        }
    </script>
    <script type="text/javascript">
        AOS.init();
    </script>

</body>

</html>