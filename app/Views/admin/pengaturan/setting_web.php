<?= $this->extend('templates/adm_layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <!--begin::Content-->
    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Card-->
        <?php

        if (session()->getFlashdata('message')) {
            echo '<div class="alert alert-custom alert-light-success fade show" role="alert">';
            echo '<div class="alert-text text-dark">';
            echo session()->getFlashdata('message');
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

        <div class="card card-custom gutter-bs">
            <!--Begin::Header-->
            <div class="card-header card-header-tabs-line">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                        <li class="nav-item mr-3">
                            <a class="nav-link active" data-toggle="tab" href="#profile">
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
                                <span class="nav-text font-weight-bold">Data Sekolah</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data_ppdb">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
                                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
                                                <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1" />
                                                <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1" />
                                                <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1" />
                                                <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1" />
                                                <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1" />
                                                <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Data PPDB</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data_kepala">
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
                                <span class="nav-text font-weight-bold">Data Kepala</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data_ketua">
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
                                <span class="nav-text font-weight-bold">Data Ketua</span>
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
                    <div class="tab-pane active" id="profile" role="tabpanel">
                        <?php echo form_open_multipart('Admin/saveSetting') ?>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>NSM</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="nsm" value="<?= $setting['nsm'] ?>">
                            </div>
                            <div class="col-6">
                                <label>NPSN</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="npsn" value="<?= $setting['npsn'] ?>">
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Nama Sekolah</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="nama_sekolah" value="<?= $setting['nama_sekolah'] ?>">
                            </div>
                            <div class="col-6">
                                <label>Website</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="website" value="<?= $setting['website'] ?>">
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Alamat Lengkap</label>
                                <textarea class="form-control form-control-lg form-control-solid" id="exampleTextarea" rows="3" name="alamat_lengkap"><?= $setting['alamat_lengkap'] ?></textarea>
                            </div>
                            <div class="col-6">
                                <label>Provinsi</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="provinsi" value="<?= $setting['provinsi'] ?>">
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Kabupaten</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="kabupaten" value="<?= $setting['kabupaten'] ?>">
                            </div>
                            <div class="col-6">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="kecamatan" value="<?= $setting['kecamatan'] ?>">
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>No. Telepon</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="telepon_sekolah" value="<?= $setting['telepon_sekolah'] ?>">
                            </div>
                            <div class="col-6">
                                <label>Email</label>
                                <input type="email" class="form-control form-control-lg form-control-solid" name="email" value="<?= $setting['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Ganti Logo Sekolah</label>
                                <input type="file" class="form-control form-control-lg  form-control-solid mb-5" name="logo_sekolah" accept="image/*" id="preview_gambar">
                            </div>
                            <div class="col-6">
                                <label>Logo Sekolah (png, jpeg, jpg)</label>
                                <div>
                                    <img src="<?= base_url('logo/' . $setting['logo_sekolah']) ?>" width="150px" height="150px" id="gambar_load">
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="pl-5">
                            <button type="submit" class="btn bc-kemenag text-white font-weight">Simpan Data</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                    <!--end::Tab Content-->
                    <!--begin::Tab Content-->
                    <div class="tab-pane" id="data_ppdb" role="tabpanel">
                        <div class="container">
                            <?php echo form_open_multipart('Admin/saveSetting4') ?>
                            <div class="form-group pl-8 pr-8">
                                <h6><strong>Informasi Home PPDB</strong></h6>
                            </div>
                            <div class="form-group pl-8 pr-8">
                                <label>Syarat-syarat Pendaftaran</label>
                                <textarea class="summernote" id="kt_summernote_1" name="syarat_daftar">
                                    <?= $setting['syarat_daftar'] ?>
                                </textarea>
                            </div>
                            <div class="form-group pl-8 pr-8">
                                <label>Syarat-syarat Pendaftaran Ulang</label>
                                <textarea class="summernote" id="kt_summernote_1" name="syarat_daftar_ulang">
                                    <?= $setting['syarat_daftar_ulang'] ?>
                                </textarea>
                            </div>
                            <div class="form-group row pl-8 pr-8">
                                <div class="col-6">
                                    <label>Ganti Brosur</label>
                                    <input type="file" class="form-control form-control-lg  form-control-solid" name="brosur" accept="image/*" id="preview_gambar">
                                </div>
                                <div class="col-6">
                                    <label>Gambar Brosur (png, jpeg, jpg)</label>
                                    <div>
                                        <img src="<?= base_url('brosur/' . $setting['brosur']) ?>" width="200px" height="100px" id="gambar_load">
                                    </div>
                                </div>
                            </div>
                            <div class=" separator separator-dashed my-10"></div>

                            <div class="form-group pl-8 pr-8">
                                <h6><strong>Jadwal Pendaftaran</strong></h6>
                            </div>
                            <div class="form-group pl-8 pr-8">
                                <label>Pengisian Formulir</label>
                                <textarea class="summernote" id="kt_summernote_1" name="j_pengisian_formulir">
                                    <?= $setting['j_pengisian_formulir'] ?>
                                </textarea>
                            </div>
                            <div class="form-group pl-8 pr-8">
                                <label>Ujian PPDB</label>
                                <textarea class="summernote" id="kt_summernote_1" name="j_ujian_ppdb">
                                    <?= $setting['j_ujian_ppdb'] ?>
                                </textarea>
                            </div>
                            <div class="form-group pl-8 pr-8">
                                <label>Pengumuman Kelulusan</label>
                                <textarea class="summernote" id="kt_summernote_1" name="j_pengumuman_kelulusan">
                                    <?= $setting['j_pengumuman_kelulusan'] ?>
                                </textarea>
                            </div>
                            <div class="form-group pl-8 pr-8">
                                <label>Pendaftaran Ulang</label>
                                <textarea class="summernote" id="kt_summernote_1" name="j_pendaftaran_ulang">
                                    <?= $setting['j_pendaftaran_ulang'] ?>
                                </textarea>
                            </div>
                            <div class="form-group pl-8 pr-8">
                                <label>MOS</label>
                                <textarea class="summernote" id="kt_summernote_1" name="j_mos">
                                    <?= $setting['j_mos'] ?>
                                </textarea>
                            </div>

                            <div class=" separator separator-dashed my-10"></div>
                            <div class="form-group pl-8 pr-8">
                                <h6><strong>Informasi Bagian Siswa</strong></h6>
                            </div>
                            <div class="form-group pl-8 pr-8">
                                <label>Keterangan bagian bawah formulir </label>
                                <textarea class="summernote" id="kt_summernote_1" name="keterangan_print">
                                    <?= $setting['keterangan_print'] ?>
                                </textarea>
                            </div>
                            <div class=" separator separator-dashed my-10"></div>
                            <div class="pl-5">
                                <button type="submit" class="btn bc-kemenag text-white font-weight">Simpan Data</button>
                            </div>
                            <?php echo form_close() ?>

                        </div>
                    </div>
                    <!--end::Tab Content-->
                    <!--begin::Tab Content-->
                    <div class="tab-pane" id="data_kepala" role="tabpanel">
                        <?php echo form_open_multipart('Admin/saveSetting5') ?>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Nama Kepala Sekolah</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="nama_kepsek" value="<?= $setting['nama_kepsek'] ?>">
                            </div>
                            <div class="col-6">
                                <label>NIP</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" value="<?= $setting['nip_kepsek'] ?>" name="nip_kepsek">
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Ganti Foto Kepala</label>
                                <input type="file" class="form-control form-control-lg  form-control-solid" name="foto_kepsek" accept="image/*" id="preview_gambar">
                            </div>
                            <div class="col-6">
                                <label>Foto Kepala (png, jpeg, jpg)</label>
                                <div class="mb-5">
                                    <img src="<?= base_url('foto/' . $setting['foto_kepsek']) ?>" width="150px" height="150px" id="gambar_load">
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="pl-5">
                            <button type="submit" class="btn bc-kemenag text-white font-weight">Simpan Data</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                    <!--end::Tab Content-->
                    <!--begin::Tab Content-->
                    <div class="tab-pane" id="data_ketua" role="tabpanel">
                        <?php echo form_open_multipart('Admin/saveSetting6') ?>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Nama Ketua PPDB</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="nama_ketua" value="<?= $setting['nama_ketua'] ?>">
                            </div>
                            <div class="col-6">
                                <label>NIP</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="nip_ketua" value="<?= $setting['nip_ketua'] ?>">
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Ganti TTD Ketua</label>
                                <input type="file" class="form-control form-control-lg  form-control-solid" name="ttd_ketua" accept="image/*" id="preview_gambar">
                            </div>
                            <div class="col-6">
                                <label>TTD Ketua (png, jpeg, jpg)</label>
                                <div class="mb-5">
                                    <img src="<?= base_url('ttd/' . $setting['ttd_ketua']) ?>" width="150px" height="150px" id="gambar_load">
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="pl-5">
                            <button type="submit" class="btn bc-kemenag text-white font-weight">Simpan Data</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                    <!--end::Tab Content-->
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content-->
    <?= $this->endSection('content'); ?>