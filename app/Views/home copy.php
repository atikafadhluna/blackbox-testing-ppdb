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
        <div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center bg-primary-o-40" style="background-image: url('<?= base_url(); ?>/assets/media/bg/bg-9.jpg')">
            <div class="container">
                <!--begin::Topbar-->
                <div class="d-flex justify-content-between align-items-center border-bottom border-white py-7">
                    <h3 class="h4 text-dark mb-0">
                        <img src="<?= base_url('logo/' . $setting['logo_sekolah']) ?>" class="max-h-50px" alt="">
                    </h3>
                    <div class="d-flex">
                        <a href="<?= base_url('auth/loginpanitia') ?>" class="btn font-weight-bolder font-size-sm btn-secondary py-3 px-6 mr-5">Login Panitia</a>
                    </div>
                </div>
                <!--end::Topbar-->
                <div class="d-flex align-items-stretch text-center flex-column py-35">
                    <!--begin::Heading-->
                    <?php if (isset($ta['status'])) { ?>
                        <h1 class="text-dark font-weight-bolder mb-5"><strong> Penerimaan Peserta Didik Tahun <?= $ta['ta'] ?></strong></h1>
                    <?php } else { ?>
                        <h1 class="text-danger font-weight-bolder mb-5"> <strong>Penerimaan Peserta Didik Tahun ini Sudah Ditutup</strong></h1>
                    <?php } ?>
                    <!--end::Heading-->
                    <!--begin::nama sekolah-->
                    <h1 class="text-dark font-weight-bolder mb-15"> <strong>MTsN 4 Aceh Besar</strong></h1>
                    <!--end::nama sekolah-->

                    <!-- begin button -->

                    <div class="row text-center">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <a href="<?= base_url('auth/register') ?>" class="btn btn-primary btn-lg text-uppercase mr-5">
                                <i class="flaticon2-indent-dots"></i> Daftar Akun Siswa
                            </a>

                            <a href="<?= base_url('auth/loginsiswa') ?>" class="btn btn-success btn-lg text-uppercase">
                                <i class="flaticon-paper-plane-1"></i> Login Siswa
                            </a>

                            <a href="https://api.whatsapp.com/send/?phone=6281260741115&text=Terima+kasih+telah+mempercayai+daystock+sebagai+solusi+layanan+belanjaan+harianmu.+Untuk+data+pemesanan%2C+silakan+isi+format+berikut+ini+ya.+%0A%0ANama+%3A%0ANo.+HP+%3A%0AAlamat+Pengantaran+%3A%0ADaftar+belanjaan+%3A%0A%0AMau+belanja+di+tempat+mana+%3A%0ACatatan+pesanan+%3A&type=phone_number&app_absent=0" class="btn btn-success btn-lg text-uppercase">
                                <i class="flaticon-paper-plane-1"></i> Tanya
                            </a>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <!-- end button -->
                </div>
            </div>
        </div>
        <!--end::Hero-->
        <div class="bg-primary-o-40 mb-10">
            <!--begin::Section-->
            <div class="container pb-8">
                <div class="row">
                    <div class="col-lg-4">
                        <!--begin::Callout-->
                        <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
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
                        <div class="card card-custom wave wave-animate-slow wave-warning mb-8 mb-lg-0">
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
                        <div class="card card-custom wave wave-animate-slow wave-info mb-8 mb-lg-0">
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
        </div>
        <!--begin::Section-->
        <div class="container mb-8">
            <div class="card card-custom p-6">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Informasi Penerimaan Peserta Didik Baru <?= date('Y'); ?></h3>
                    </div>
                </div>
                <div class="card-body">

                    <?= $setting['beranda'] ?>

                </div>
            </div>
        </div>
        <!--end::Section-->
        <!--begin::Section-->
        <div class="container mb-8">
            <div class="card card-custom p-6">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Tahapan Penerimaan Peserta Didik Baru <?= date('Y'); ?></h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <!--begin::Timeline-->
                        <div class="timeline timeline-6 mt-3">
                            <!--begin::Item-->
                            <div class="timeline-item align-items-start">
                                <!--begin::Label-->
                                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg mr-auto">Daftar Akun</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-primary icon-xl icon-center"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="font-weight-mormal font-size-lg timeline-content pl-3">
                                    <?= $setting['tahapan1'] ?>
                                    <div class="row pl-3">
                                        <a href="<?= base_url('auth/register') ?>" class="btn btn-primary font-weight-bold btn-sm mt-5 mb-5">Daftar Akun</a>
                                    </div>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="timeline-item align-items-start">
                                <!--begin::Label-->
                                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg mr-auto">Login Akun</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-success icon-xl icon-center"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="font-weight-mormal font-size-lg timeline-content pl-3">
                                    <?= $setting['tahapan2'] ?>
                                    <div class="row pl-3">
                                        <a href="<?= base_url('auth/loginSiswa') ?>" class="btn btn-success font-weight-bold btn-sm mt-5 mb-5">Login Akun</a>
                                    </div>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="timeline-item align-items-start">
                                <!--begin::Label-->
                                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg mr-auto">Isi Form</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-danger icon-xl icon-center"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="font-weight-mormal font-size-lg timeline-content pl-3">
                                    <?= $setting['tahapan3'] ?>
                                    <div class="row pl-3">
                                        <a href="<?= base_url('') ?>" class="btn btn-danger font-weight-bold btn-sm mt-5 mb-5">Isi Formulir</a>
                                    </div>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="timeline-item align-items-start">
                                <!--begin::Label-->
                                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg mr-auto">Print Form</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-warning icon-xl icon-center"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="font-weight-mormal font-size-lg timeline-content pl-3">
                                    <?= $setting['tahapan4'] ?>
                                    <div class="row pl-3">
                                        <a href="<?= base_url('') ?>" class="btn btn-warning font-weight-bold btn-sm mt-5 mb-5">Print Pendaftaran</a>
                                    </div>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="timeline-item align-items-start">
                                <!--begin::Label-->
                                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg mr-auto">Ujian</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-info icon-xl icon-center"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="font-weight-mormal font-size-lg timeline-content pl-3">
                                    <?= $setting['tahapan5'] ?>
                                    <div class="row pl-3">
                                        <a href="<?= base_url('') ?>" class="btn btn-info font-weight-bold btn-sm mt-5 mb-5">Mengikuti Ujian</a>
                                    </div>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="timeline-item align-items-start">
                                <!--begin::Label-->
                                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg mr-auto">Hasil Ujian</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-warning icon-xl icon-center"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="font-weight-mormal font-size-lg timeline-content pl-3">
                                    <?= $setting['tahapan6'] ?>
                                    <div class="row pl-3">
                                        <a href="<?= base_url('') ?>" class="btn btn-warning font-weight-bold btn-sm mt-5 mb-5">Lihat Hasil Ujian</a>
                                    </div>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="timeline-item align-items-start">
                                <!--begin::Label-->
                                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg mr-auto">Daftar Ulang</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-primary icon-xl icon-center"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="font-weight-mormal font-size-lg timeline-content pl-3">
                                    <?= $setting['tahapan7'] ?>
                                    <div class="row pl-3">
                                        <a href="<?= base_url('') ?>" class="btn btn-primary font-weight-bold btn-sm mt-5 mb-5">Daftar Ulang</a>
                                    </div>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Timeline-->


                    </div>
                </div>
            </div>
        </div>
        <!--end::Section-->

        <!--begin::Section-->
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!--begin::Callout-->
                    <div class="card card-custom p-6 mb-8 mb-lg-0">
                        <div class="card-body">
                            <div class="row">
                                <!--begin::Content-->
                                <div class="col-sm-7">
                                    <h2 class="text-dark mb-4">Get in Touch</h2>
                                    <p class="text-dark-50 line-height-lg">Windows 10 automatically installs updates to make for sure</p>
                                </div>
                                <!--end::Content-->
                                <!--begin::Button-->
                                <div class="col-sm-5 d-flex align-items-center justify-content-sm-end">
                                    <a href="custom/apps/support-center/feedback.html" class="btn font-weight-bolder text-uppercase font-size-lg btn-primary py-3 px-6">Submit a Request</a>
                                </div>
                                <!--end::Button-->
                            </div>
                        </div>
                    </div>
                    <!--end::Callout-->
                </div>
                <div class="col-lg-6">
                    <!--begin::Callout-->
                    <div class="card card-custom p-6">
                        <div class="card-body">
                            <div class="row">
                                <!--begin::Content-->
                                <div class="col-sm-7">
                                    <h2 class="text-dark mb-4">Live Chat</h2>
                                    <p class="text-dark-50 line-height-lg">Windows 10 automatically installs updates to make for sure</p>
                                </div>
                                <!--end::Content-->
                                <!--begin::Button-->
                                <div class="col-sm-5 d-flex align-items-center justify-content-sm-end">
                                    <a href="#" data-toggle="modal" data-target="#kt_chat_modal" class="btn font-weight-bolder text-uppercase font-size-lg btn-success py-3 px-6">Start Chat</a>
                                </div>
                                <!--end::Button-->
                            </div>
                        </div>
                    </div>
                    <!--end::Callout-->
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
</body>

</html>