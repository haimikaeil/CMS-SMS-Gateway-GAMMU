<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<style type="text/css">
    .ms-container {
        width: 577px !important;
    }
</style>

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
                    <div class="col-md-10">
                        <select multiple="multiple" class="multi-select" id="my_multi_select1" name="nomor[]">
                            <?php foreach ($kontak as $key => $c) : ?>
                                <option value="<?= $c->nomor ?>"><?= $c->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2"><?= ucwords(str_replace('_', ' ', 'pesan')) ?></label>
                    <div class="col-md-7">
                        <textarea class="form-control" rows="5" name="pesan" required maxlength="153"></textarea>
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