<?= $this->extend('template/template') ?>
<?= $this->section('content'); ?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark font-green-sharp">
            <i class="<?= $icon ?> font-green-sharp font-dark"></i>
            <span class="caption-subject bold uppercase"> <?= $title ?></span>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="<?= site_url($cname . '/send')  ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-2"><?= ucwords(str_replace('_', ' ', 'kontak')) ?></label>
                    <div class="col-md-7">
                        <select class="form-control select2" name="nomor" required id="nomor" onchange="cek_kuota_sms()">
                            <option>- Pilih Nomor Kontak -</option>
                            <?php foreach ($kontak as $key => $v) : ?>
                                <option value="<?= $v->nomor ?>"><?= $v->nomor . ' - ' . $v->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2"><?= ucwords(str_replace('_', ' ', 'pesan')) ?></label>
                    <div class="col-md-7">
                        <textarea class="form-control" id="pesan" rows="5" name="pesan" required maxlength="153"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-2 col-md-9">
                        <button type="submit" class="btn green">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    function cek_kuota_sms() {
        var nomor = $('#nomor').val();
        if (nomor == 123) {
            $('#pesan').html('INFO SMSanynet');
        }
    }
</script>
<?= $this->endSection(); ?>