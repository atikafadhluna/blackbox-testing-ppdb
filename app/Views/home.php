<?= $this->extend('templates/home_layout'); ?>

<?= $this->section('content'); ?>
<header>
    <div class="jumbotron jumbotron-fluid bg-jumbotron">
        <div class="container info-jumbotron text-center center">
            <?php if (isset($ta['status'])) { ?>
                <h6 class="display-4 text-kemenag"> Penerimaan Peserta Didik Tahun <?= $ta['ta'] ?></h6>
                <p class="jumbo-p display-5 text-kemenag">MTsN 4 Aceh Besar</p>

            <?php } else { ?>
                <h6 class="display-4 text-danger">Penerimaan Peserta Didik Tahun ini Sudah Ditutup</h6>
                <p class="jumbo-p display-5 text-danger">MTsN 4 Aceh Besar</p>
            <?php } ?>
            <div data-aos="zoom-in-up" class="row mt-4">
                <div class="col-md-6 text-right">
                    <a href="<?= base_url('auth/register') ?>" class="btn info-btn btn-warning">
                        Daftar Akun
                    </a>
                </div>
                <div class="col-md-6 text-left">
                    <a href="<?= base_url('auth/loginsiswa') ?>" class="btn info-btn btn-primary">
                        Login Siswa
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<main>

    <div class="container">
        <article class="mt-10">
            <div class="row wrap-div">
                <div class="col-sm-7 col-xl-6 first-div center-v">
                    <section>
                        <header>
                            <h2 class="sub-judul about-sub mb-4">Persyaratan PPDB <?= date('Y'); ?></h2>
                        </header>
                        <div>
                            <h6 class="sub-judul about-sub text-warning">Syarat-syarat Pendaftaran</h6>
                            <p class=""><?= $setting['syarat_daftar'] ?></p>
                        </div>
                        <div>
                            <h6 class="sub-judul about-sub text-warning">Syarat-syarat Pendaftaran Ulang</h6>
                            <p class=""><?= $setting['syarat_daftar_ulang'] ?></p>
                        </div>
                    </section>
                </div>
                <div class="col-sm-5 col-xl-6 text-center center-v second-div">
                    <img data-aos="zoom-in-down" class="img-adm" src="<?= base_url('brosur/' . $setting['brosur']) ?>" alt="sistem informasi desa digital">
                </div>
            </div>
        </article>
        <article class="space-subHeader">
            <div class="container">
                <header class="row">
                    <div class="col-md-12 text-center mb-4">
                        <h2 class="sub-judul">Informasi Penerimaan</h2>
                    </div>
                </header>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div data-aos="fade-right" class="card">
                            <div class="card-body text-center">
                                <img src="<?= base_url('assets/media/img/users 1.png') ?>" height="65">
                                <p name="jumlahRegister" class="jum-card"><?= $ta['kuota'] ?? '200' ?></p>
                                <p class="des-card">Daya Tampung</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div data-aos="fade-down" class="card">
                            <div class="card-body text-center">
                                <img src="<?= base_url('assets/media/img/user-plus 1.png') ?>" height="65">
                                <p name="jumlahRegister" class="jum-card"><?= $jmlPendaftar ?></p>
                                <p class="des-card">Pendaftar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div data-aos="fade-left" class="card">
                            <div class="card-body text-center">
                                <img src="<?= base_url('assets/media/img/user 1.png') ?>" height="65">
                                <p name="jumlahRegister" class="jum-card"> <?= $jmlLaki ?></p>
                                <p class="des-card">Pendaftar Laki-laki</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div data-aos="fade-left" class="card">
                            <div class="card-body text-center">
                                <img src="<?= base_url('assets/media/img/user 1.png') ?>" height="65">
                                <p name="jumlahRegister" class="jum-card"> <?= $jmlPr ?></p>
                                <p class="des-card">Pendaftar Perempuan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article class="space-subHeader container">
            <section class="row">
                <div data-aos="fade-up" class="col-md-6 center-v">
                    <h2 class="sub-judul">Tutorial Pendaftaran PPDB <?= date('Y'); ?></h2>
                    <p>Anda juga dapat mengikuti alur pendaftaran PPDB melalui website PPDB MTsN 4 Aceh besar <strong><a href="<?= base_url('home/alurPendaftaran') ?>" target="_blank" class="text-kemenag">KLIK DISINI</a></strong></p>
                </div>
                <div data-aos="fade-down" class="col-md-6 text-center">
                    <section class="faq">
                        <div class="container">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/My6Obxz4Vuc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </section>
                </div>
            </section>
        </article>



        <article class="space-subHeader">
            <header class="row">
                <div class="col-md-12 text-center ">
                    <h2 class="sub-judul about-sub mb-3">Jadwal Pendaftaran</h2>
                </div>
            </header>
            <div class="row mb-5">
                <div class="col-6 col-lg-5 col-xl-5">
                    <div data-aos="flip-left" class="card center-v">
                        <div class="card-body card-kanan">
                            <h5>Pengisian Formulir</h5>
                            <p><?= $setting['j_pengisian_formulir'] ?></p>
                        </div>
                    </div>
                </div>
                <div class=" col-2 text-center center-v d-none-mobile">
                    <img class="icon-manfaat-digides" src="<?= base_url('/assets/media/img/file-text 1.png') ?>" alt="aplikasi e desa">
                </div>
                <div class="col-6 col-lg-5 col-xl-5">
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-6 col-lg-5 col-xl-5">
                </div>
                <div class="col-2 text-center center-v d-none-mobile">
                    <img class="icon-manfaat-digides" src="<?= base_url('assets/media/img/book-open 1.png') ?>" alt="sistem informasi desa online">
                </div>
                <div class="col-6 col-lg-5 col-xl-5">
                    <div data-aos="flip-right" class="card center-v">
                        <div class="card-body card-kanan">
                            <h5>Ujian PPDB</h5>
                            <p><?= $setting['j_ujian_ppdb'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-6 col-lg-5 col-xl-5">
                    <div data-aos="flip-left" class="card center-v">
                        <div class="card-body card-kanan">
                            <h5>Pengumuman Kelulusan</h5>
                            <p><?= $setting['j_pengumuman_kelulusan'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-2 text-center center-v d-none-mobile">
                    <img class="icon-manfaat-digides" src="<?= base_url('assets/media/img/mic 1.png') ?>" alt="aplikasi desa pintar">
                </div>
                <div class="col-6 col-lg-5 col-xl-5">
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-6 col-lg-5 col-xl-5">
                </div>
                <div class="col-2 text-center center-v d-none-mobile">
                    <img class="icon-manfaat-digides" src="<?= base_url('/assets/media/img/file-text 1.png') ?>" alt="aplikasi desa pintar">
                </div>
                <div class="col-6 col-lg-5 col-xl-5">
                    <div data-aos="flip-right" class="card center-v">
                        <div class="card-body card-kanan">
                            <h5>Pendaftaran Ulang</h5>
                            <p><?= $setting['j_pendaftaran_ulang'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-lg-5 col-xl-5">
                    <div data-aos="flip-right" class="card center-v">
                        <div class="card-body card-kanan">
                            <h5>MOS</h5>
                            <p><?= $setting['j_mos'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-2 text-center center-v d-none-mobile">
                    <img class="icon-manfaat-digides" src="<?= base_url('/assets/media/img/home 1.png') ?>" alt="aplikasi desa pintar">
                </div>
                <div class="col-6 col-lg-5 col-xl-5">
                </div>
            </div>
        </article>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </div>
</main>
<?= $this->endSection(''); ?>