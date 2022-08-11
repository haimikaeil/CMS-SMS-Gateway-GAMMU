<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= @$title ?> | ENDQUEUE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?= base_url() ?>/public/assets/template/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?= base_url() ?>/public/assets/template/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />

    <link href="<?= base_url() ?>/public/assets/template/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/style.css" rel="stylesheet" type="text/css" />


    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT STYLES -->
    <style type="text/css">
        .dataTables_processing {
            height: 110px !important;
            position: absolute;
        }
    </style>

    <link rel="shortcut icon" href="<?= base_url('/public/assets/favicon.png') ?>" />


    <!-- charts -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/highcharts/highcharts.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/highcharts/highcharts-3d.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/highcharts/highcharts-more.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/highcharts/modules/solid-gauge.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/highcharts/modules/exporting.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/highcharts/themes/grid-light.js"></script>
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
    <!-- BEGIN HEADER -->
    <?= $this->include('template/header'); ?>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <?= $this->include('template/sidebar'); ?>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1><?= $title ?></h1>
                    </div>
                    <!-- END PAGE TITLE -->
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE BREADCRUMB -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="<?= site_url() ?>">Home</a>
                    </li>
                    <?php if ($request->uri->getSegment(1) != '') : ?>
                        <li>
                            <i class="fa fa-chevron-right"></i>
                            <a href="<?= site_url($request->uri->getSegment(1)) ?>"><?= ucwords(str_replace('_', ' ', $title)) ?></a>

                        </li>
                    <?php endif ?>

                    <?php if ($request->uri->getSegment(2) != '') : ?>
                        <li>
                            <i class="fa fa-chevron-right"></i>
                            <a href="<?= site_url($request->uri->getSegment(1) . '/' . $request->uri->getSegment(2)) ?>"><?= ucwords(str_replace('_', ' ', $request->uri->getSegment(2))) ?></a>

                        </li>
                    <?php endif ?>
                </ul>
                <!-- END PAGE BREADCRUMB -->
                <div class="row">
                    <div class="col-md-12">
                        <?= @session()->getFlashdata('msg') ?>
                    </div>
                </div>
                <?= $this->renderSection('content'); ?>
            </div>
        </div>

        <div class="modal fade bs-modal-sm" id="small" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <br>
                        <h4 id="myModalLabel" class="bold">Perhatian!</h4>
                        <p class="no-margin">Menghapus data ini mungkin akan berpengaruh ke beberapa data. Apakah anda yakin akan menghapus data ini?</p>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                        <a href="#" id="linkHapus" class="btn btn-danger">Hapus Data</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- END CONTAINER -->
        <?= $this->include('template/footer'); ?>

        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?= base_url() ?>/public/assets/template/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?= base_url() ?>/public/assets/template/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/global/scripts/components-bootstrap-touchspin.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?= base_url() ?>/public/assets/template/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?= base_url() ?>/public/assets/template/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>/public/assets/template/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>

        <!-- END THEME LAYOUT SCRIPTS -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('.select2').select2();
                $('.select2.readonly').select2({
                    disabled: 'readonly'
                });
            });

            function hapus(uri) {
                $('#linkHapus').attr('href', uri);
                $('#small').modal();
            }

            function reloadbutton() {
                $('.tombolEdit').each(function() {
                    var id = $(this).data('id');
                    encodedString = btoa(id).replace('==', '').replace('=', '');
                    var link = $(this).attr('href');
                    $(this).attr('href', link + '/' + encodedString);
                });


                $('.tombolHapus').each(function() {
                    var id = $(this).data('id');
                    encodedString = btoa(id).replace('==', '').replace('=', '');
                    var link = "<?= site_url($cname . '/hapus'); ?>";
                    $(this).attr('onclick', "hapus('" + link + '/' + encodedString + "');");
                });
            }
        </script>

        <?= $this->renderSection('js') ?>
</body>

</html>