<?php

function get_server_url_new_lisensi()
{
    return 'http://endqueue.id/lisensi';
}

function encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function decode($data)
{
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}

function succ_msg($msg)
{
    return '<div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Sukses!</strong> <br>' . $msg . '
            </div>';
}

function warn_msg($msg)
{
    return '<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Perhatian!</strong> <br>' . $msg . '
            </div>';
}

function err_msg($msg)
{
    return '<div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Gagal!</strong> <br>' . $msg . '
            </div>';
}

function cariKarakter($pId, $pKey)
{

    if ($pId == $pKey) {
        return true;
    } else {
        return false;
    }
}

function tgl_indo($tgl)
{
    $ubah = gmdate($tgl, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tanggal = $pecah[2];
    $bulan = bulan($pecah[1]);
    $tahun = $pecah[0];
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function waktu_conv($waktu)
{
    if (($waktu > 0) and ($waktu < 60)) {
        $lama = number_format($waktu, 2) . " detik";
        return $lama;
    }
    if (($waktu > 60) and ($waktu < 3600)) {
        $detik = fmod($waktu, 60);
        $menit = $waktu - $detik;
        $menit = $menit / 60;
        $lama = $menit . " Menit " . $detik . " detik";
        return $lama;
    } elseif ($waktu > 3600) {
        $detik = fmod($waktu, 60);
        $tempmenit = ($waktu - $detik) / 60;
        $menit = fmod($tempmenit, 60);
        $jam = ($tempmenit - $menit) / 60;
        $lama = $jam . " Jam " . $menit . " Menit " . $detik . " detik";
        return $lama;
    }
}

function bulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

function AES_encrypt($input)
{
    $key = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';

    $data_encrypt = openssl_encrypt($input, "AES-128-ECB", $key);
    return $data_encrypt;
}

function AES_decrypt($input)
{
    $key = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';

    $data_decrypt = openssl_decrypt($input, "AES-128-ECB", $key);
    return $data_decrypt;
}

function ns_encrypt($input)
{
    $key = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $ns = '1234567891011121';

    $data_encrypt = openssl_encrypt($input, "AES-128-CTR", $key, 0, $ns);
    return $data_encrypt;
}

function ns_decrypt($input)
{
    $key = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $ns = '1234567891011121';

    $data_decrypt = openssl_decrypt($input, "AES-128-CTR", $key, 0, $ns);
    return $data_decrypt;
}


/* mikaeilar */