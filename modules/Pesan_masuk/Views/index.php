<?= $this->extend('template/template') ?>
<?= $this->section('content'); ?>
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark font-green-sharp">
                    <i class="<?= $icon ?> font-green-sharp font-dark"></i>
                    <span class="caption-subject bold uppercase"> Data <?= $title ?></span>
                </div>
                <div class="actions">
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tabel">
                    <thead>
                        <tr>
                            <th style="width:200px;">Waktu</th>
                            <th style="width: 200px;">Kontak Pengirim</th>
                            <th>Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE BASE CONTENT -->
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    data_tabel();
    setInterval(update_is_baca, 4000);

    function update_is_baca() {
        $.ajax({
            url: "<?= site_url('pesan_masuk/update_is_baca') ?>",
            type: "POST",
            dataType: "json",
            success: function(res) {
                if (res == 'sukses') {
                    data_tabel();
                }
            }
        });
    }

    function data_tabel() {
        var table = $('#tabel').DataTable({
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "sPaginationType": "full_numbers",
            "order": [],
            "ajax": {
                "url": "<?php echo site_url($cname . '/get_data') ?>",
                "type": "POST"
            },
            "oLanguage": {
                "sProcessing": '<img src="<?php echo base_url("public/assets/loading2.gif"); ?>"><br><p style="margin-top:-5px;">Loading</p>'
            },
            "columnDefs": [{
                "targets": [],
                "orderable": false,
            }, ],
        });
    }
</script>
<?= $this->endSection(); ?>