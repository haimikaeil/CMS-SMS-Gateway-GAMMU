<?php

namespace Modules\Send_sms\Controllers;

use App\Controllers\MikaController;

class Send_sms extends MikaController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$data['kontak'] = $this->kontak->get()->getResult();

		return $this->layout->display($this->cname, 'index', $data);
	}

	public function send()
	{
		$data = $this->request->getPost();

		$param = array(
			'DestinationNumber' => $data['nomor'],
			'TextDecoded'		=> $data['pesan'],
			'CreatorID'			=> $this->user_login->id_user
		);

		$proses = $this->outbox->insert($param);

		if ($proses) {
			$this->session->setFlashdata('msg', succ_msg('Pesan berhasil dipindahkan ke Pesan Keluar dan siap dikirim, silahkan cek Pesan Terkirim untuk mengetahui jika pesan sudah terkirim.'));
		} else {
			$this->session->setFlashdata('msg', err_msg('Gagal menambahkan pesan.'));
		}

		return redirect()->to($this->cname);
	}
}
