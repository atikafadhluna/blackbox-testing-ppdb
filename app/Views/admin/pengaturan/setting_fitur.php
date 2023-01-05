<?= $this->extend('templates/adm_layout'); ?>

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

    if (session()->getFlashdata('delete')) {
        echo '<div class="alert alert-custom alert-light-danger fade show" role="alert">';
        echo '<div class="alert-text text-dark">';
        echo session()->getFlashdata('delete');
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

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Setting Fitur
                    <span class="d-block text-muted pt-2 font-size-sm"> Penerimaan Peserta Didik Baru MTsN 4 Aceh Besar </span>
                </h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom nowrap" mode="datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fitur</th>
                        <th>Status</th>
                        <th>Aktif/Non Aktif</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ujian</td>
                        <td><?= ($setting['status_ujian'] == 1) ? '<span class="label font-weight-bold label-lg label-light-success label-inline">Aktif</span>' : '<span class="label font-weight-bold label-lg label-light-danger label-inline">Tidak Aktif</span>' ?></td>
                        <td>
                            <?php if ($setting['status_ujian'] == 1) { ?>
                                <a href="<?= base_url('SettingFitur/statusNonaktif/' . $setting['id_setting']) ?>" class="btn btn-danger btn-sm">
                                    Nonaktifkan
                                </a>
                            <?php } else { ?>
                                <a href="<?= base_url('SettingFitur/statusAktif/' . $setting['id_setting']) ?>" class="btn btn-success btn-sm">
                                    Aktifkan
                                </a>
                            <?php } ?>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Kartu Pendaftaran</td>
                        <td><?= ($setting['status_dformulir'] == 1) ? '<span class="label font-weight-bold label-lg label-light-success label-inline">Aktif</span>' : '<span class="label font-weight-bold label-lg label-light-danger label-inline">Tidak Aktif</span>' ?></td>
                        <td>
                            <?php if ($setting['status_dformulir'] == 1) { ?>
                                <a href="<?= base_url('SettingFitur/statusNonaktifFormulir/' . $setting['id_setting']) ?>" class="btn btn-danger btn-sm">
                                    Nonaktifkan
                                </a>
                            <?php } else { ?>
                                <a href="<?= base_url('SettingFitur/statusAktifFormulir/' . $setting['id_setting']) ?>" class="btn btn-success btn-sm">
                                    Aktifkan
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->

    <?= $this->endSection('content'); ?>

    <?= $this->section('script'); ?>
    <script>
        $("[mode='datatable']").DataTable({
            scrollX: true,

        })
    </script>
    <?= $this->endSection('script'); ?>