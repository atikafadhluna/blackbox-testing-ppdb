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
                            <a class="nav-link active" data-toggle="tab" href="#daftar_akun">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Daftar Akun</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#login_akun">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Login Akun</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pengisian_formulir">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Files\File-done.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z M10.875,15.75 C11.1145833,15.75 11.3541667,15.6541667 11.5458333,15.4625 L15.3791667,11.6291667 C15.7625,11.2458333 15.7625,10.6708333 15.3791667,10.2875 C14.9958333,9.90416667 14.4208333,9.90416667 14.0375,10.2875 L10.875,13.45 L9.62916667,12.2041667 C9.29375,11.8208333 8.67083333,11.8208333 8.2875,12.2041667 C7.90416667,12.5875 7.90416667,13.1625 8.2875,13.5458333 L10.2041667,15.4625 C10.3958333,15.6541667 10.6354167,15.75 10.875,15.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Pengisian Formulir</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#download_formulir">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\Printer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z" fill="#000000" />
                                                <rect fill="#000000" opacity="0.3" x="8" y="2" width="8" height="2" rx="1" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Download Formulir</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#mengikuti_ujian">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Files\File-done.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z M10.875,15.75 C11.1145833,15.75 11.3541667,15.6541667 11.5458333,15.4625 L15.3791667,11.6291667 C15.7625,11.2458333 15.7625,10.6708333 15.3791667,10.2875 C14.9958333,9.90416667 14.4208333,9.90416667 14.0375,10.2875 L10.875,13.45 L9.62916667,12.2041667 C9.29375,11.8208333 8.67083333,11.8208333 8.2875,12.2041667 C7.90416667,12.5875 7.90416667,13.1625 8.2875,13.5458333 L10.2041667,15.4625 C10.3958333,15.6541667 10.6354167,15.75 10.875,15.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Mengikuti Ujian</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pengumuman">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Design\Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Pengumuman</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#daftar_ulang">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Adress-book2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3" />
                                                <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Daftar Ulang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#melengkapi_berkas">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Files\Selected-file.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Melengkapi Berkas</span>
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
                    <div class="tab-pane active" id="daftar_akun" role="tabpanel">
                        <?php echo form_open_multipart('AlurDaftar/DaftarAkun') ?>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-12">
                                <label>Deskripsi</label>
                                <textarea class="summernote" id="kt_summernote_1" name="desc_daftar"><?= $setting['desc_daftar'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Ganti Gambar</label>
                                <input type="file" class="form-control form-control-lg  form-control-solid mb-5" name="gambar_daftar" accept="image/*" id="preview_gambar">
                            </div>
                            <div class="col-6">
                                <label>Gambar (png, jpeg, jpg)</label>
                                <div>
                                    <img src="<?= base_url('alur/' . $setting['gambar_daftar']) ?>" width="200px" height="100px" id="gambar_load">
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
                    <div class="tab-pane" id="login_akun" role="tabpanel">
                        <?php echo form_open_multipart('AlurDaftar/loginAkun') ?>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-12">
                                <label>Deskripsi</label>
                                <textarea class="summernote" id="kt_summernote_1" name="desc_login"><?= $setting['desc_login'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Ganti Gambar</label>
                                <input type="file" class="form-control form-control-lg  form-control-solid mb-5" name="gambar_login" accept="image/*" id="preview_gambar">
                            </div>
                            <div class="col-6">
                                <label>Gambar (png, jpeg, jpg)</label>
                                <div>
                                    <img src="<?= base_url('alur/' . $setting['gambar_login']) ?>" width="200px" height="100px" id="gambar_load">
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
                    <div class="tab-pane" id="pengisian_formulir" role="tabpanel">
                        <?php echo form_open_multipart('AlurDaftar/pengisianFormulir') ?>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-12">
                                <label>Deskripsi</label>
                                <textarea class="summernote" id="kt_summernote_1" name="desc_formulir"><?= $setting['desc_formulir'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Ganti Gambar</label>
                                <input type="file" class="form-control form-control-lg  form-control-solid mb-5" name="gambar_formulir" accept="image/*" id="preview_gambar">
                            </div>
                            <div class="col-6">
                                <label>Gambar (png, jpeg, jpg)</label>
                                <div>
                                    <img src="<?= base_url('alur/' . $setting['gambar_formulir']) ?>" width="200px" height="100px" id="gambar_load">
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
                    <div class="tab-pane" id="download_formulir" role="tabpanel">

                        <?php echo form_open_multipart('AlurDaftar/downloadFormulir') ?>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-12">
                                <label>Deskripsi</label>
                                <textarea class="summernote" id="kt_summernote_1" name="desc_download"><?= $setting['desc_download'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Ganti Gambar</label>
                                <input type="file" class="form-control form-control-lg  form-control-solid mb-5" name="gambar_download" accept="image/*" id="preview_gambar">
                            </div>
                            <div class="col-6">
                                <label>Gambar (png, jpeg, jpg)</label>
                                <div>
                                    <img src="<?= base_url('alur/' . $setting['gambar_download']) ?>" width="200px" height="100px" id="gambar_load">
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
                    <div class="tab-pane" id="mengikuti_ujian" role="tabpanel">

                        <?php echo form_open_multipart('AlurDaftar/mengikutiUjian') ?>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-12">
                                <label>Deskripsi</label>
                                <textarea class="summernote" id="kt_summernote_1" name="desc_ujian"><?= $setting['desc_ujian'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Ganti Gambar</label>
                                <input type="file" class="form-control form-control-lg  form-control-solid mb-5" name="gambar_ujian" accept="image/*" id="preview_gambar">
                            </div>
                            <div class="col-6">
                                <label>Gambar (png, jpeg, jpg)</label>
                                <div>
                                    <img src="<?= base_url('alur/' . $setting['gambar_ujian']) ?>" width="200px" height="100px" id="gambar_load">
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
                    <div class="tab-pane" id="pengumuman" role="tabpanel">

                        <?php echo form_open_multipart('AlurDaftar/pengumuman') ?>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-12">
                                <label>Deskripsi</label>
                                <textarea class="summernote" id="kt_summernote_1" name="desc_pengumuman"><?= $setting['desc_pengumuman'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Ganti Gambar</label>
                                <input type="file" class="form-control form-control-lg  form-control-solid mb-5" name="gambar_pengumuman" accept="image/*" id="preview_gambar">
                            </div>
                            <div class="col-6">
                                <label>Gambar (png, jpeg, jpg)</label>
                                <div>
                                    <img src="<?= base_url('alur/' . $setting['gambar_pengumuman']) ?>" width="200px" height="100px" id="gambar_load">
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
                    <div class="tab-pane" id="daftar_ulang" role="tabpanel">

                        <?php echo form_open_multipart('AlurDaftar/DaftarUlang') ?>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-12">
                                <label>Deskripsi</label>
                                <textarea class="summernote" id="kt_summernote_1" name="desc_daftar_ulang"><?= $setting['desc_daftar_ulang'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Ganti Gambar</label>
                                <input type="file" class="form-control form-control-lg  form-control-solid mb-5" name="gambar_daftar_ulang" accept="image/*" id="preview_gambar">
                            </div>
                            <div class="col-6">
                                <label>Gambar (png, jpeg, jpg)</label>
                                <div>
                                    <img src="<?= base_url('alur/' . $setting['gambar_daftar_ulang']) ?>" width="200px" height="100px" id="gambar_load">
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
                    <div class="tab-pane" id="melengkapi_berkas" role="tabpanel">

                        <?php echo form_open_multipart('AlurDaftar/MelengkapiBerkas') ?>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-12">
                                <label>Deskripsi</label>
                                <textarea class="summernote" id="kt_summernote_1" name="desc_berkas"><?= $setting['desc_berkas'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row pl-5 pr-5">
                            <div class="col-6">
                                <label>Ganti Gambar</label>
                                <input type="file" class="form-control form-control-lg  form-control-solid mb-5" name="gambar_berkas" accept="image/*" id="preview_gambar">
                            </div>
                            <div class="col-6">
                                <label>Gambar (png, jpeg, jpg)</label>
                                <div>
                                    <img src="<?= base_url('alur/' . $setting['gambar_berkas']) ?>" width="200px" height="100px" id="gambar_load">
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