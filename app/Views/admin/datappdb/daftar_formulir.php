<?php
$db = \Config\Database::connect();

$cs = $db->table('tbl_siswa')
    ->where('status_pendaftaran', '0')
    ->get()->getRowArray();
?>

<?= $this->extend('templates/pt_layout'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Tabel Formulir PPDB
                    <span class="d-block text-muted pt-2 font-size-sm"> Penerimaan Peserta Didik Baru <?= date('Y'); ?> </span>
                </h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom nowrap" mode="datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>No. Daftar</th>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 125px;">Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($ppdb as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['no_pendaftaran'] ?></td>
                            <td><?= $value['nisn'] ?></td>
                            <td><?= $value['nama_siswa'] ?></td>
                            <td class=" dt-center">
                                <button class="btn btn-sm btn-success " data-toggle="modal" data-target="#lihatformulir<?= $value['id_siswa'] ?>">lihat</button>
                                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editformulir<?= $value['id_siswa'] ?>">edit</a>
                                <a class="btn btn-sm btn-danger " data-toggle="modal" data-target="#deletedataformulir<?= $value['id_siswa'] ?>">hapus</a>
                                <a class="btn btn-sm btn-info">print</a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->

    <!-- Modal Lihat formulir-->
    <?php foreach ($ppdb as $key => $value) { ?>
        <div class="modal fade" id="lihatformulir<?= $value['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Formulir <strong><?= $value['nama_siswa'] ?></strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('DataPPDB/detailFormulir/' . $value['id_siswa']) ?>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>Tanggal Pendaftaran</label>
                                <input type="text" class="form-control" disabled="disabled" name="no_pendaftaran" value="<?= $value['tgl_pendaftaran'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Nomor Pendaftaran</label>
                                <input type="text" class="form-control" disabled="disabled" name="no_pendaftaran" value="<?= $value['no_pendaftaran'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>NISN</label>
                                <input type="text" class="form-control " disabled="disabled" name="nisn" value="<?= $value['nisn'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Nama Lengkap </label>
                                <input type="text" class="form-control" name="nama_siswa" disabled="disabled" value="<?= $value['nama_siswa'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>Jenis Kelamin </label>
                                <input type="text" class="form-control" disabled="disabled" name="jenis_kelamin" value="<?= $value['jenis_kelamin'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" disabled="disabled" name="tempat_lahir" value="<?= $value['tempat_lahir'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>Tanggal Lahir </label>
                                <input type="text" class="form-control" disabled="disabled" name="tgl_lahir" value="<?= $value['tgl_lahir'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Alamat Rumah</label>
                                <input type="text" class="form-control" disabled="disabled" name="alamat_rumah" value="<?= $value['alamat_rumah'] ?>" />
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>Nama Ayah </label>
                                <input type="text" class="form-control" disabled="disabled" name="nama_ayah" value="<?= $value['nama_ayah'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Nama Ibu</label>
                                <input type="text" class="form-control" disabled="disabled" name="nama_ibu" value="<?= $value['nama_ibu'] ?>" />
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>Nomor Telepon (Orang Tua)</label>
                                <input type="text" class="form-control" disabled="disabled" name="no_ortu" value="<?= $value['no_ortu'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Nomor Telepon (Peserta Didik)</label>
                                <input type="text" class="form-control" disabled="disabled" name="telepon_siswa" value="<?= $value['telepon_siswa'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>MIN / SD Asal</label>
                                <input type="text" class="form-control" disabled="disabled" name="sekolah_asal" value="<?= $value['sekolah_asal'] ?>" />
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Modal Lihat formulir-->

    <!-- Modal edit formulir-->
    <?php foreach ($ppdb as $key => $value) { ?>
        <div class="modal fade" id="editformulir<?= $value['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Formulir <strong><?= $value['nama_siswa'] ?></strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('DataPPDB/editFormulir/' . $value['id_siswa']) ?>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>Tanggal Pendaftaran</label>
                                <input type="text" class="form-control" disabled name="tgl_pendaftaran" value="<?= $value['tgl_pendaftaran'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Nomor Pendaftaran</label>
                                <input type="text" class="form-control" disabled name="no_pendaftaran" value="<?= $value['no_pendaftaran'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>NISN</label>
                                <input type="text" class="form-control " disabled name="nisn" value="<?= $value['nisn'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Nama Lengkap </label>
                                <input type="text" class="form-control" name="nama_siswa" value="<?= $value['nama_siswa'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>Jenis Kelamin </label>
                                <input type="text" class="form-control" name="jenis_kelamin" value="<?= $value['jenis_kelamin'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="<?= $value['tempat_lahir'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>Tanggal Lahir </label>
                                <input type="text" class="form-control" name="tgl_lahir" value="<?= $value['tgl_lahir'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Alamat Rumah</label>
                                <input type="text" class="form-control" name="alamat_rumah" value="<?= $value['alamat_rumah'] ?>" />
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>Nama Ayah </label>
                                <input type="text" class="form-control" name="nama_ayah" value="<?= $value['nama_ayah'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" value="<?= $value['nama_ibu'] ?>" />
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>Nomor Telepon (Orang Tua)</label>
                                <input type="text" class="form-control" name="no_ortu" value="<?= $value['no_ortu'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label>Nomor Telepon (Peserta Didik)</label>
                                <input type="text" class="form-control" name="telepon_siswa" value="<?= $value['telepon_siswa'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-2">
                                <label>MIN / SD Asal</label>
                                <input type="text" class="form-control" name="sekolah_asal" value="<?= $value['sekolah_asal'] ?>" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger font-weight-bold" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success font-weight-bold">Simpan</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Modal edit formulir-->

    <!-- Modal delete formulir -->
    <?php foreach ($ppdb as $key => $value) { ?>
        <div class="modal fade" id="deletedataformulir<?= $value['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            Apakah Anda Ingin Menghapus <b><?= $value['nama_siswa'] ?></b> ?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Tutup</button>
                        <a class="btn btn-danger font-weight-bold" href="<?= base_url('DataPPDB/deleteDataFormulir/' . $value['id_siswa']) ?>">Hapus</a>
                    </div>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Modal delete formulir -->

    <?= $this->endSection('content'); ?>