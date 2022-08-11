<?= $this->extend('template/template'); ?>
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
                    <a class="btn sbold btn-default" href="<?= site_url($cname . '/tambah') ?>"><i class="fa fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tabel">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Nama</th>
                            <th>Nomor</th>
                            <th>Alamat</th>
                            <th style="width:125px;">Aksi</th>
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
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#tabel').DataTable({
            "processing": true,
            "serverSide": true,
            "PaginationType": "full_numbers",
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

        $('#tabel').on('draw.dt', function() {
            reloadbutton();
        });
    });
</script>
<?= $this->endSection(); ?>