<?php

namespace App\Controllers;

class Login extends MikaController
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$session = session()->get('user_login');
		if ($session != '') {
			return redirect()->to(BASE . '/dashboard');
		}

		return view('login');
	}

	public function proses()
	{
		$session = session()->get('user_login');

		if (!empty($session)) {
			return redirect()->to(BASE . '/dashboard');
		}

		$data = $this->request->getPost();

		$builder = $this->db->table('user');
		$builder->where('( username ="' . @$data['username'] . '" or ' . 'email ="' . @$data['username'] . '" )', null, false);
		$builder->where('password', md5(@$data['password']));
		$cek = $builder->get(1)->getRow();


		if (!empty($cek)) {

			$log 	= array('id_user' => $cek->id_user, 'aktivitas' => 'Login', 'waktu' => date('Y-m-d H:i:s'));
			$tb_log = $this->db->table('log');
			$tb_log->insert($log);

			session()->set('user_login', $cek);

			return redirect()->to(BASE . '/dashboard');
		} else {

			session()->setFlashdata('msg', 'Data yang anda masukkan salah.');

			return redirect()->to(BASE . '/login');
		}
	}

	public function logout()
	{
		session()->destroy();

		return redirect()->to(BASE . '/login');
	}
}


/* mikaeilar */