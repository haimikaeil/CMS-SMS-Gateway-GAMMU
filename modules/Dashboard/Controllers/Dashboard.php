<?php

namespace Modules\Dashboard\Controllers;

use App\Controllers\MikaController;

class Dashboard extends MikaController
{

    public function __construct()
    {
        parent::__construct();

        $this->sisa_pulsa   = $this->db->table('sisa_pulsa');
        $this->inbox        = $this->db->table('inbox');
        $this->outbox       = $this->db->table('outbox');
        $this->sentitems    = $this->db->table('sentitems');
    }

    public function index()
    {
        $data = [
            'cname' => $this->cname,
        ];

        $data['pulsa'] = $this->sisa_pulsa->get(1)->getRow();

        $this->inbox->select('count(*) as jumlah');
        $this->inbox->where('date(ReceivingDateTime) >=', date('Y-m-d') . ' 00:00:00');
        $this->inbox->where('date(ReceivingDateTime) <=', date('Y-m-d') . ' 23:59:59');
        $data['pesan_masuk'] = $this->inbox->get(1)->getRow()->jumlah;

        $this->outbox->select('count(*) as jumlah');
        $this->outbox->where('date(UpdatedInDB) >=', date('Y-m-d') . ' 00:00:00');
        $this->outbox->where('date(UpdatedInDB) <=', date('Y-m-d') . ' 23:59:59');
        $data['pesan_keluar'] = $this->outbox->get(1)->getRow()->jumlah;

        $this->sentitems->select('count(*) as jumlah');
        $this->sentitems->where('status', 'SendingOKNoReport');
        $this->sentitems->where('date(SendingDateTime) >=', date('Y-m-d') . ' 00:00:00');
        $this->sentitems->where('date(SendingDateTime) <=', date('Y-m-d') . ' 23:59:59');
        $data['pesan_terkirim'] = $this->sentitems->get(1)->getRow()->jumlah;

        $this->sentitems->select('count(*) as jumlah');
        $this->sentitems->where('status', 'SendingError');
        $this->sentitems->where('date(SendingDateTime) >=', date('Y-m-d') . ' 00:00:00');
        $this->sentitems->where('date(SendingDateTime) <=', date('Y-m-d') . ' 23:59:59');
        $data['pesan_gagal'] = $this->sentitems->get(1)->getRow()->jumlah;

        return $this->layout->display($this->cname, 'index', $data);
    }

    public function cek_pulsa()
    {
        // dd($this->request->getPost('stop'));
        if ($this->request->getPost('stop') == '1') {

            ob_start();
            passthru("C:\gammu\gammu-smsd -c smsdrc -k");
            $res = ob_get_contents();
            ob_end_clean();

            $this->session->setFlashdata('msg', succ_msg($res));

            return redirect()->to($this->cname);
        }

        // jalankan perintah cek pulsa via gammu
        exec("C:\gammu\gammu -c C:\gammu\gammurc getussd *111*1#", $hasil);

        // if ($hasil[0]) {

        //     $this->session->setFlashdata('msg', err_msg($hasil[0]));

        //     return redirect()->to($this->cname);
        // }

        // menampilkan sisa pulsa
        if ($hasil[5]) {
            $stat = $hasil[5];
        } else {
            $stat = $hasil[2];
        }

        $sisa = explode('"', $stat);


        $proses = $this->sisa_pulsa->update(['tanggal' => date('Y-m-d H:i:s'), 'sisa_pulsa' => $sisa[1]]);

        if ($proses) {

            passthru("C:\gammu\gammu-smsd -c smsdrc -s");

            $this->session->setFlashdata('msg', succ_msg('Pengecekan pulsa berhasil.'));
        } else {
            $this->session->setFlashdata('msg', err_msg('Gagal cek pulsa.'));
        }

        return redirect()->to($this->cname);
    }

    public function bulanGen($value = '')
    {
        $bulan = array(
            '1' => 'Januari', // array bulan konversi
            '2'                => 'Februari',
            '3'                => 'Maret',
            '4'                => 'April',
            '5'                => 'Mei',
            '6'                => 'Juni',
            '7'                => 'Juli',
            '8'                => 'Agustus',
            '9'                => 'September',
            '10'               => 'Oktober',
            '11'               => 'November',
            '12'               => 'Desember',
        );

        return $bulan[$value];
    }

    public function get_grafik_bulan()
    {

        $this->sentitems->select('MONTH(SendingDateTime) as bulan, YEAR(SendingDateTime) as tahun');
        $this->sentitems->groupBy('tahun, bulan');
        $bulan = $this->sentitems->get()->getResult();

        $bulan_fix = array();
        $respon_fix = array();
        $respon_sementara = array();
        foreach ($bulan as $key => $c) {

            $bulan_fix[] = $this->bulanGen($c->bulan) . ' ' . $c->tahun;

            $this->sentitems->select('(
                                    SELECT
                                        COUNT(*)
                                    FROM
                                        sentitems
                                    WHERE
                                        MONTH(SendingDateTime) = ' . $c->bulan . '
                                    AND 
                                        YEAR(SendingDateTime) = ' . $c->tahun . '
                                    AND status = "SendingOKNoReport"
                                ) AS t,
                                (
                                    SELECT
                                        COUNT(*)
                                    FROM
                                        sentitems
                                    WHERE
                                        MONTH(SendingDateTime) = ' . $c->bulan . '
                                    AND 
                                        YEAR(SendingDateTime) = ' . $c->tahun . '
                                    AND status = "SendingError"
                                ) AS g');

            $respon = $this->sentitems->get(1)->getRow();

            foreach ($respon as $keys => $a) {
                $respon_sementara[$keys][] = intval($a);
            }
        }

        $i = 0;
        foreach ($respon_sementara as $key => $c) {

            if ($key == 't') {
                $name = 'Pesan Terkirim';
            } elseif ($key == 'g') {
                $name = 'Pesan Gagal';
            }

            $respon_fix[$i]['name'] = $name;
            $respon_fix[$i]['data'] = $c;

            $i++;
        }

        echo json_encode(array('bulan' => $bulan_fix, 'pesan' => $respon_fix));
    }

    public function get_chart()
    {
        $data = array();
        for ($i = 0; $i < 24; $i++) {
            if (strlen($i) < 2) {
                $jam = '0' . $i;
            } else {
                $jam = $i;
            }

            $this->inbox->select('count(*) as jumlah');
            $this->inbox->where('HOUR(ReceivingDateTime)', $jam);
            $this->inbox->where('date(ReceivingDateTime) >=', date('Y-m-d') . ' 00:00:00');
            $this->inbox->where('date(ReceivingDateTime) <=', date('Y-m-d') . ' 23:59:59');
            $data[] = intval($this->inbox->get(1)->getRow()->jumlah);
        }

        echo json_encode($data);
    }

    public function get_belum_baca()
    {
        $this->inbox->select('count(*) as jml');
        $this->inbox->where('is_baca', 'N');
        $data = $this->inbox->get(1)->getRow()->jml;

        echo json_encode($data);
    }

    public function pesan_keluar()
    {
        $this->outbox->select('count(*) as jml');
        $data = $this->outbox->get(1)->getRow()->jml;

        echo json_encode($data);
    }
}


/* mikaeilar */
