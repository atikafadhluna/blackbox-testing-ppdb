<?= $this->extend('templates/cs_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <!--begin::Card-->
        <div class="col-12">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header" style=" background-color: #307F44;">
                    <div class="card-title">
                        <h3 class="card-label text-white">Hasil Ujian PPDB</h3>
                    </div>
                </div>
                <div class="card-body">
                    <a class="btn btn-info btn-md font-weight-bold" style="display: block; pointer-events: none;">
                        Hasil ujian akan diumumkan pada tanggal 12 Januari 2023. Terimakasih telah mengikuti ujian PPDB
                    </a>
                </div>
                <div class="card-footer text-center">
                    <a href="<?= base_url('Siswa/index'); ?>" class="btn btn-secondary  font-weight-bold">Kembali ke halaman utama</a>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Card-->
    </div>

    <?= $this->endSection(''); ?>