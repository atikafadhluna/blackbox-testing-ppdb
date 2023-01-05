<?php
$db = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();
?>

<?= $this->extend('templates/pt_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">


    <!--begin::Card-->

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
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Bank Soal
                    <span class="d-block text-muted pt-2 font-size-sm">PPDB Tahun Ajaran <?= $ta['ta'] ?> </span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <a href="<?= base_url('Panitia/tambahSoal') ?>" type="button" class="btn btn-sm bc-kemenag text-white font-weight-bolder" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fas fa-plus text-white icon-md"></i>
                        Tambah
                    </a>
                </div>
                <!--end::Dropdown-->
                <!--begin::Button-->
                <a href="#">
                    <button type="button" class="btn btn-sm btn-warning font-weight-bolder mr-2" data-toggle="modal" data-target="#unggah_soal">
                        <i class="fa fas fa-upload icon-md"></i>
                        Import
                    </button>
                </a>

                <!--end::Button-->
                <!--begin::Button-->

                <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-download text-white icon-md"></i>Unduh</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= base_url('Panitia/cetakexcel') ?>">
                            <i class="far fa-file-excel text-success icon-md pr-5"></i>
                            Excel
                        </a>
                        <a class="dropdown-item" href="<?= base_url('Panitia/cetakpdf') ?>" target="_blank">
                            <i class="far fa-file-pdf text-danger icon-md pr-5"></i>
                            PDF
                        </a>
                    </div>
                </div>


                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <table class="table table-separate table-head-custom nowrap" mode="datatable" style="width:100%">

                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Soal</th>

                        <th data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span width="80px">Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $no = 1 + (10 * ($page - 1));
                    foreach ($soal as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?= enterAfterByWord($value['text_soal'], 10) ?>
                            </td>

                            <td class=" dt-center">

                                <button type="button" class="btn btn-sm btn-light-info btn-text-white btn-icon mr-2" data-target="#detail_soal<?= $value['id_soal'] ?>" data-toggle="modal">
                                    <i class="fas fa-search" mr-2></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-light-warning btn-text-white btn-icon mr-2" data-target="#edit_soal<?= $value['id_soal'] ?>" data-toggle="modal">
                                    <i class="fa far fa-edit" mr-2></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-light-danger btn-text-white btn-icon mr-2" data-target="#delete_soal<?= $value['id_soal'] ?>" data-toggle="modal">
                                    <i class="fa fas fa-trash" mr-2></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!--end: Datatable-->
            <!--end: Datatable-->
        </div>
    </div>

    <!--end::Card-->

    <!-- begin modal import-->
    <div class="modal fade" id="unggah_soal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Import Soal PPDB
                    </h5>
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <button type="button" class="close pl-10" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>

                        <a class="btn btn-sm btn-warning font-weight-bold text-right text-white" href="<?= base_url('Format_Soal.xlsx') ?>">
                            <i class="fa fas fa-download icon-md text-white"></i><span class="text-white">Format Soal PPDB</span>
                        </a>
                    </div>
                </div>
                <form action="<?= site_url('Panitia/import') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <label>Import Soal</label>
                        <input type="file" class="form-control form-control-lg  form-control-solid" name="file_excel">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">
                            Kembali
                        </button>
                        <button type="submit" class="btn bc-kemenag text-white ">
                            Import Soal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end modal import-->

    <!-- begin modal detail-soal-->
    <?php foreach ($soal as $key => $value) { ?>
        <div class="modal fade" id="detail_soal<?= $value['id_soal'] ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Detail Soal
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b example example-compact">
                            <!--begin::Form-->

                            <form>
                                <div class="card-body">
                                    <div class="d-flex flex-column flex-grow-1 mb-2">
                                        <span class="font-weight-bold font-size-h5 mb-1">Teks Soal</span>
                                        <span class="font-weight-normal"><?= $value['text_soal'] ?></span>
                                    </div>
                                    <div class="separator separator-dashed my-5"></div>
                                    <div class="d-flex flex-column flex-grow-1 mb-2">
                                        <span class="font-weight-bold font-size-h5 mb-1">Pilihan A</span>
                                        <span class="font-weight-normal"><?= $value['opsi_a'] ?></span>
                                    </div>
                                    <div class="d-flex flex-column flex-grow-1 mb-2">
                                        <span class="font-weight-bold font-size-h5 mb-1">Pilihan B</span>
                                        <span class="font-weight-normal"><?= $value['opsi_b'] ?></span>
                                    </div>
                                    <div class="d-flex flex-column flex-grow-1 mb-2">
                                        <span class="font-weight-bold font-size-h5 mb-1">Pilihan C</span>
                                        <span class="font-weight-normal"><?= $value['opsi_c'] ?></span>
                                    </div>
                                    <div class="d-flex flex-column flex-grow-1 mb-2">
                                        <span class="font-weight-bold font-size-h5 mb-1">Pilihan D</span>
                                        <span class="font-weight-normal"><?= $value['opsi_d'] ?></span>
                                    </div>
                                    <div class="d-flex flex-column flex-grow-1 mb-2">
                                        <span class="font-weight-bold font-size-h5 mb-1 text-primary">Kunci Jawaban</span>
                                        <span class="font-weight-normal"><?= $value['kunci_jawaban'] ?></span>
                                    </div>
                                    <div class="separator separator-dashed my-5"></div>
                                    <div class="d-flex flex-column flex-grow-1 mb-2">
                                        <div>
                                            <span class="font-weight-bold ">tanggal dibuat :</span>
                                            <span> <?= $value['tgl_dibuat'] ?></span>
                                        </div>

                                        <div>
                                            <span class="font-weight-bold">tanggal diupdate : </span>
                                            <span><?= $value['tgl_edit'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!--end modal edit-soal-->


    <!-- begin modal edit-soal-->
    <?php foreach ($soal as $key => $value) { ?>
        <div class="modal fade" id="edit_soal<?= $value['id_soal'] ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Edit Soal
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b example example-compact">
                            <!--begin::Form-->
                            <?php echo form_open_multipart('Panitia/editSoal/' . $value['id_soal']) ?>
                            <form>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-form-label text-right font-size-h6 font-weight-normal col-lg-3 col-sm-12 d-flex justify-content-between">Text Soal</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <textarea class="summernote" id="kt_summernote_1" name="text_soal"><?= $value['text_soal'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label class="col-form-label text-right font-size-h6 font-weight-normal col-lg-3 col-sm-12 d-flex justify-content-between">Pilihan A</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <textarea class="summernote" id="kt_summernote_1" name="opsi_a"><?= $value['opsi_a'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label class="col-form-label text-right font-size-h6 font-weight-normal col-lg-3 col-sm-12 d-flex justify-content-between">Pilihan B</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <textarea class="summernote" id="kt_summernote_1" name="opsi_b"><?= $value['opsi_b'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label class="col-form-label text-right font-size-h6 font-weight-normal col-lg-3 col-sm-12 d-flex justify-content-between">Pilihan C</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <textarea class="summernote" id="kt_summernote_1" name="opsi_c"><?= $value['opsi_c'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label class="col-form-label text-right font-size-h6 font-weight-normal col-lg-3 col-sm-12 d-flex justify-content-between">Pilihan D</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <textarea class="summernote" id="kt_summernote_1" name="opsi_d"><?= $value['opsi_d'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label class="col-form-label text-right font-size-h6 font-weight-normal col-lg-3 col-sm-12 d-flex justify-content-between">Kunci Jawaban</label>
                                        <select class="form-control mb-3 col-lg-9 col-md-9 col-sm-12" id="exampleSelect1" name="kunci_jawaban" <?= $value['kunci_jawaban'] ?>>
                                            <option value="">--Pilih--</option>
                                            <option value="A" <?= $value['kunci_jawaban'] == 'A' ? 'selected' : '' ?>>A</option>
                                            <option value="B" <?= $value['kunci_jawaban'] == 'B' ? 'selected' : '' ?>>B</option>
                                            <option value="C" <?= $value['kunci_jawaban'] == 'C' ? 'selected' : '' ?>>C</option>
                                            <option value="D" <?= $value['kunci_jawaban'] == 'D' ? 'selected' : '' ?>>D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" modal-footer">
                                    <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">
                                        Kembali
                                    </button>
                                    <a href="">
                                        <button type="submit" class="btn bc-kemenag text-white font-weight-bold">
                                            Simpan
                                        </button>
                                    </a>
                                </div>
                            </form>
                            <?php echo form_close() ?>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!--end modal edit-soal-->

    <!-- Modal delete Soal -->
    <?php foreach ($soal as $key => $value) { ?>
        <div class="modal fade" id="delete_soal<?= $value['id_soal'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Soal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            Apakah Anda Ingin Menghapus <b><?= $value['text_soal'] ?></b> ?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger font-weight-bold" href="<?= base_url('Panitia/deleteSoal/' . $value['id_soal']) ?>">Hapus</a>
                    </div>
                    <!--end::Form-->


                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Modal delete Soal -->

    <?= $this->endSection('content'); ?>



    <?= $this->section('script'); ?>
    <script>
        $("[mode='datatable']").DataTable({
            scrollX: true,

        })
    </script>
    <?= $this->endSection('script'); ?>