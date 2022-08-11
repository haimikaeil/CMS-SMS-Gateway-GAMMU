<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

            <?php foreach ($menu as $key => $c) : ?>
                <?php if ($key == 2) : ?>
                    <li class="heading">
                        <h3 class="uppercase">Pesan</h3>
                    </li>
                <?php endif ?>

                <?php if ($key == 3) : ?>
                    <li class="heading">
                        <h3 class="uppercase">Fitur</h3>
                    </li>
                <?php endif ?>

                <?php if ($key == 7) : ?>
                    <li class="heading">
                        <h3 class="uppercase">Settings</h3>
                    </li>
                <?php endif ?>

                <?php foreach ($c as $keys => $s) : $active = ''; ?>
                    <?php

                    $parent = '';
                    $target = '';
                    $url = site_url($s->link);

                    if ($request->uri->getSegment(1) == $s->link || $request->uri->getSegment(1) . '/' . $request->uri->getSegment(2) == $s->link) :
                        $active = 'active';
                    endif
                    ?>
                    <li class="nav-item start <?= $active . @$parent ?>">
                        <a href="<?= $url ?>" class="nav-link <?= @$target ?>">
                            <i class="<?= $s->icon ?>"></i>
                            <?php if ($s->nama == 'Pesan Masuk') { ?>
                                <span class="title"><?= $s->nama ?> <span class="badge badge-info" style="margin-top: -21px;" id="belum_baca">0</span></span>
                            <?php } elseif ($s->nama == 'Pesan Keluar') { ?>
                                <span class="title"><?= $s->nama ?> <span class="badge badge-success" style="margin-top: -21px;" id="pesan_keluar">0</span></span>
                            <?php } else { ?>
                                <span class="title"><?= $s->nama ?></span>
                            <?php } ?>

                        </a>
                    </li>
                <?php endforeach ?>
            <?php endforeach ?>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>

<?= $this->section('js'); ?>
<script>
    get_belum_baca();
    setInterval(get_belum_baca, 5000);

    function get_belum_baca() {
        $.ajax({
            url: "<?= site_url('dashboard/get_belum_baca') ?>",
            dataType: "json",
            success: function(res) {
                $('#belum_baca').html(res);
            }
        });
    }

    pesan_keluar();
    setInterval(pesan_keluar, 2500);

    function pesan_keluar() {
        $.ajax({
            url: "<?= site_url('dashboard/pesan_keluar') ?>",
            dataType: "json",
            success: function(res) {
                $('#pesan_keluar').html(res);
            }
        });
    }
</script>
<?= $this->endSection(); ?>