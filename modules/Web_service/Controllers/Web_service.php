<?php

namespace Modules\Web_service\Controllers;

use App\Controllers\MikaController;

class Web_service extends MikaController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		throw $this->show404;
	}


	public function send_sms()
	{
		$nomor 	= @$_REQUEST['nomor'];
		$pesan 	= @$_REQUEST['pesan'];

		$param = array(
			'DestinationNumber' => $nomor,
			'TextDecoded'		=> $pesan,
			'CreatorID'			=> 1
		);

		$proses = $this->outbox->insert($param);

		if ($proses) {
			echo json_encode(array('status' => 'sukses', 'data' => $param));
		} else {
			echo json_encode(array('status' => 'gagal', 'msg' => 'Gagal kirim sms.'));
		}
	}
}

/*MIKAEILAR*/