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

</head>

<body>
    <div class="container">
        <table>
            <tr>
                <td rowspan="3" width="100">
                    <img src="<?= base_url('logo/' . $setting['logo_sekolah']) ?>" height="70px">
                </td>
                <td>
                    <b style="font-size:18px;">PENERIAMAAN PESERTA DIDIK BARU (PPDB)</b>
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
                SOAL UJIAN PENERIMAAN PESERTA DIDIK BARU <br>
                TAHUN PELAJARAN <?= $ta['ta'] ?>
            </center>
        </h4>

        <table>
            <?php
            $no = 1;
            foreach ($soal as $key => $value) { ?>
                <tr>
                    <td style="width:5%;">
                        <?= $no++ ?>.
                    </td>
                    <td style="width:95%">
                        <?= $value['text_soal'] ?>
                    </td>
                </tr>
                <?php foreach (['a', 'b', 'c', 'd'] as $opsi) : ?>
                    <tr>
                        <td style="width:5%;">
                        </td>
                        <td style="width:95%;display:inline">
                            <?= $opsi . '. '; ?><?= strip_tags($value['opsi_' . $opsi]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php } ?>

        </table>

    </div>
</body>

</html>