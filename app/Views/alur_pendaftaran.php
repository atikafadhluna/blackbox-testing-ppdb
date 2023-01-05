<?= $this->extend('templates/home_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <section class="space-subHeader">
        <div class="row">
            <div class="col-md-12 mb-3 mt-3 text-center">
                <h2 class="sub-judul">Alur Pendaftaran</h2>
            </div>
        </div>
        <section class="section-mobile-separator">
            <div class="row mb-5">
                <div data-aos="fade-up" class="col-md-6 text-center center-v aos-init aos-animate">
                    <h3 class="sub-judul about-sub-mobile text-left">Daftar Akun</h3>
                    <img class="img-adm" src="<?= base_url('alur/' . $setting['gambar_daftar']) ?>">
                </div>
                <div data-aos="fade-down" class="col-md-6 center-v aos-init">
                    <h3 class="sub-judul about-sub">Daftar Akun</h3>
                    <p><?= $setting['desc_daftar'] ?></p>
                </div>
            </div>
        </section>
        <section class="section-mobile-separator">
            <div class="row mb-5 wrap-div">
                <div data-aos="fade-down" class="col-md-6 center-v first-div aos-init">
                    <h3 class="sub-judul about-sub">Login Akun</h3>
                    <p><?= $setting['desc_login'] ?></p>
                </div>
                <div data-aos="fade-up" class="col-md-6 text-center second-div center-v aos-init">
                    <h3 class="sub-judul about-sub-mobile text-left">Login Akun</h3>
                    <img class="img-adm" src="<?= base_url('alur/' . $setting['gambar_login']) ?>">
                </div>
            </div>
        </section>
        <section class="section-mobile-separator">
            <div class="row mb-5">
                <div data-aos="fade-up" class="col-md-6 text-center center-v aos-init">
                    <h3 class="sub-judul about-sub-mobile text-left">Pengisian Formulir</h3>
                    <img class="img-adm" src="<?= base_url('alur/' . $setting['gambar_formulir']) ?>">
                </div>
                <div data-aos="fade-down" class="col-md-6 center-v aos-init">
                    <h3 class="sub-judul about-sub">Pengisian Formulir</h3>
                    <p><?= $setting['desc_formulir'] ?></p>
                </div>
            </div>
        </section>
        <section class="section-mobile-separator">
            <div class="row wrap-div mb-5">
                <div data-aos="fade-down" class="col-md-6 first-div center-v aos-init">
                    <h3 class="sub-judul about-sub">Mengikuti Ujian</h3>
                    <p><?= $setting['desc_ujian'] ?></p>
                </div>
                <div data-aos="fade-up" class="col-md-6 text-center second-div center-v aos-init">
                    <h3 class="sub-judul about-sub-mobile text-left">Mengikuti Ujian</h3>
                    <img class="img-adm" src="<?= base_url('alur/' . $setting['gambar_ujian']) ?>">
                </div>
            </div>
        </section>
        <section class="section-mobile-separator">
            <div class="row mb-5">
                <div data-aos="fade-up" class="col-md-6 text-center center-v aos-init">
                    <h3 class="sub-judul about-sub-mobile text-left">Pengumuman</h3>
                    <img class="img-adm" src="<?= base_url('alur/' . $setting['gambar_pengumuman']) ?>">
                </div>
                <div data-aos="fade-down" class="col-md-6 center-v aos-init">
                    <h3 class="sub-judul about-sub ">Pengumuman</h3>
                    <p><?= $setting['desc_pengumuman'] ?></p>
                </div>
            </div>
        </section>
        <section class="section-mobile-separator">
            <div class="row wrap-div mb-5">
                <div data-aos="fade-down" class="col-md-6 first-div center-v aos-init">
                    <h3 class="sub-judul about-sub">Daftar Ulang</h3>
                    <p><?= $setting['desc_daftar_ulang'] ?></p>
                </div>
                <div data-aos="fade-up" class="col-md-6 text-center second-div center-v aos-init">
                    <h3 class="sub-judul about-sub-mobile text-left">Daftar Ulang</h3>
                    <img class="img-adm" src="<?= base_url('alur/' . $setting['gambar_daftar_ulang']) ?>">
                </div>
            </div>
        </section>
        <section class="section-mobile-separator">
            <div class="row mb-5">
                <div data-aos="fade-up" class="col-md-6 text-center center-v aos-init">
                    <h3 class="sub-judul about-sub-mobile text-left">Melengkapi Berkas</h3>
                    <img class="img-adm" src="<?= base_url('alur/' . $setting['gambar_berkas']) ?>">
                </div>
                <div data-aos="fade-down" class="col-md-6 center-v aos-init">
                    <h3 class="sub-judul about-sub ">Melengkapi Berkas</h3>
                    <p><?= $setting['desc_berkas'] ?></p>
                </div>
            </div>
        </section>
    </section>
</div>
<?= $this->endSection(''); ?>