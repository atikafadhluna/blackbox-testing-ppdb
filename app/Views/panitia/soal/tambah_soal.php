<?= $this->extend('templates/pt_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Form Input Soal</h3>
        </div>
        <!--begin::Form-->
        <?php echo form_open_multipart('Panitia/insertSoal') ?>
        <form>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-form-label text-right font-size-h6 font-weight-normal col-lg-3 col-sm-12 d-flex justify-content-between">Text Soal</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea class="summernote" id="kt_summernote_1" name="text_soal" style="display: none;"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right font-size-h6 font-weight-normal col-lg-3 col-sm-12 d-flex justify-content-between">Pilihan A</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea class="summernote" id="kt_summernote_1" name="opsi_a"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right font-size-h6 font-weight-normal col-lg-3 col-sm-12 d-flex justify-content-between">Pilihan B</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea class="summernote" id="kt_summernote_1" name="opsi_b"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right font-size-h6 font-weight-normal col-lg-3 col-sm-12 d-flex justify-content-between">Pilihan C</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea class="summernote" id="kt_summernote_1" name="opsi_c"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right font-size-h6 font-weight-normal col-lg-3 col-sm-12 d-flex justify-content-between">Pilihan D</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea class="summernote" id="kt_summernote_1" name="opsi_d"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right font-size-h6 font-weight-normal col-lg-3 col-sm-12 d-flex justify-content-between">Kunci Jawaban</label>
                    <select class="form-control mb-3 col-lg-9 col-md-9 col-sm-12" id="exampleSelect1" name="kunci_jawaban">
                        <option>-pilih-</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-secondary mr-2">Batalkan</button>
                        <button type="submit" class="btn bc-kemenag text-white ">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
        <?php echo form_close() ?>
        <!--end::Form-->
    </div>
    <?= $this->endSection('content'); ?>