<?php
$db = \Config\Database::connect();

$setting = $db->table('tbl_web')
    ->where('id_setting', '1')
    ->get()->getRowArray();
?>

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
                        <h3 class="card-label text-white">Pengumuman PPDB</h3>
                    </div>
                </div>
                <?php if ($opsinilai == null) { ?>
                    <!-- Pengumuman kalau tidak pakai ujian online -->
                    <?php if ($pengumuman) : ?>
                        <?php if ($nilaimanual['nilai_akhir'] == 0.00) { ?>
                            <div class="card-body">
                                <a class="btn btn-info btn-md font-weight-bold text-white" style="display: block; pointer-events: none;">
                                    Mohon maaf nilai Anda <strong>"belum di input panitia"</strong> silahkan hubungi panitia PPDB
                                </a>
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?= base_url('Siswa/index'); ?>" class="btn btn-secondary  font-weight-bold">Kembali ke halaman utama</a>
                            </div>
                        <?php } else if ($nilaimanual['nilai_akhir'] >= 60) {  ?>
                            <div class="card-body">
                                <a class="btn btn-success btn-md font-weight-bold text-white" style="display: block; pointer-events: none;">
                                    Selamat Anda dinyatakan <strong>"LULUS"</strong> silahkan lengkapi berkas pendaftaran ulang
                                </a>
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?= base_url('Siswa/DaftarUlang'); ?>" target="_blank" class="btn bc-kemenag text-white font-weight-bold">Daftar Ulang Sekarang</a>
                            </div>
                        <?php  } else { ?>
                            <div class="card-body">
                                <a class="btn btn-danger btn-md font-weight-bold text-white" style="display: block; pointer-events: none;">
                                    Maaf Anda dinyatakan <strong>"TIDAK LULUS"</strong> pada MTsN 4 Aceh Besar
                                </a>
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?= base_url('Siswa/index'); ?>" class="btn btn-secondary  font-weight-bold">Kembali ke halaman utama</a>
                            </div>
                        <?php } ?>
                    <?php else : ?>
                        <div class="card-body">
                            <a class="btn btn-info btn-md font-weight-bold" style="display: block; pointer-events: none;">
                                Pengumuman kelulusan akan diumumkan pada tanggal <strong><?= date('d F Y', strtotime($ta['tanggal_pengumuman'])) ?></strong>
                            </a>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?= base_url('Siswa/index'); ?>" class="btn btn-secondary  font-weight-bold">Kembali ke halaman utama</a>
                        </div>
                    <?php endif; ?>
                    <!-- Pengumuman kalau tidak pakai ujian online -->
                <?php } else { ?>
                    <!-- Pengumuman kalau pakai ujian online -->
                    <?php if ($pengumuman) : ?>
                        <?php if (!$nilai) { ?>
                            <div class="card-body">
                                <a class="btn btn-info btn-md font-weight-bold text-white" style="display: block; pointer-events: none;">
                                    Mohon maaf nilai Anda <strong>"belum di input panitia"</strong> silahkan hubungi panitia PPDB
                                </a>
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?= base_url('Siswa/index'); ?>" class="btn btn-secondary  font-weight-bold">Kembali ke halaman utama</a>
                            </div>
                        <?php } else if ($nilai['nilai_akhir'] >= 60) {  ?>
                            <div class="card-body">
                                <a class="btn btn-success btn-md font-weight-bold text-white" style="display: block; pointer-events: none;">
                                    Selamat Anda dinyatakan <strong>"LULUS"</strong> silahkan lengkapi berkas pendaftaran ulang
                                </a>
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?= base_url('Siswa/DaftarUlang'); ?>" target="_blank" class="btn bc-kemenag text-white font-weight-bold">Daftar Ulang Sekarang</a>
                            </div>
                        <?php  } else { ?>
                            <div class="card-body">
                                <a class="btn btn-danger btn-md font-weight-bold text-white" style="display: block; pointer-events: none;">
                                    Maaf Anda dinyatakan <strong>"TIDAK LULUS"</strong> pada MTsN 4 Aceh Besar
                                </a>
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?= base_url('Siswa/index'); ?>" class="btn btn-secondary  font-weight-bold">Kembali ke halaman utama</a>
                            </div>
                        <?php } ?>
                    <?php else : ?>
                        <div class="card-body">
                            <a class="btn btn-info btn-md font-weight-bold" style="display: block; pointer-events: none;">
                                Pengumuman belum dimulai/telah berakhir. Hubungi panitia untuk informasi lebih lanjut. Pengumuman kelulusan akan diumumkan pada tanggal <strong><?= date('d F Y', strtotime($ta['tanggal_pengumuman'])) ?></strong> sampai tanggal <strong><?= date('d F Y', strtotime($ta['tanggal_selesai_daftar_ulang'])) ?></strong>
                            </a>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?= base_url('Siswa/index'); ?>" class="btn btn-secondary  font-weight-bold">Kembali ke halaman utama</a>
                        </div>
                    <?php endif; ?>
                <?php } ?>
                <!-- Pengumuman kalau pakai ujian online -->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Card-->
    </div>

    <?= $this->endSection(''); ?>