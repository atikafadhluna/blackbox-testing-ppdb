<?php
$db = \Config\Database::connect();

$setting = $db->table('tbl_web')
    ->where('id_setting', '1')
    ->get()->getRowArray();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?> | <?= $subtitle ?></title>
    <meta name="description" content="Support center home example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?= base_url(); ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="<?= base_url(); ?>/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/media/logos/kemenag.ico" />
</head>

<body>
    <!--begin::Content-->
    <div class="content pt-0 d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <!--begin::Hero-->
        <div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center bg-white mb-8" style="background-image: url('<?= base_url(); ?>/assets/media/bg/bg-auth.png')">
            <div class="container">
                <!--begin::Topbar-->
                <div class="d-flex justify-content-between align-items-center border-bottom border-white py-7">
                    <h3 class="h4 text-dark mb-0">
                        <img src="<?= base_url('logo/' . $setting['logo_sekolah']) ?>" class="max-h-50px" alt="">
                    </h3>

                </div>
                <!--end::Topbar-->
                <div class="d-flex align-items-stretch text-center flex-column py-30">
                    <!--begin::Heading-->
                    <?php if (isset($ta['status'])) { ?>
                        <h1 class="text-white font-weight-bolder mb-5"><strong> Penerimaan Peserta Didik Tahun <?= $ta['ta'] ?></strong></h1>
                    <?php } else { ?>
                        <h1 class="text-danger font-weight-bolder mb-5"> <strong>Penerimaan Peserta Didik Tahun ini Sudah Ditutup</strong></h1>
                    <?php } ?>
                    <!--end::Heading-->
                    <!--begin::nama sekolah-->
                    <h1 class="text-white font-weight-bolder mb-15"> <strong>MTsN 4 Aceh Besar</strong></h1>
                    <!--end::nama sekolah-->

                    <!-- begin button -->

                    <div class="row text-center">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <a href="<?= base_url('auth/register') ?>" class="btn btn-secondary btn-lg text-uppercase mr-5">
                                <i class="flaticon2-indent-dots"></i> Daftar Akun Siswa
                            </a>

                            <a href="<?= base_url('auth/loginSiswa') ?>" class="btn btn-warning btn-lg text-uppercase text-white">
                                <i class="flaticon-paper-plane-1 text-white"></i> Login Siswa
                            </a>


                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="mt-10">
                        <!--begin::Section-->
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <!--begin::Callout-->
                                    <div class="card card-custom mb-8 mb-lg-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center p-5">
                                                <!--begin::Icon-->
                                                <div class="mr-6">
                                                    <strong class="font-weight-boldest display-2 text-dark-o-40">
                                                        <?= $jmlPendaftar ?>
                                                    </strong>
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Content-->
                                                <div class="d-flex flex-column">
                                                    <a class="text-dark font-weight-bold font-size-h4 mb-3">Jumlah Pendaftar</a>
                                                    <div class="text-dark">PPDB <?= date('Y'); ?></div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Callout-->
                                </div>
                                <div class="col-lg-4">
                                    <!--begin::Callout-->
                                    <div class="card card-custom mb-8 mb-lg-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center p-5">
                                                <!--begin::Icon-->
                                                <div class="mr-6">
                                                    <strong class="font-weight-boldest display-2 text-dark-o-40">
                                                        <?= $jmlLaki ?>
                                                    </strong>
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Content-->
                                                <div class="d-flex flex-column">
                                                    <a class="text-dark font-weight-bold font-size-h4 mb-3">Jumlah Laki-Laki</a>
                                                    <div class="text-dark-75">PPDB <?= date('Y'); ?></div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Callout-->
                                </div>
                                <div class="col-lg-4">
                                    <!--begin::Callout-->
                                    <div class="card card-custom mb-8 mb-lg-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center p-5">
                                                <!--begin::Icon-->
                                                <div class="mr-6">
                                                    <strong class="font-weight-boldest display-2 text-dark-o-40">
                                                        <?= $jmlPr ?>
                                                    </strong>
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Content-->
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-dark font-weight-bold font-size-h4 mb-3">Jumlah Perempuan</a>
                                                    <div class="text-dark-75">PPDB <?= date('Y'); ?></div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Callout-->
                                </div>
                            </div>
                        </div>
                        <!--end::Section-->
                        <!--begin::Section-->
                        <div class="container">
                            <div class="launch-time row">
                                <div class="col-lg-3">
                                    <!--begin::Callout-->
                                    <div class="card card-custom mb-8 mb-lg-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center p-5">
                                                <!--begin::Icon-->
                                                <div class="mr-6">
                                                    <strong class="font-weight-boldest display-2 text-dark-o-40" id="days">
                                                        00
                                                    </strong>
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Content-->
                                                <div class="d-flex flex-column">
                                                    <a class="text-dark font-weight-bold font-size-h4 mb-3">Days</a>
                                                    <div class="text-dark">PPDB <?= date('Y'); ?></div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Callout-->
                                </div>
                                <div class="col-lg-3">
                                    <!--begin::Callout-->
                                    <div class="card card-custom mb-8 mb-lg-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center p-5">
                                                <!--begin::Icon-->
                                                <div class="mr-6">
                                                    <strong class="font-weight-boldest display-2 text-dark-o-40" id="hours">
                                                        00
                                                    </strong>
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Content-->
                                                <div class="d-flex flex-column">
                                                    <a class="text-dark font-weight-bold font-size-h4 mb-3">Hours</a>
                                                    <div class="text-dark-75">PPDB <?= date('Y'); ?></div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Callout-->
                                </div>
                                <div class="col-lg-3">
                                    <!--begin::Callout-->
                                    <div class="card card-custom mb-8 mb-lg-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center p-5">
                                                <!--begin::Icon-->
                                                <div class="mr-6">
                                                    <strong class="font-weight-boldest display-2 text-dark-o-40" id="minutes">
                                                        00
                                                    </strong>
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Content-->
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-dark font-weight-bold font-size-h4 mb-3">Minutes</a>
                                                    <div class="text-dark-75">PPDB <?= date('Y'); ?></div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Callout-->
                                </div>
                                <div class="col-lg-3">
                                    <!--begin::Callout-->
                                    <div class="card card-custom mb-8 mb-lg-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center p-5">
                                                <!--begin::Icon-->
                                                <div class="mr-6">
                                                    <strong class="font-weight-boldest display-2 text-dark-o-40" id="seconds">
                                                        00
                                                    </strong>
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Content-->
                                                <div class="d-flex flex-column">
                                                    <a class="text-dark font-weight-bold font-size-h4 mb-3">second</a>
                                                    <div class="text-dark-75">PPDB <?= date('Y'); ?></div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Callout-->
                                </div>
                            </div>
                        </div>
                        <!--end::Section-->
                    </div>
                    <!-- end button -->
                </div>
            </div>

            <!--end::Hero-->

        </div>
        <!--begin::Section-->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-8">
                    <div class="card card-custom p-6">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Informasi Penerimaan Peserta Didik Baru <?= date('Y'); ?></h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <a href="" class="btn btn-light-danger btn-lg text-uppercase mr-5">
                                    <i class="fas fa-file-pdf text-danger"></i> Panduan PPDB
                                </a>
                                <a href="" class="btn btn-light-primary btn-lg text-uppercase">
                                    <i class="fas fa-file-video text-primary"></i> Video Panduan PPDB
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-custom p-6">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Alur Penerimaan Peserta Didik Baru <?= date('Y'); ?></h3>
                            </div>
                        </div>
                        <div class="card-body">

                            <!--begin::Item-->
                            <div class="mb-10">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light mr-5">
                                        <span class="symbol-label">
                                            <img src="assets/media/svg/misc/register.png" class="h-50 align-self-center" alt="">
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Text-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a href="<?= base_url('auth/register') ?>" class="font-weight-bold text-primary text-hover-primary font-size-lg mb-1">Daftarkan Akun</a>
                                        <span class="text-muted font-weight-bold">07 Maret - 28 Maret 2022</span>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Desc-->
                                <p class="text-dark-50 m-0 pt-5 font-weight-normal">Pendaftaran dapat dilakukan pada website PPDB MTsN 4 Aceh Besar </p>
                                <!--end::Desc-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="mb-10">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light mr-5">
                                        <span class="symbol-label">
                                            <img src="assets/media/svg/misc/membership.png" class="h-50 align-self-center" alt="">
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Text-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a href="" class="font-weight-bold text-primary text-hover-primary font-size-lg mb-1">Isi Formulir</a>
                                        <span class="text-muted font-weight-bold">07 Maret - 28 Maret 2022</span>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Desc-->
                                <p class="text-dark-50 m-0 pt-5 font-weight-normal">Isi formulir pendaftaran dan upload berkas-berkas yang diminta</p>
                                <!--end::Desc-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="mb-10">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light mr-5">
                                        <span class="symbol-label">
                                            <img src="assets/media/svg/misc/test.png" class="h-50 align-self-center" alt="">
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Text-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a href="" class="font-weight-bold text-primary text-hover-primary font-size-lg mb-1">Mengikuti Ujian</a>
                                        <span class="text-muted font-weight-bold">30 Maret 2022</span>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Desc-->
                                <p class="text-dark-50 m-0 pt-5 font-weight-normal">Soal ujian berupa pilihan ganda, waktu pengerjaan 30 menit</p>
                                <!--end::Desc-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="mb-10">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light mr-5">
                                        <span class="symbol-label">
                                            <img src="assets/media/svg/misc/announcement.png" class="h-50 align-self-center" alt="">
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Text-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a href="" class="font-weight-bold text-primary text-hover-primary font-size-lg mb-1">Pengumuman</a>
                                        <span class="text-muted font-weight-bold">01 April 2022</span>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Desc-->
                                <p class="text-dark-50 m-0 pt-5 font-weight-normal">Pengumuman kelulusan akan dikirimkan pada nomor WA peserta didik</p>
                                <!--end::Desc-->
                            </div>
                            <!--end::Item-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Section-->

        <!--end::Entry-->
    </div>
    <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
        <!--begin::Container-->
        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted font-weight-bold mr-2">Copyright © <?= date('Y'); ?> PPDB
                </span>
                <a href="<?= $setting['website'] ?>" target="_blank" class="text-dark-75 text-hover-success"><?= $setting['nama_sekolah'] ?></a>
            </div>

            <!--end::Copyright-->
        </div>

        <!--end::Container-->
    </div>
    <!--end::Content-->

    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"></rect>
                    <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"></path>
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>

    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="<?= base_url(); ?>/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="<?= base_url(); ?>/assets/js/scripts.bundle.js"></script>
    <script src="<?= base_url(); ?>/assets/js/pages/widgets.js"></script>
    <!--end::Global Theme Bundle-->
    <script>
        var countDownDate = new Date("<?= $ta['tanggal_selesai_daftar_ulang'] ?>").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;

        }, 1000);
    </script>
</body>

</html>