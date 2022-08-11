<?php

namespace Modules\Log\Controllers;

use App\Controllers\MikaController;

class Log extends MikaController
{
    public function __construct()
    {
        parent::__construct();
        $this->tb_log = $this->db->table('log');
    }

    public function index()
    {
        return $this->layout->display($this->cname, 'index');
    }

    public function get_data()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lists = $this->m_log->getDatatables();
            $data = [];

            foreach ($lists as $list) {
                $row = [];
                $row[] = $list->waktu;
                $row[] = $list->nama;
                $row[] = $list->aktivitas;

                $data[] = $row;
            }

            $output = [
                'draw' => $this->request->getPost('draw'),
                'recordsTotal' => $this->m_log->countAll(),
                'recordsFiltered' => $this->m_log->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }
}



/* mikaeilar */
