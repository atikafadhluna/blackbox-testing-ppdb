<?= $this->extend('templates/home_layout'); ?>

<?= $this->section('content'); ?>
<section id="jumbotronSection">
    <div class="jumbotron jumbotron-fluid bg-jumbotron bg-jumbotron-2 pos-rel">
        <div class="container info-jumbotron  center-v">
            <!-- <h1 class="display-4 text-center">KONTAK KAMI</h1> -->
            <div class="row center" style="width: 100%">
                <div class="col-md-12 text-center">
                    <a target="_blank" href="https://api.whatsapp.com/send/?phone=62895321146422&text=Assalamualaikum,+saya+ingin+menanyakan+tentang+penerimaan+peserta+didik+baru+%3A&type=phone_number&app_absent=0" class="btn btn-warning btn-lg mb-4"><i class="fab fa-whatsapp"></i> Hubungi Kami</a>
                    <p class=" text-kemenag">Klik tombol di atas untuk menghubungi kami via WhatsApp</p>
                </div>
            </div>

            <div class="card kontak-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <h4 class="mb-3"> <i class="fa fa-building mr-3"></i>Alamat</h4>
                            <p><?= $setting['nama_sekolah'] ?>,<br><?= $setting['alamat_lengkap'] ?></p>
                        </div>
                        <div class="col-md-4 mb-4">
                            <h4 class="mb-3"> <i class="fas fa-mail-bulk mr-3"></i>Email</h4>
                            <p><a href="mailto:mtsn4acehbesar@gmail.com" style="color: inherit;"><?= $setting['email'] ?></a></p>
                        </div>
                        <div class="col-md-4 mb-4">
                            <h4 class="mb-3"> <i class="fas fa-phone-square-alt mr-3"></i>No.Telepon</h4>
                            <p><a href="tel:+6281260741115" style="color: inherit;"><?= $setting['telepon_sekolah'] ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contentSection">
    <div class="container">
        <section id="hubungiKami" class="space-subHeader">
            <div class="row">
                <div class="col-md-12 text-center">

                </div>
            </div>
        </section>
    </div>
</section>
<?= $this->endSection(''); ?>