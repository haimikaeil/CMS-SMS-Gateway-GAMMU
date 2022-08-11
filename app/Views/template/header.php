<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?= base_url() ?>/dashboard">
                <img src="<?= base_url() ?>/public/assets/logo-endqueue.png" alt="logo" class="logo-default" style="width:150px; margin-top:5px;" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"> </span>
                            <span class="username username-hide-on-mobile"> <?= session()->get('user_login')->nama ?> </span>
                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                            <img alt="" class="img-circle" src="<?= base_url() ?>/public/assets/user.png" /> </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <!-- <br> -->
                            &nbsp;
                            <!-- li>
                                <a href="page_user_profile_1.html">
                                    <i class="icon-user"></i> Edit Profile </a>
                            </li>
                            <li class="divider"> </li> -->
                            <li>
                                <a href="<?= site_url('login/logout') ?>">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                            <br>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>