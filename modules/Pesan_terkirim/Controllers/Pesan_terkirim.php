<?php

namespace Modules\Pesan_terkirim\Controllers;

use App\Controllers\MikaController;

class Pesan_terkirim extends MikaController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return $this->layout->display($this->cname, 'index');
	}

	function get_data()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$lists = $this->m_pesan_terkirim->getDatatables();
			$data = [];

			foreach ($lists as $list) {
				$row = [];
				$row[] = $list->SendingDateTime;
				$row[] = $list->nama_kontak;
				$row[] = $list->nama_user;

				if ($list->status == 'SendingOK') {
					$tombol = 'btn btn-success';
				} else if ($list->status == 'SendingOKNoReport') {
					$tombol = 'btn btn-success';
				} else if ($list->status == 'SendingError') {
					$tombol = 'btn btn-danger';
				} else if ($list->status == 'DeliveryOK') {
					$tombol = 'btn btn-success';
				} else if ($list->status == 'DeliveryFailed') {
					$tombol = 'btn btn-danger';
				} else if ($list->status == 'DeliveryPending') {
					$tombol = 'btn btn-warning';
				} else if ($list->status == 'DeliveryUnknown') {
					$tombol = 'btn btn-danger';
				} else if ($list->status == 'Error') {
					$tombol = 'btn btn-danger';
				}

				$status = "<label class='$tombol'>$list->status</label>";
				$row[] = $status;
				$row[] = $list->TextDecoded;

				$data[] = $row;
			}

			$output = [
				'draw' => $this->request->getPost('draw'),
				'recordsTotal' => $this->m_pesan_terkirim->countAll(),
				'recordsFiltered' => $this->m_pesan_terkirim->countFiltered(),
				'data' => $data
			];

			echo json_encode($output);
		}
	}
}
