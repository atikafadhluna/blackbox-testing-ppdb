<?php
$db = \Config\Database::connect();

$setting = $db->table('tbl_web')
    ->where('id_setting', '1')
    ->get()->getRowArray();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();
?>
<!DOCTYPE html>
<html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <title><?= $title ?> | <?= $subtitle ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?= base_url(); ?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?= base_url(); ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <link href="<?= base_url(); ?>/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/themes/layout/brand/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/themes/layout/aside/light.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/media/logos/kemenag.ico" />

</head>


<body>
    <div class="container">
        <table>
            <tr>
                <td rowspan="3" width="100">
                    <img src="<?= base_url('logo/' . $setting['logo_sekolah']) ?>" height="70px">
                </td>
                <td>
                    <b style="font-size:18px;">PANITIA PENERIAMAAN PESERTA DIDIK BARU (PPDB)</b>
                </td>
            </tr>
            <tr>
                <b style="font-size:22px; text-uppercase"><?= $setting['nama_sekolah'] ?></b>
                <br>
            </tr>
            <tr>
                <td style="font-size:10px;">
                    <?= $setting['alamat_lengkap'] ?>
                </td>
            </tr>
        </table>
        <hr>

        <h4>
            <center>
                FORMULIR PENERIMAAN PESERTA DIDIK BARU <br>
                TAHUN PELAJARAN <?= $ta['ta'] ?>
            </center>
        </h4>
        <table style="margin-bottom:15px;">
            <tr>
                <td style="width:480px;"></td>
                <td style="text-align: center;border: solid; padding: 6px;font-size:12px">
                    <b>
                        NO. PENDAFTARAN <?= $siswa['no_pendaftaran'] ?>
                    </b>
                </td>

            </tr>
        </table>
        <table width="100%" border="0" style="margin-bottom: 10px" class="text-black font-weight-normal font-size-lg">
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted"><?= $siswa['nama_siswa'] ?></td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted"><?= $siswa['nisn'] ?></td>
            </tr>

            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted"><?= $siswa['jenis_kelamin'] ?></td>
            </tr>
            <tr>
                <td>Tempat, Tanggal lahir</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted"><?= $siswa['tempat_lahir'] ?>, <?= date('d F Y', strtotime($siswa['tgl_lahir'])) ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted"><?= $siswa['alamat_rumah'] ?></td>
            </tr>
            <tr>
                <td>Nama Ayah</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted"><?= $siswa['nama_ayah'] ?></td>
            </tr>
            <tr>
                <td>Nama Ibu</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted"><?= $siswa['nama_ibu'] ?></td>
            </tr>
            <tr>
                <td>No. Telepon Orang Tua</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted"><?= $siswa['no_ortu'] ?></td>
            </tr>
            <tr>
                <td>No. Telepon Peserta Didik</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted"><?= $siswa['telepon_siswa'] ?></td>
            </tr>
            <tr>
                <td>MIN/SD Asal</td>
                <td>:</td>
                <td style="border-bottom: 1px dotted"><?= $siswa['sekolah_asal'] ?></td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td style="width: 490px">Mengetahui</td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2"><?= $setting['kabupaten'] ?>, <?= date('d F Y', strtotime($siswa['tgl_pendaftaran'])) ?></td>
            </tr>
            <tr>
                <td>Orang Tua/Wali</td>
                <td></td>
                <td></td>
                <td></td>
                <td style="width: 490px">Calon Siswa</td>
                <td></td>
            </tr>
            <tr>
                <td><br><br><br></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><b><?= $siswa['nama_ayah'] ?></b></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b><?= $siswa['nama_siswa'] ?></b></td>
                <td></td>
            </tr>
        </table>

        <table style="margin-top: 10px;">
            <?= $setting['keterangan_print'] ?>
        </table>

        <table>
            <tr>
                <td style="width: 490px"></td>
                <td></td>

                <td></td>
                <td colspan="2"><?= $setting['kabupaten'] ?>,<?= date('d F Y', strtotime($siswa['tgl_pendaftaran'])) ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>

                <td></td>
                <td style="width: 490px">Ketua Panitia</td>
                <td></td>
            </tr>
            <tr>
                <td><br><br><br></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>

                <td></td>
                <td><b><?= $setting['nama_ketua'] ?></b></td>
                <td></td>
            </tr>
        </table>
    </div>
</body>


</html>