<?php

namespace App\Controllers;

use App\Libraries\Templates;

class MikaController extends BaseController
{
	public function __construct()
	{
		helper(['mikaeilar_helper']);
		$this->t_empt = '0000-00-00';
		date_default_timezone_set("Asia/Jakarta");

		$this->layout 			= new Templates();
		$this->db 				= \Config\Database::connect();
		$this->session 			= \Config\Services::session();
		$this->form_validation 	= \Config\Services::validation();
		$this->uri 				= service('uri');
		$this->user_login 		= $this->session->get('user_login');
		$this->show404			= \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

		$query = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='gammu'";
		$table = $this->db->query($query)->getResult();

		foreach ($table as $row) {
			$nm_tabel = $row->TABLE_NAME;
			$this->$nm_tabel = $this->db->table($nm_tabel);
		}

		$for_model 	= $this->menu->get()->getResult();
		foreach ($for_model as $key => $v) {
			$con = ucfirst($v->link);
			$module = "Modules\\$con\\Models\\M_$con";

			if (class_exists($module)) {
				$link = "m_$v->link";
				$this->$link = new $module();
			}
		}

		$uri 		= $this->uri->getSegment(1);
		$this->menu->where('link', $uri);
		$menu 		= $this->menu->get(1)->getRow();

		if (!empty($menu)) {
			$this->title 	= $menu->nama;
			$this->icon 	= $menu->icon;
			$this->cname 	= $menu->link;
		} else {
			$this->cname = '';
		}

		if (empty($this->user_login)) {
			return redirect()->to(BASE . '/login');
		}
	}
}
