<?php

namespace Modules\Kontak\Controllers;

use App\Controllers\MikaController;

class Kontak extends MikaController
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
			$lists = $this->m_kontak->getDatatables();
			$data = [];

			foreach ($lists as $list) {
				$row = [];
				$row[] = $list->tanggal;
				$row[] = $list->nomor;
				$row[] = $list->nama;
				$row[] = $list->alamat;
				$row[] = $this->button($list->id_kontak);

				$data[] = $row;
			}

			$output = [
				'draw' => $this->request->getPost('draw'),
				'recordsTotal' => $this->m_kontak->countAll(),
				'recordsFiltered' => $this->m_kontak->countFiltered(),
				'data' => $data
			];

			echo json_encode($output);
		}
	}

	function button($param)
	{
		$html = "<a class='btn btn-success btn-sm tombolEdit' title='Edit' href='" . site_url($this->cname . '/edit') . "' data-id='" . $param . "'><i class='icon-pencil'></i> Edit</a>&nbsp;";
		$html .= "<a class='btn btn-danger btn-sm tombolHapus' title='Hapus' href='#' data-id='" . $param . "' ><i class=' icon-trash'></i> Hapus</a>";

		return $html;
	}

	function tambah()
	{
		return $this->layout->display($this->cname, 'add');
	}

	function do_tambah()
	{
		$data = @$this->request->getPost();

		if ($data) {
			$this->form_validation->setRule('nama', ucwords(str_replace('_', ' ', 'nama')), 'trim|required');
			$this->form_validation->setRule('nomor', ucwords(str_replace('_', ' ', 'nomor')), 'trim|required');

			if (!$this->form_validation->withRequest($this->request)->run()) {
				$this->session->setFlashdata('data_post', (object)$this->request->getPost());

				$validasi_error = $this->form_validation->getErrors();
				$this->session->setFlashdata('msg', warn_msg(implode('<br>', $validasi_error)));

				return redirect()->to($_SERVER['HTTP_REFERER']);
			} else {

				$this->kontak->where('nomor', $data['nomor']);
				$cek = $this->kontak->get(1)->getRow();

				if (!empty($cek)) {
					$this->session->setFlashdata('data_post', (object)$this->request->getPost());

					$this->session->setFlashdata('msg', warn_msg('Nomor telepon sudah ada.'));

					return redirect()->to($_SERVER['HTTP_REFERER']);
				}

				$data['tanggal'] = date('Y-m-d h:i:s');
				$proses = $this->kontak->insert($data);

				$aktivitas = 'Menambahkan ' . $this->title . ' dengan nama ' . $data['nama'];
				$this->layout->simpan_log($this->user_login->id_user, '', $aktivitas);

				if ($proses) {
					$this->session->setFlashdata('msg', succ_msg('Data Berhasil ditambahkan.'));
				} else {
					$this->session->setFlashdata('msg', err_msg('Gagal menambahkan data.'));
				}

				return redirect()->to($this->cname);
			}
		} else {
			throw $this->show404;
		}
	}

	function edit()
	{
		$id = $this->request->uri->getSegment(3);

		if (!$id) throw $this->show404;

		$data['item'] = @$this->session->getFlashdata('data_post') ? @$this->session->getFlashdata('data_post') : $this->kontak->getWhere(array('id_kontak' => decode($id)))->getRow();

		return $this->layout->display($this->cname, 'edit', $data);
	}

	function do_ubah()
	{
		$data = @$this->request->getPost();

		if ($data) {

			$this->form_validation->setRule('nama', ucwords(str_replace('_', ' ', 'nama')), 'trim|required');
			$this->form_validation->setRule('nomor', ucwords(str_replace('_', ' ', 'nomor')), 'trim|required');

			if (!$this->form_validation->withRequest($this->request)->run()) {
				$this->session->setFlashdata('data_post', (object)$this->request->getPost());

				$validasi_error = $this->form_validation->getErrors();
				$this->session->setFlashdata('msg', warn_msg(implode('<br>', $validasi_error)));

				return redirect()->to($_SERVER['HTTP_REFERER']);
			} else {

				$proses = $this->kontak->update($data, array('id_kontak' => $data['id_kontak']));

				$aktivitas = 'Mengubah ' . $this->title . ' dengan nama ' . $data['nama'];
				$this->layout->simpan_log($this->user_login->id_user, '', $aktivitas);

				if ($proses) {
					$this->session->setFlashdata('msg', succ_msg('Data berhasil diubah.'));
				} else {
					$this->session->setFlashdata('msg', err_msg('Gagal merubah data.'));
				}
				return redirect()->to($this->cname);
			}
		} else {
			throw $this->show404;
		}
	}

	function hapus()
	{
		$id = $this->request->uri->getSegment(3);
		if (!$id) throw $this->show404;
		$data = $this->kontak->getWhere(array('id_kontak' => decode($id)))->getRow();
		if (empty($data)) {
			throw $this->show404;
		}

		$hapus = $this->kontak->delete(array('id_kontak' => decode($id)));

		$aktivitas = 'Menghapus ' . $this->title . ' dengan nama ' . $data->nama;
		$this->layout->simpan_log($this->user_login->id_user, '', $aktivitas);

		if ($hapus) {
			$this->session->setFlashdata('msg', succ_msg('Data Berhasil dihapus.'));
		} else {
			$this->session->setFlashdata('msg', err_msg('Gagal menghapus.'));
		}

		return redirect()->to($this->cname);
	}
}
