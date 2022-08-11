<?php

namespace Modules\Pesan_keluar\Controllers;

use App\Controllers\MikaController;

class Pesan_keluar extends MikaController
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
			$lists = $this->m_pesan_keluar->getDatatables();
			$data = [];

			foreach ($lists as $list) {
				$row = [];
				$row[] = $list->UpdatedInDB;
				$row[] = $list->nama_kontak;
				$row[] = $list->nama_user;
				$row[] = $list->TextDecoded;

				$data[] = $row;
			}

			$output = [
				'draw' => $this->request->getPost('draw'),
				'recordsTotal' => $this->m_pesan_keluar->countAll(),
				'recordsFiltered' => $this->m_pesan_keluar->countFiltered(),
				'data' => $data
			];

			echo json_encode($output);
		}
	}
}
