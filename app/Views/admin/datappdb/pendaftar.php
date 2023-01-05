<?= $this->extend('templates/adm_layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <?php
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
                <h3 class="card-label">Tabel Pendaftar
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
                        <th>No. Pendaftaran</th>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th>No. Telepon (WA)</th>
                        <th>Formulir</th>
                        <th>Daftar Ulang</th>
                        <th data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 125px;">Action</span></th>
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
                            <td>
                                <?php if ($value['status_pendaftaran'] == 1) { ?>
                                    <a href="" data-toggle="modal" data-target="#lihatdataformulir<?= $value['id_siswa'] ?>">
                                        <span class="label font-weight-bold label-lg label-light-info label-inline">lihat data</span>
                                    </a>
                                <?php } else { ?>
                                    <span class="label font-weight-bold label-lg label-light-danger label-inline">belum ada</span>
                                <?php } ?>
                            </td>
                            <td><?php if ($value['daftar_ulang'] == 1) { ?>
                                    <a href="" data-toggle="modal" data-target="#lihatdatabiodata<?= $value['id_siswa'] ?>">
                                        <span class="label font-weight-bold label-lg label-light-info label-inline">lihat data</span>
                                    </a>
                                <?php } else { ?>
                                    <span class="label font-weight-bold label-lg label-light-danger label-inline">menunggu</span>
                                <?php } ?>

                            </td>
                            <td class=" dt-center">
                                <button type="button" class="btn btn-sm btn-light-warning btn-text-white btn-icon mr-2 " data-toggle="modal" data-target="#edit<?= $value['id_siswa'] ?>">
                                    <i class="fa far fa-edit" mr-2=""></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-light-danger btn-text-white btn-icon mr-2 " data-toggle="modal" data-target="#delete<?= $value['id_siswa'] ?>">
                                    <i class="fa fas fa-trash" mr-2=""></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>

    <!--end::Card-->

    <!-- Modal delete pendaftar -->
    <?php foreach ($siswa as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Pendaftar</h5>
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
                        <a class="btn btn-danger font-weight-bold" href="<?= base_url('DataPPDB/deleteData/' . $value['id_siswa']) ?>">Hapus</a>
                    </div>
                    <!--end::Form-->


                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Modal delete pendaftar -->


    <!-- Modal lihat data biodata -->
    <?php foreach ($siswa as $key => $value) { ?>
        <div class="modal fade" id="lihatdatabiodata<?= $value['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informasi Lengkap <strong><?= $value['nama_siswa'] ?></strong></h5>
                        <div class="card-toolbar">
                            <a href="<?= base_url('DataPPDB/exportBiodataPDF'); ?>" class="mr-10">
                                <button type="button" class="btn bc-kemenag btn-sm text-white">
                                    Download Biodata
                                </button>
                            </a>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="card card-custom gutter-bs">
                            <!--Begin::Header-->
                            <div class="card-header card-header-tabs-line">
                                <div class="card-toolbar">
                                    <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                                        <li class="nav-item mr-3">
                                            <a class="nav-link active" data-toggle="tab" href="#biodata">
                                                <span class="nav-icon mr-2">
                                                    <span class="svg-icon mr-3">
                                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Home.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="nav-text font-weight-bold">Biodata</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#berkas">
                                                <span class="nav-icon mr-2">
                                                    <span class="svg-icon mr-3">
                                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Address-card.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="nav-text font-weight-bold">Berkas</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--Begin::Body-->
                            <div class="card-body px-0">
                                <div class="tab-content">
                                    <!--begin::Tab Content-->
                                    <div class="tab-pane active" id="biodata" role="tabpanel">
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <span class="label font-weight-bold label-lg label-info label-inline">Pendaftaran</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Tanggal Pendaftaran</label>
                                                <?= ($value['tgl_pendaftaran'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . date('d F Y', strtotime($value['tgl_pendaftaran'])) . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Nomor Pendaftaran</label>
                                                <?= ($value['no_pendaftaran'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_pendaftaran'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <span class="label font-weight-bold label-lg label-info label-inline">Identitas Siswa</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Nama Lengkap</label>
                                                <?= ($value['nama_siswa'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['nama_siswa'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>NISN</label>
                                                <?= ($value['nisn'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['nisn'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Jenis Kelamin</label>
                                                <?= ($value['jenis_kelamin'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['jenis_kelamin'] . '</p>' ?>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Tempat Lahir</label>
                                                <?= ($value['tempat_lahir'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['tempat_lahir'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Tanggal Lahir</label>
                                                <?= ($value['tgl_lahir'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . date('d F Y', strtotime($value['tgl_lahir'])) . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Agama</label>
                                                <?= ($value['agama'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['agama'] . '</p>' ?>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>No. KTP/NIK</label>
                                                <?= ($value['no_ktp_siswa'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_ktp_siswa'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Anak Ke</label>
                                                <?= ($value['anak_ke'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['anak_ke'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Jumlah Saudara Kandung</label>
                                                <?= ($value['jml_saudara'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['jml_saudara'] . '</p>' ?>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Status Yatim/Piatu/Yatim Piatu</label>
                                                <?= ($value['status'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['status'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Golongan Darah</label>
                                                <?= ($value['gol_darah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['gol_darah'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Kegemaran</label>
                                                <?= ($value['kegemaran'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['kegemaran'] . '</p>' ?>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Nomor Telepon (Peserta Didik)</label>
                                                <?= ($value['telepon_siswa'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['telepon_siswa'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                            </div>
                                            <div class="col-4">
                                            </div>
                                        </div>

                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <span class="label font-weight-bold label-lg label-info label-inline">Keterangan Tempat Tinggal</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Desa/Gampong</label>
                                                <?= ($value['desa'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['desa'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Kecamatan</label>
                                                <?= ($value['kecamatan'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['kecamatan'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Kabupaten</label>
                                                <?= ($value['kabupaten'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['kabupaten'] . '</p>' ?>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Provinsi</label>
                                                <?= ($value['provinsi'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['provinsi'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Tinggal Dengan</label>
                                                <?= ($value['tinggal_dgn'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['tinggal_dgn'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Jarak Tempat Tinggal Ke Sekolah</label>
                                                <?= ($value['jarak'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['jarak'] . '</p>' ?>
                                            </div>
                                        </div>

                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <span class="label font-weight-bold label-lg label-info label-inline">Riwayat Pendidikan Siswa</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Lulus Dari / Nama Sekolah</label>
                                                <?= ($value['sekolah_asal'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['sekolah_asal'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>
                                                    Nomor STTB</label>
                                                <?= ($value['no_sttb'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_sttb'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Lama Belajar</label>
                                                <?= ($value['lama_belajar'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['lama_belajar'] . '</p>' ?>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Nomor Ujian Nasional</label>
                                                <?= ($value['no_un'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_un'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                            </div>
                                            <div class="col-4">
                                            </div>
                                        </div>

                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <span class="label font-weight-bold label-lg label-info label-inline">Identitas Orang Tua/Wali</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <span class="label font-weight-bold label-md label-info label-inline">Ayah</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Nama</label>
                                                <?= ($value['nama_ayah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['nama_ayah'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Tempat Lahir</label>
                                                <?= ($value['tempat_lahir_ayah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['tempat_lahir_ayah'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Tanggal Lahir</label>
                                                <?= ($value['tgl_lahir_ayah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['tgl_lahir_ayah'] . '</p>' ?>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Pendidikan</label>
                                                <?= ($value['pendidikan_ayah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['pendidikan_ayah'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Pekerjaan</label>
                                                <?= ($value['pekerjaan_ayah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['pekerjaan_ayah'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Penghasilan Perbulan</label>
                                                <?= ($value['penghasilan_ayah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['penghasilan_ayah'] . '</p>' ?>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Alamat Rumah</label>
                                                <?= ($value['alamat_ayah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['alamat_ayah'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>No. KK</label>
                                                <?= ($value['no_kk_ayah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_kk_ayah'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>No. KTP/NIK</label>
                                                <?= ($value['no_ktp_ayah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_ktp_ayah'] . '</p>' ?>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Nomor Telepon/HP</label>
                                                <?= ($value['no_hp_ayah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_hp_ayah'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Masih Hidup/Meninggal Dunia </label>
                                                <?= ($value['status_ayah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['status_ayah'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <span class="label font-weight-bold label-md label-info label-inline">Ibu</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Nama</label>
                                                <?= ($value['nama_ibu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['nama_ibu'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Tempat Lahir</label>
                                                <?= ($value['tempat_lahir_ibu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['tempat_lahir_ibu'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Tanggal Lahir</label>
                                                <?= ($value['tgl_lahir_ibu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['tgl_lahir_ibu'] . '</p>' ?>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Pendidikan</label>
                                                <?= ($value['pendidikan_ibu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['pendidikan_ibu'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Pekerjaan</label>
                                                <?= ($value['pekerjaan_ibu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['pekerjaan_ibu'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Penghasilan Perbulan</label>
                                                <?= ($value['penghasilan_ibu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['penghasilan_ibu'] . '</p>' ?>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Alamat Rumah</label>
                                                <?= ($value['alamat_ibu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['alamat_ibu'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>No. KK</label>
                                                <?= ($value['no_kk_ibu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_kk_ibu'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>No. KTP/NIK</label>
                                                <?= ($value['no_ktp_ibu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_ktp_ibu'] . '</p>' ?>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Nomor Telepon/HP</label>
                                                <?= ($value['no_hp_ibu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_hp_ibu'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Masih Hidup/Meninggal Dunia </label>
                                                <?= ($value['status_ibu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['status_ibu'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                            </div>
                                        </div>

                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <span class="label font-weight-bold label-xl label-info label-inline">Keterangan Bantuan Sosial</span>
                                            </div>
                                        </div>
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-4">
                                                <label>Kartu yang dimiliki</label>
                                                <?= ($value['kartu_sosial'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['kartu_sosial'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                                <label>Nomor Kartu</label>
                                                <?= ($value['no_kartu_sosial'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_kartu_sosial'] . '</p>' ?>
                                            </div>
                                            <div class="col-4">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tab Content-->
                                    <!--begin::Tab Content-->
                                    <div class="tab-pane" id="berkas" role="tabpanel">
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-6">
                                                <label class="font-weight-bolder">Pas Photo(3X4) Latar Biru (png, jpeg, jpg)</label>
                                                <div class="separator separator-dashed my-5"></div>
                                                <div class="mb-5">
                                                    <img src="<?= base_url('pas_photo/' . $value['pas_photo']) ?>" width="250px" height="250px" id="gambar_load">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tab Content-->
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Modal lihat data biodata -->

    <!-- Modal lihat data formulir -->
    <?php foreach ($siswa as $key => $value) { ?>
        <div class="modal fade" id="lihatdataformulir<?= $value['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informasi Lengkap <strong><?= $value['nama_siswa'] ?></strong></h5>
                        <div class="card-toolbar">
                            <a href="<?= base_url('DataPPDB/exportFormulirPDF/' . $value['id_siswa']); ?>" class="mr-5">
                                <button type="button" class="btn bc-kemenag btn-sm text-white">
                                    Formulir Pendaftaran
                                </button>
                            </a>
                            <a href="<?= base_url('DataPPDB/kartuPendaftaran/' . $value['id_siswa']); ?>" class="mr-10">
                                <button type="button" class="btn bc-kemenag btn-sm text-white">
                                    Kartu Pendaftaran
                                </button>
                            </a>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="card card-custom gutter-bs">

                            <!--Begin::Body-->
                            <div class="card-body px-0">
                                <div class="form-group row pl-5 pr-5">
                                    <div class="col-4">
                                        <span class="label font-weight-bold label-lg label-info label-inline">Pendaftaran</span>
                                    </div>
                                </div>
                                <div class="form-group row pl-5 pr-5">
                                    <div class="col-4">
                                        <label>Tanggal Pendaftaran</label>
                                        <?= ($value['tgl_pendaftaran'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' .  date('d F Y', strtotime($value['tgl_pendaftaran'])) . '</p>' ?>
                                    </div>
                                    <div class="col-4">
                                        <label>Nomor Pendaftaran</label>
                                        <?= ($value['no_pendaftaran'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_pendaftaran'] . '</p>' ?>
                                    </div>
                                    <div class="col-4">
                                    </div>
                                </div>
                                <div class="form-group row pl-5 pr-5">
                                    <div class="col-4">
                                        <span class="label font-weight-bold label-lg label-info label-inline">Data Formulir</span>
                                    </div>
                                </div>
                                <div class="form-group row pl-5 pr-5">
                                    <div class="col-4">
                                        <label>Nama Lengkap</label>
                                        <?= ($value['nama_siswa'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['nama_siswa'] . '</p>' ?>
                                    </div>
                                    <div class="col-4">
                                        <label>NISN</label>
                                        <?= ($value['nisn'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['nisn'] . '</p>' ?>
                                    </div>
                                    <div class="col-4">
                                        <label>Jenis Kelamin</label>
                                        <?= ($value['jenis_kelamin'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['jenis_kelamin'] . '</p>' ?>
                                    </div>
                                </div>
                                <div class="form-group row pl-5 pr-5">
                                    <div class="col-4">
                                        <label>Tempat Lahir</label>
                                        <?= ($value['tempat_lahir'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['tempat_lahir'] . '</p>' ?>
                                    </div>
                                    <div class="col-4">
                                        <label>Tanggal Lahir</label>
                                        <?= ($value['tgl_lahir'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . date('d F Y', strtotime($value['tgl_lahir'])) . '</p>' ?>
                                    </div>
                                    <div class="col-4">
                                        <label>Alamat Rumah</label>
                                        <?= ($value['alamat_rumah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['alamat_rumah'] . '</p>' ?>
                                    </div>
                                </div>
                                <div class="form-group row pl-5 pr-5">
                                    <div class="col-4">
                                        <label>Nomor Telepon (Orang Tua)</label>
                                        <?= ($value['no_ortu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['no_ortu'] . '</p>' ?>
                                    </div>
                                    <div class="col-4">
                                        <label>Nama Ayah</label>
                                        <?= ($value['nama_ayah'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['nama_ayah'] . '</p>' ?>
                                    </div>
                                    <div class="col-4">
                                        <label>Nama Ibu</label>
                                        <?= ($value['nama_ibu'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['nama_ibu'] . '</p>' ?>
                                    </div>
                                </div>

                                <div class="form-group row pl-5 pr-5">
                                    <div class="col-4">
                                        <label>Nomor Telepon (Peserta Didik)</label>
                                        <?= ($value['telepon_siswa'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['telepon_siswa'] . '</p>' ?>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <label>MIN / SD Asal</label>
                                        <?= ($value['sekolah_asal'] == null) ? '<p class="border-bottom text-danger">belum diisi</p>' : '<p class="border-bottom text-dark-50">' . $value['sekolah_asal'] . '</p>' ?>
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab Content-->
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Modal lihat data formulir -->

    <!-- Modal edit pendaftar-->
    <?php foreach ($siswa as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data <strong><?= $value['nama_siswa'] ?></strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-custom gutter-bs">
                            <!--Begin::Header-->
                            <div class="card-header card-header-tabs-line">
                                <div class="card-toolbar">
                                    <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                                        <li class="nav-item mr-3">
                                            <a class="nav-link active" data-toggle="tab" href="#biodata">
                                                <span class="nav-icon mr-2">
                                                    <span class="svg-icon mr-3">
                                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Home.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="nav-text font-weight-bold">Biodata</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#berkas">
                                                <span class="nav-icon mr-2">
                                                    <span class="svg-icon mr-3">
                                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Address-card.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="nav-text font-weight-bold">Berkas</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--Begin::Body-->
                            <div class="card-body px-0">
                                <div class="tab-content">
                                    <!--begin::Tab Content-->
                                    <div class="tab-pane active" id="biodata" role="tabpanel">
                                        <?php echo form_open('DataPPDB/editData/' . $value['id_siswa']) ?>
                                        <div class="form p-3">
                                            <div class="bc-kemenag text-white p-3 mb-3 rounded">
                                                <h6 class="font-size-lg font-weight-light">Pendaftaran</h6>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Tanggal Pendaftaran</label>
                                                    <input type="text" class="form-control" disabled name="tgl_pendaftaran" value="<?= date('d F Y', strtotime($value['tgl_pendaftaran'])) ?>" />
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Nomor Pendaftaran</label>
                                                    <input type="text" class="form-control" disabled name="no_pendaftaran" value="<?= $value['no_pendaftaran'] ?>" />
                                                </div>
                                            </div>
                                            <div class="bc-kemenag text-white p-3 mb-3 rounded">
                                                <h6 class="font-size-lg font-weight-light">Identitas Siswa</h6>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="nama_siswa" disabled="disabled" value="<?= $value['nama_siswa'] ?>" />
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>NISN</label>
                                                    <input type="text" class="form-control " disabled="disabled" name="nisn" value="<?= $value['nisn'] ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Jenis Kelamin<?= ($value['jenis_kelamin'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                                    <select class="form-control mb-3" name="jenis_kelamin" <?= $value['jenis_kelamin'] ?>>
                                                        <option value="">--Pilih--</option>
                                                        <option value="L" <?= $value['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                                        <option value="P" <?= $value['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                                    </select>
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('jenis_kelamin') ? $validation->getError('jenis_kelamin') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Tempat Lahir<?= ($value['tempat_lahir'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                                    <input type="text" class="form-control" name="tempat_lahir" value="<?= $value['tempat_lahir'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('tempat_lahir') ? $validation->getError('tempat_lahir') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="date" class="form-control input-group date" name="tgl_lahir" value="<?= $value['tgl_lahir'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('tgl_lahir') ? $validation->getError('tgl_lahir') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Agama </label>
                                                    <input type="text" class="form-control" name="agama" value="<?= $value['agama'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('agama') ? $validation->getError('agama') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>No. KTP/NIK</label>
                                                    <input type="text" class="form-control" name="no_ktp_siswa" value="<?= $value['no_ktp_siswa'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('no_ktp_siswa') ? $validation->getError('no_ktp_siswa') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Anak Ke</label>
                                                    <input type="text" class="form-control" name="anak_ke" value="<?= $value['anak_ke'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('anak_ke') ? $validation->getError('anak_ke') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Jumlah Saudara Kandung</label>
                                                    <input type="text" class="form-control" name="jml_saudara" value="<?= $value['jml_saudara'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('jml_saudara') ? $validation->getError('jml_saudara') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Status Yatim/Piatu/Yatim Piatu</label>
                                                    <input type="text" class="form-control" name="status" value="<?= $value['status'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('status') ? $validation->getError('status') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Golongan Darah</label>
                                                    <input type="text" class="form-control" name="gol_darah" value="<?= $value['gol_darah'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('gol_darah') ? $validation->getError('gol_darah') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Kegemaran</label>
                                                    <input type="text" class="form-control" name="kegemaran" value="<?= $value['kegemaran'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('kegemaran') ? $validation->getError('kegemaran') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Nomor Telepon (Peserta Didik)</label>
                                                    <input type="text" class="form-control" name="telepon_siswa" value="<?= $value['telepon_siswa'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('telepon_siswa') ? $validation->getError('telepon_siswa') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="bc-kemenag text-white p-3 mb-3 rounded">
                                                <h6 class="font-size-lg font-weight-light">Keterangan Tempat Tinggal</h6>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Desa/Gampong</label>
                                                    <input type="text" class="form-control " name="desa" value="<?= $value['desa'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('desa') ? $validation->getError('desa') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Kecamatan</label>
                                                    <input type="text" class="form-control " name="kecamatan" value="<?= $value['kecamatan'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('kecamatan') ? $validation->getError('kecamatan') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Kabupaten</label>
                                                    <input type="text" class="form-control" name="kabupaten" value="<?= $value['kabupaten'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('kabupaten') ? $validation->getError('kabupaten') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Provinsi</label>
                                                    <input type="text" class="form-control " name="provinsi" value="<?= $value['provinsi'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('provinsi') ? $validation->getError('provinsi') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Tinggal Dengan</label>
                                                    <input type="text" class="form-control" name="tinggal_dgn" value="<?= $value['tinggal_dgn'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('tinggal_dgn') ? $validation->getError('tinggal_dgn') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Jarak Tempat Tinggal Ke Sekolah</label>
                                                    <input type="text" class="form-control " name="jarak" value="<?= $value['jarak'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('jarak') ? $validation->getError('jarak') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="bc-kemenag text-white p-3 mb-3 rounded">
                                                <h6 class="font-size-lg font-weight-light">Riwayat Pendidikan Siswa</h6>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Lulus Dari / Nama Sekolah</label>
                                                    <input type="text" class="form-control" name="sekolah_asal" value="<?= $value['sekolah_asal'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('sekolah_asal') ? $validation->getError('sekolah_asal') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Nomor STTB</label>
                                                    <input type="text" class="form-control " name="no_sttb" value="<?= $value['no_sttb'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('no_sttb') ? $validation->getError('no_sttb') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Lama Belajar</label>
                                                    <input type="text" class="form-control" name="lama_belajar" value="<?= $value['lama_belajar'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('lama_belajar') ? $validation->getError('lama_belajar') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Nomor Ujian Nasional</label>
                                                    <input type="text" class="form-control " name="no_un" value="<?= $value['no_un'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('no_un') ? $validation->getError('no_un') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="bc-kemenag text-white p-3 mb-3 rounded">
                                                <h6 class="font-size-lg font-weight-light">Identitas Orang Tua/Wali</h6>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>Nama (Ayah)</label>
                                                    <input type="text" class="form-control" name="nama_ayah" value="<?= $value['nama_ayah'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('nama_ayah') ? $validation->getError('nama_ayah') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Tempat Lahir (Ayah)</label>
                                                    <input type="text" class="form-control" name="tempat_lahir_ayah" value="<?= $value['tempat_lahir_ayah'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('tempat_lahir_ayah') ? $validation->getError('tempat_lahir_ayah') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Tanggal Lahir (Ayah) <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control input-group date" name="tgl_lahir_ayah" value="<?= $value['tgl_lahir_ayah'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('tgl_lahir_ayah') ? $validation->getError('tgl_lahir_ayah') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Pendidikan (Ayah)</label>
                                                    <input type="text" class="form-control" name="pendidikan_ayah" value="<?= $value['pendidikan_ayah'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('pendidikan_ayah') ? $validation->getError('pendidikan_ayah') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Pekerjaan (Ayah)</label>
                                                    <input type="text" class="form-control" name="pekerjaan_ayah" value="<?= $value['pekerjaan_ayah'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('pekerjaan_ayah') ? $validation->getError('pekerjaan_ayah') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Penghasilan Perbulan (Ayah)</label>
                                                    <input type="text" class="form-control" name="penghasilan_ayah" value="<?= $value['penghasilan_ayah'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('penghasilan_ayah') ? $validation->getError('penghasilan_ayah') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Alamat Rumah (Ayah)</label>
                                                    <input type="text" class="form-control" name="alamat_ayah" value="<?= $value['alamat_ayah'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('alamat_ayah') ? $validation->getError('alamat_ayah') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>No. KK (Ayah)</label>
                                                    <input type="text" class="form-control" name="no_kk_ayah" value="<?= $value['no_kk_ayah'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('no_kk_ayah') ? $validation->getError('no_kk_ayah') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>No. KTP/NIK (Ayah)</label>
                                                    <input type="text" class="form-control" name="no_ktp_ayah" value="<?= $value['no_ktp_ayah'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('no_ktp_ayah') ? $validation->getError('no_ktp_ayah') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Nomor Telepon/HP (Ayah)</label>
                                                    <input type="text" class="form-control" name="no_hp_ayah" value="<?= $value['no_hp_ayah'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('no_hp_ayah') ? $validation->getError('no_hp_ayah') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Masih Hidup/Meninggal Dunia (Ayah)</label>
                                                    <input type="text" class="form-control" name="status_ayah" value="<?= $value['status_ayah'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('status_ayah') ? $validation->getError('status_ayah') : ''; ?>
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Nama (Ibu)</label>
                                                    <input type="text" class="form-control" name="nama_ibu" value="<?= $value['nama_ibu'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('nama_ibu') ? $validation->getError('nama_ibu') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Tempat Lahir (Ibu)</label>
                                                    <input type="text" class="form-control" name="tempat_lahir_ibu" value="<?= $value['tempat_lahir_ibu'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('tempat_lahir_ibu') ? $validation->getError('tempat_lahir_ibu') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Tanggal Lahir (Ibu) <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control input-group date" name="tgl_lahir_ibu" value="<?= $value['tgl_lahir_ibu'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('tgl_lahir_ibu') ? $validation->getError('tgl_lahir_ibu') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Pendidikan (Ibu)</label>
                                                    <input type="text" class="form-control" name="pendidikan_ibu" value="<?= $value['pendidikan_ibu'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('pendidikan_ibu') ? $validation->getError('pendidikan_ibu') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Pekerjaan (Ibu)</label>
                                                    <input type="text" class="form-control" name="pekerjaan_ibu" value="<?= $value['pekerjaan_ibu'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('pekerjaan_ibu') ? $validation->getError('pekerjaan_ibu') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Penghasilan Perbulan (Ibu)</label>
                                                    <input type="text" class="form-control" name="penghasilan_ibu" value="<?= $value['penghasilan_ibu'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('penghasilan_ibu') ? $validation->getError('penghasilan_ibu') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Alamat Rumah (Ibu)</label>
                                                    <input type="text" class="form-control" name="alamat_ibu" value="<?= $value['alamat_ibu'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('alamat_ibu') ? $validation->getError('alamat_ibu') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>No. KK (Ibu)</label>
                                                    <input type="text" class="form-control" name="no_kk_ibu" value="<?= $value['no_kk_ibu'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('no_kk_ibu') ? $validation->getError('no_kk_ibu') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>No. KTP/NIK (Ibu)</label>
                                                    <input type="text" class="form-control" name="no_ktp_ibu" value="<?= $value['no_ktp_ibu'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('no_ktp_ibu') ? $validation->getError('no_ktp_ibu') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Nomor Telepon/HP (Ibu)</label>
                                                    <input type="text" class="form-control" name="no_hp_ibu" value="<?= $value['no_hp_ibu'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('no_hp_ibu') ? $validation->getError('no_hp_ibu') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Masih Hidup/Meninggal Dunia (Ibu)</label>
                                                    <input type="text" class="form-control" name="status_ibu" value="<?= $value['status_ibu'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('status_ibu') ? $validation->getError('status_ibu') : ''; ?>
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="bc-kemenag text-white p-3 mb-3 rounded">
                                                <h6 class="font-size-lg font-weight-light">Keterangan Bantuan Sosial</h6>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 mb-2">
                                                    <label>Kartu yang dimiliki</label>
                                                    <input type="text" class="form-control" name="kartu_sosial" value="<?= $value['kartu_sosial'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('kartu_sosial') ? $validation->getError('kartu_sosial') : ''; ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label>Nomor Kartu</label>
                                                    <input type="text" class="form-control " name="no_kartu_sosial" value="<?= $value['no_kartu_sosial'] ?>" />
                                                    <p class="text-danger">
                                                        <?= $validation->hasError('no_kartu_sosial') ? $validation->getError('no_kartu_sosial') : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn bc-kemenag text-white font-weight-bold">Simpan</button>
                                            </div>
                                        </div>
                                        <?php echo form_close() ?>
                                    </div>
                                    <!--end::Tab Content-->
                                    <!--begin::Tab Content-->
                                    <div class="tab-pane" id="berkas" role="tabpanel">
                                        <div class="form-group row pl-5 pr-5">
                                            <div class="col-6">
                                                <label class="font-weight-bolder">Pas Photo(3X4) Latar Biru (png, jpeg, jpg)</label>
                                                <div class="separator separator-dashed my-5"></div>
                                                <div class="mb-5">
                                                    <img src="<?= base_url('pas_photo/' . $value['pas_photo']) ?>" width="250px" height="250px" id="gambar_load">
                                                </div>
                                                <label>Edit Pas Photo</label>
                                                <input type="file" class="form-control form-control-lg  form-control-solid" name="pas_photo" accept="image/*" id="preview_gambar" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end::Tab Content-->
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Modal edit pendaftar-->

    <?= $this->endSection(''); ?>

    <?= $this->section('script'); ?>
    <script>
        $("[mode='datatable']").DataTable({
            scrollX: true,

        })
    </script>
    <?= $this->endSection('script'); ?>