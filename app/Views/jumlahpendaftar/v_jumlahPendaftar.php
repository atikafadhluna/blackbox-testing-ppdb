<?= $this->extend('templates/pt_layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Tabel Pendaftar
                    <span class="d-block text-muted pt-2 font-size-sm"> Penerimaan Peserta Didik Baru <?= date('Y'); ?> </span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="<?= base_url('Panitia/cetakjmlPendaftar'); ?>" target="_blank">
                    <button type="button" class="btn bc-kemenag font-weight-bolder mr-2">
                        <i class="flaticon-download-1 text-white"></i>
                        <span class="text-white">Download data</span>
                    </button>
                </a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom nowrap" mode="datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>No. Pendaftaran</th>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th>No. Telepon (WA)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($siswa as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['no_pendaftaran'] ?></td>
                            <td><?= $value['nisn'] ?></td>
                            <td><?= $value['nama_siswa'] ?></td>
                            <td><?= $value['telepon_siswa'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>

    <!--end::Card-->

    <?= $this->endSection(''); ?>

    <?= $this->section('script'); ?>
    <script>
        $("[mode='datatable']").DataTable({
            scrollX: true,

        })
    </script>
    <?= $this->endSection('script'); ?>