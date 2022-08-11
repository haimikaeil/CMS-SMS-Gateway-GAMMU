<?= $this->extend('template/template') ?>

<?= $this->section('content'); ?>
<div class="alert alert-warning alert-dismissable" id="info_pulsa" style="display: none;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Perhatian!</strong> Jangan berpindah menu atau menutup tab browser. Pengecekan pulsa membutuhkan waktu lama, silahkan tunggu hingga proses selesai.
</div>

<style type="text/css">
    .dashboard-stat .details {
        margin-top: -12px !important;
    }
</style>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="icon-envelope"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?= @$pesan_masuk ?>
                </div>
                <div class="desc"> Pesan Masuk </div>
                <div class="desc" style="font-size: 11px !important;font-style: italic;"> <?= date('d-m-Y') ?> </div>
            </div>
            <a class="more" href="<?= site_url('pesan_masuk') ?>"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green">
            <div class="visual">
                <i class="icon-envelope-open"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?= @$pesan_keluar ?>
                </div>
                <div class="desc"> Pesan Keluar </div>
                <div class="desc" style="font-size: 11px !important;font-style: italic;"> <?= date('d-m-Y') ?> </div>
            </div>
            <a class="more" href="<?= site_url('pesan_keluar') ?>"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple">
            <div class="visual">
                <i class="icon-envelope-letter"></i>
            </div>
            <div class="details">
                <div class="number"> <?= @$pesan_terkirim ?> </div>
                <div class="desc"> Pesan Terkirim </div>
                <div class="desc" style="font-size: 11px !important;font-style: italic;"> <?= date('d-m-Y') ?> </div>
            </div>
            <a class="more" href="<?= site_url('pesan_terkirim') ?>"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="icon-close"></i>
            </div>
            <div class="details">
                <div class="number"> <?= @$pesan_gagal ?> </div>
                <div class="desc"> Pesan Gagal Terkirim </div>
                <div class="desc" style="font-size: 11px !important;font-style: italic;"> <?= date('d-m-Y') ?> </div>
            </div>
            <a class="more" href="<?= site_url('pesan_terkirim') ?>"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>

<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-info font-dark"></i>
            <span class="caption-subject font-dark bold uppercase">Informasi Pulsa</span>
        </div>

    </div>
    <div class="portlet-body">
        <div class="note note-info">
            <form action="<?= site_url($cname . '/cek_pulsa')  ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <h4 class="block"><?= @$pulsa->sisa_pulsa ?></h4>
                <p>*Pengecekan <b>PULSA</b> terakhir pada tanggal <b><?= @$pulsa->tanggal ?></b>.</p>
                <p style="font-size: 12px;">*Untuk pengecekan <b>PULSA</b> silahkan klik tombol <b>STOP SERVICE</b> terlebih dahulu, <b>TUNGGU BEBERAPA DETIK</b> kemudian klik <b>CEK PULSA</b>.</p>
                <br><br>
                <p>
                    <button class="btn red pull-left" name="stop" value='1'> Stop Service </button>
                    <button class="btn blue" style="margin-left: 10px;" onclick="info_pulsa();" name="cek" value='2'> Cek Pulsa </button>
                </p>
            </form>
        </div>
    </div>
</div>


<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-bar-chart font-dark"></i>
            <span class="caption-subject font-dark bold uppercase">
                Grafik Pesan Terkirim Setiap Bulan
            </span>
        </div>
    </div>
    <div class="portlet-body">
        <div id="grafik_bulan"></div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-graph"></i>
                    <span class="caption-subject font-dark bold uppercase"> Grafik Pesan Masuk Setiap Jam Pada Tanggal <?= date('d M Y') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="chart_jam"></div>
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>

<script>
    function info_pulsa() {
        $('#info_pulsa').css('display', 'block');
    }

    Highcharts.theme = {

        "chart": {
            "plotBackgroundColor": "#EBEBEB",
            "style": {
                "color": "#000000",
                "fontFamily": "Arial, sans-serif"
            }
        },
        "colors": ["#595959", "#F8766D", "#A3A500", "#00BF7D", "#00B0F6", "#E76BF3"],
        "xAxis": {
            "labels": {
                "style": {
                    "color": "#666666"
                }
            },
            "title": {
                "style": {
                    "color": "#000000"
                }
            },
            "startOnTick": false,
            "endOnTick": false,
            "gridLineColor": "#FFFFFF",
            "gridLineWidth": 1.5,
            "tickWidth": 1.5,
            "tickLength": 5,
            "tickColor": "#666666",
            "minorTickInterval": 0,
            "minorGridLineColor": "#FFFFFF",
            "minorGridLineWidth": 0.5
        },
        "yAxis": {
            "labels": {
                "style": {
                    "color": "#666666"
                }
            },
            "title": {
                "style": {
                    "color": "#000000"
                }
            },
            "startOnTick": false,
            "endOnTick": false,
            "gridLineColor": "#FFFFFF",
            "gridLineWidth": 1.5,
            "tickWidth": 1.5,
            "tickLength": 5,
            "tickColor": "#666666",
            "minorTickInterval": 0,
            "minorGridLineColor": "#FFFFFF",
            "minorGridLineWidth": 0.5
        },
        "legendBackgroundColor": "rgba(0, 0, 0, 0.5)",
        "background2": "#505053",
        "dataLabelsColor": "#B0B0B3",
        "textColor": "#C0C0C0",
        "contrastTextColor": "#F0F0F3",
        "maskColor": "rgba(255,255,255,0.3)"

    };

    // Apply the theme
    Highcharts.setOptions(Highcharts.theme);

    grafik_bulan();
    setInterval(grafik_bulan, 30000);

    function grafik_bulan() {
        $.ajax({
            url: "<?php echo site_url($cname . '/get_grafik_bulan'); ?>",
            type: "POST",
            dataType: "json",
            data: {},
            cache: false,
            success: function(hasil) {

                $('#grafik_bulan').highcharts({
                    chart: {
                        type: 'column',
                    },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: 'Jumlah Pesan'
                    },
                    plotOptions: {
                        column: {
                            depth: 25
                        }
                    },
                    xAxis: {
                        categories: hasil.bulan
                    },
                    yAxis: {
                        title: {
                            text: null
                        }
                    },
                    series: hasil.pesan
                });
            }
        });
    }

    $(document).ready(function() {
        get_chart();

        setInterval(function() {
            get_chart();
        }, 15000);
    });

    function get_chart() {
        $.ajax({
                url: "<?php echo site_url($cname . '/get_chart'); ?>",
                dataType: 'json',
            })
            .done(function(hasil) {
                $('#chart_jam').highcharts({
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00']
                    },
                    yAxis: {
                        title: {
                            text: 'Total'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [{
                        name: 'Pesan Masuk',
                        data: hasil
                    }],
                    credits: {
                        enabled: false
                    },

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
            })
    }
</script>

<?= $this->endSection(); ?>