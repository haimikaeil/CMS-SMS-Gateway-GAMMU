<?php

namespace Modules\User\Controllers;

use App\Controllers\MikaController;


class User extends MikaController
{
    public function __construct()
    {
        parent::__construct();
        $this->tb_user = $this->db->table('user');
    }

    public function index()
    {
        return $this->layout->display($this->cname, 'index');
    }

    function button($param)
    {
        $html = "<a class='btn btn-success btn-sm tombolEdit' title='Edit' href='" . site_url($this->cname . '/edit/') . "' data-id='" . $param . "'><i class='icon-pencil'></i> Edit</a>&nbsp;";
        $html .= "<a class='btn btn-danger btn-sm tombolHapus' title='Hapus' href='#' data-id='" . $param . "' ><i class=' icon-trash'></i> Hapus</a>";

        return $html;
    }

    public function get_data()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lists = $this->m_user->getDatatables();

            $data = [];

            foreach ($lists as $list) {
                $row = [];
                $row[] = $list->username;
                $row[] = $list->nama;
                $row[] = $list->email;

                $row[] = $this->button($list->id_user);

                $data[] = $row;
            }

            $output = [
                'draw' => $this->request->getPost('draw'),
                'recordsTotal' => $this->m_user->countAll(),
                'recordsFiltered' => $this->m_user->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    function tambah()
    {
        return $this->layout->display($this->cname, 'add');
    }

    function do_tambah()
    {
        $data = @$this->request->getPost();

        if ($data) {

            $this->form_validation->setRule('username', ucwords(str_replace('_', ' ', 'username')), 'trim|required|alpha_numeric');
            $this->form_validation->setRule('nama', ucwords(str_replace('_', ' ', 'nama')), 'trim|required');
            $this->form_validation->setRule('password', ucwords(str_replace('_', ' ', 'password')), 'trim|required');
            $this->form_validation->setRule('confirm_password', ucwords(str_replace('_', ' ', 'confirm_password')), 'trim|required');


            if (!$this->form_validation->withRequest($this->request)->run()) {
                $this->session->setFlashdata('data_post', $this->request->getPost());

                $validasi_error = $this->form_validation->getErrors();
                $this->session->setFlashdata('msg', warn_msg(implode('<br>', $validasi_error)));

                return redirect()->to($this->cname . '/tambah');
            } else {
                $this->tb_user->where('username', $data['username']);
                $cek = $this->tb_user->get(1)->getRow();

                if (!empty($cek)) {

                    $this->session->setFlashdata('data_post', (object)$this->request->getPost());

                    $this->session->setFlashdata('msg', warn_msg('Username tidak tersedia.'));

                    return redirect()->to($_SERVER['HTTP_REFERER']);
                }

                if ($data['password'] != $data['confirm_password']) {
                    $this->session->setFlashdata('data_post', (object)$this->request->getPost());

                    $this->session->setFlashdata('msg', warn_msg('Bidang <b>Password</b> dan <b>Confirm Password</b> tidak sama'));

                    return redirect()->to($_SERVER['HTTP_REFERER']);
                }

                $password = md5($data['password']);
                $data['password'] = $password;
                unset($data['confirm_password']);

                $proses = $this->tb_user->insert(@$data);

                if ($proses) {

                    $aktivitas = 'Menambahkan ' . $this->title . ' dengan nama ' . $data['nama'];
                    $this->layout->simpan_log($this->user_login->id_user, '', $aktivitas);

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
        $id = $this->uri->getSegment(3);

        if (!$id) throw $this->show404;

        $data['item'] = @$this->session->getFlashdata('data_post') ? @$this->session->getFlashdata('data_post') : $this->tb_user->getWhere(array('id_user' => decode($id)))->getRow();

        return $this->layout->display($this->cname, '/edit', $data);
    }

    function do_ubah()
    {
        $data = @$this->request->getPost();

        if ($data) {
            $this->form_validation->setRule('username', ucwords(str_replace('_', ' ', 'username')), 'trim|required|alpha_numeric');
            $this->form_validation->setRule('nama', ucwords(str_replace('_', ' ', 'nama')), 'trim|required');

            if (!$this->form_validation->withRequest($this->request)->run()) {
                $this->session->setFlashdata('data_post', (object)$this->request->getPost());

                $validasi_error = $this->form_validation->getErrors();
                $this->session->setFlashdata('msg', warn_msg(implode('<br>', $validasi_error)));
                return redirect()->to($_SERVER['HTTP_REFERER']);
            } else {
                if ($data['password'] != '' && $data['confirm_password']) {
                    if ($data['password'] != $data['confirm_password']) {
                        $this->session->setFlashdata('data_post', (object)$this->request->getPost());
                        $this->session->setFlashdata('msg', warn_msg('Bidang <b>Password</b> dan <b>Confirm Password</b> tidak sama'));
                        return redirect()->to($_SERVER['HTTP_REFERER']);
                    }

                    $password = md5($data['password']);
                    $data['password'] = $password;
                    unset($data['confirm_password']);
                } else {
                    unset($data['confirm_password']);
                    unset($data['password']);
                }

                $proses = $this->tb_user->update($data, array('id_user' => $data['id_user']));

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

        $data = $this->tb_user->getWhere(array('id_user' => decode($id)))->getRow();
        if (empty($data)) {
            throw $this->show404;
        }

        $hapus = $this->tb_user->delete(array('id_user' => decode($id)));

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



/* mikaeilar */
