<?php
$db = \Config\Database::connect();

$setting = $db->table('tbl_web')
    ->where('id_setting', '1')
    ->get()->getRowArray();
?>

<?= $this->extend('templates/cs_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <?php
    if (session()->getFlashdata('add')) {
        echo '<div class="alert alert-custom alert-light-success fade show" role="alert">';
        echo '<div class="alert-text text-dark">';
        echo session()->getFlashdata('add');
        echo '</div>';
        echo '<div class="alert-close icon-dark">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true"><i class="ki ki-close"></i>';
        echo '</span>';
        echo '</button>';
        echo '</div>';
        echo '</div>';
    }

    if (session()->getFlashdata('edit')) {
        echo '<div class="alert alert-custom alert-light-warning fade show" role="alert">';
        echo '<div class="alert-text text-dark">';
        echo session()->getFlashdata('edit');
        echo '</div>';
        echo '<div class="alert-close icon-dark">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true"><i class="ki ki-close"></i>';
        echo '</span>';
        echo '</button>';
        echo '</div>';
        echo '</div>';
    }
    ?>
    <div class="row">
        <!--begin::Card-->
        <div class="col-12">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header" style=" background-color: #307F44;">
                    <div class="card-title">
                        <h3 class="card-label text-white">Berkas Pendaftaran Ulang PPDB</h3>
                    </div>
                </div>
                <div class="card-body">
                    <a class="btn btn-light-info btn-md font-weight-bold mb-5" style="display: block; pointer-events: none;">
                        Terimakasih telah melakukan daftar ulang
                    </a>
                    <h4><strong>PENTING !!</strong></h4>
                    <h6>Berkas pendaftaran ulang diserahkan kepada panitia pada tanggal <strong>12 desember 2022</strong></h6>
                    <ul>
                        <li>Pas Photo harus dalam bentuk <strong>image</strong>(foto)</li>
                        <li>Pas Photo tidak boleh lebih dari <strong>1024 KB</strong></li>
                    </ul>
                    <div>
                        <a href="<?= base_url('Siswa/cetakSurat'); ?>">
                            <button class="btn btn-sm bc-kemenag text-white">Download Surat Pernyataan</button>
                        </a>
                    </div>
                    <p class="text-dark-50 mt-3">
                        note : berkas dimasukkan kedalam map berwarna biru (laki-laki) dan berwarna pink (perempuan)
                    </p>
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