<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | ENDQUEUE</title>
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
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?= base_url() ?>/public/assets/template/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?= base_url() ?>/public/assets/template/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?= base_url() ?>/public/assets/template/assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="<?= base_url('public/assets/favicon.png') ?>" />
</head>
<!-- END HEAD -->


<body class=" login">
    <!-- BEGIN : LOGIN PAGE 5-1 -->
    <div class="user-login-5">
        <div class="row bs-reset">
            <div class="col-md-6 bs-reset">
                <div class="login-bg" style="background-image:url(<?= base_url() ?>/public/assets/logo-endqueue-white.png)">
                    <img class="login-logo" src="<?= base_url() ?>/public/assets/logo-endqueue-white.png" style="width:150px;" />
                </div>
            </div>
            <div class="col-md-6 login-container bs-reset">
                <div class="login-content">
                    <h1>ENDQUEUE Web Report</h1>
                    <p> Silahkan masukkan <b>Username/Email</b> beserta <b>Password</b> anda. </p>
                    <form action="<?= site_url('login/proses') ?>" class="login-form" method="post">

                        <?php if (session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-danger">
                                <button class="close" data-close="alert"></button>
                                <span><?= session()->getFlashdata('msg') ?></span>
                            </div>
                        <?php endif ?>
                        <?php echo @session()->getFlashdata('msger'); ?>
                        <div class="row">
                            <div class="col-xs-6">
                                <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Username/Email" name="username" required />
                            </div>
                            <div class="col-xs-6">
                                <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-8 text-right">
                                <button class="btn blue" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="row bs-reset">
                        <div class="col-xs-5 bs-reset">

                        </div>
                        <div class="col-xs-7 bs-reset">
                            <div class="login-copyright text-right">
                                <p>ENDQUEUE | Copyright &copy; CV. Nakula Sadewa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END : LOGIN PAGE 5-1 -->
    <!--[if lt IE 9]>
<script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/respond.min.js"></script>
<script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets/template/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?= base_url() ?>/public/assets/template/assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?= base_url() ?>/public/assets/template/assets/pages/scripts/login-5.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
    <script type="text/javascript">
        $('.login-bg').backstretch([
            "<?= base_url() ?>/public/assets/bg/1.jpg",
            "<?= base_url() ?>/public/assets/bg/2.jpg",
            "<?= base_url() ?>/public/assets/bg/3.jpg",
            "<?= base_url() ?>/public/assets/bg/4.jpg"
        ], {
            fade: 1000,
            duration: 5000
        });
    </script>
</body>

</html>