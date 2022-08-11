<?php

namespace Modules\Pesan_masuk\Controllers;

use App\Controllers\MikaController;

class Pesan_masuk extends MikaController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return $this->layout->display($this->cname, '/index');
	}

	function get_data()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$lists = $this->m_pesan_masuk->getDatatables();
			$data = [];

			foreach ($lists as $list) {
				$row = [];
				$row[] = ($list->is_baca == 'N') ? '<span class="badge badge-danger" style="display: block;width: 10px;height: 12px;margin-left: -24px;position: absolute;margin-top: 4px;"></span>' . $list->ReceivingDateTime : $list->ReceivingDateTime;
				$row[] = (!empty($this->get_kontak($list->SenderNumber))) ? $this->get_kontak($list->SenderNumber)->nama : $list->SenderNumber;
				$row[] = $list->TextDecoded;

				$data[] = $row;
			}

			$output = [
				'draw' => $this->request->getPost('draw'),
				'recordsTotal' => $this->m_pesan_masuk->countAll(),
				'recordsFiltered' => $this->m_pesan_masuk->countFiltered(),
				'data' => $data
			];

			echo json_encode($output);
		}
	}

	public function get_kontak($nomor)
	{
		$this->kontak->select('nama');
		$this->kontak->where('nomor', substr_replace($nomor, '0', 0, 3));
		$kontak = $this->kontak->get(1)->getRow();

		return $kontak;
	}

	public function update_is_baca()
	{
		$this->inbox->select('count(*) as jml');
		$this->inbox->where('is_baca', 'N');
		$data = $this->inbox->get(1)->getRow()->jml;

		if ($data > 0) {

			$this->inbox->update(['is_baca' => 'Y']);

			echo json_encode('sukses');
		} else {
			echo json_encode('gagal');
		}
	}
}
