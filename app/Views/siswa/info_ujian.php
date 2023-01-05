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
                        <h3 class="card-label text-white">Informasi Ujian PPDB</h3>
                    </div>
                </div>
                <?php if ($ujian) : ?>
                    <div class="card-body">
                        <ul class="mb-10 list-unstyled font-size-lg">
                            <li class="mb-2"><strong>No. Pendaftaran :</strong> <?= $siswa['no_pendaftaran'] ?></li>
                            <li class="mb-2"><strong>Nama Lengkap : </strong><?= $siswa['nama_siswa'] ?></li>
                            <li class="mb-2"><strong>NISN : </strong><?= $siswa['nisn'] ?></li>
                            <li class="mb-2"><strong>Jumlah Soal :</strong> <?= $ujian['jumlah_soal'] ?> Soal</li>
                            <li class="mb-2"><strong>Jenis Ujian :</strong> Pilihan Ganda</li>
                            <li class="mb-2"><strong>Waktu :</strong> <?= $ujian['waktu_ujian'] ?> Menit</li>
                            <li class="mb-2"><strong>Ujian Berakhir :</strong> Pada Tanggal <?= date('d F Y', strtotime($ujian['tgl_selesai'])) ?></li>
                        </ul>
                        <a class="btn btn-light-danger btn-md font-weight-bold mb-5 countdown" id="sisawaktu" style="display: block; pointer-events: none;">
                        </a>
                        <a class="btn btn-light-info btn-md font-weight-bold" style="display: block; pointer-events: none;">
                            Waktu Pengerjaan ujian akan di mulai ketika menekan tombol "Mulai Sekarang"
                        </a>
                    </div>
                    <section></section>
                    <div class="card-footer text-center">
                        <button type="button" class="btn bc-kemenag text-white" data-toggle="modal" data-target="#staticBackdrop">
                            Mulai Mengerjakan Ujian
                        </button>
                    </div>
                <?php else : ?>
                    <div class="card-body">
                        <a class="btn btn-light-danger btn-md font-weight-bold" style="display: block; pointer-events: none;">
                            Pengengerjaan ujian belum dimulai/telah berakhir. Hubungi panitia untuk informasi lebih lanjut.
                        </a>
                    </div>
                    <div class="card-footer text-center">
                        <a href="<?= base_url('Siswa/index'); ?>" class="btn btn-secondary  font-weight-bold">Kembali ke halaman utama</a>
                    </div>
                <?php endif; ?>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Card-->
    </div>

    <!-- begin modal-->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Mulai Mengerjakan Ujian
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin memulai mengerjakan ujian ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">
                        Kembali
                    </button>
                    <a href="<?= base_url('Siswa/Ujian'); ?>">
                        <button type="button" class="btn bc-kemenag text-white font-weight-bold">
                            Mulai Sekarang
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--end modal-->
    <?= $this->endSection(''); ?>

    <?= $this->section('script'); ?>

    <script>
        const tanggalTujuan = new Date("<?= $ujian['tgl_selesai'] ?? '' ?>").getTime();

        const hitungMundur = setInterval(function() {
            const sekarang = new Date().getTime();
            const selisih = tanggalTujuan - sekarang;

            const hari = Math.floor(selisih / (1000 * 60 * 60 * 24));
            const jam = Math.floor(selisih % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            const menit = Math.floor(selisih % (1000 * 60 * 60) / (1000 * 60));
            const detik = Math.floor(selisih % (1000 * 60) / 1000);

            const sisawaktu = document.getElementById('sisawaktu');
            sisawaktu.innerHTML = ' Waktu yang tersisa untuk mengikuti ujian ' + hari + ' hari ' + jam + ' jam ' + menit + ' menit ' + detik + ' detik ';
        }, 1000);
    </script>
    <?= $this->endSection(''); ?>