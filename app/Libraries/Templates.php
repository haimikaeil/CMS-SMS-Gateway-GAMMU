<?php

namespace App\Libraries;

class Templates
{

    public function __construct()
    {
        $this->db       = \Config\Database::connect();
        $this->request  = \Config\Services::request();
    }

    public function display($cname = '', $view = '', $data = null)
    {
        $data['request'] = $this->request;

        $uri = $this->request->uri->getSegment(1);
        $tb_menu = $this->db->table('menu');
        $tb_menu->where('link', $uri);
        $menu = $tb_menu->get(1)->getRow();

        if (!empty($menu)) {
            $data['title']  = ucfirst($menu->nama);
            $data['icon']   = $menu->icon;
            $data['cname']  = $menu->link;
        }

        $user_login = session()->get('user_login');

        if ($user_login) {
            $data['menu'] = $this->generate_menu();
        } else {
            return redirect()->to(BASE . '/login');
        }

        return view("Modules\\$cname\Views\\$view", $data);
    }

    function generate_menu()
    {
        $menu = $this->db->table('menu');
        $menu->where('status', "Y");
        $menu->orderBy('tipe', "asc");
        $menu->orderBy('id_menu', "asc");
        $data_menu = $menu->get()->getResult();

        $data = array();
        foreach ($data_menu as $key => $c) {
            $data[$c->tipe][] = $c;
        }

        return $data;
    }

    public function simpan_log($id_user = '', $id_cs = '', $aktivitas = '')
    {
        $log = array('id_user' => $id_user, 'id_cs' => $id_cs, 'aktivitas' => $aktivitas, 'waktu' => date('Y-m-d H:i:s'));
        $tb_log = $this->db->table('log');
        $tb_log->insert($log);
    }
}


/* mikaeilar */
