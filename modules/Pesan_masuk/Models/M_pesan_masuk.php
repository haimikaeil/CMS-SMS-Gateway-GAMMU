<?php

namespace Modules\Pesan_masuk\Models;

use CodeIgniter\Model;

class M_pesan_masuk extends Model
{
    protected $table = 'inbox';
    protected $field = ['ReceivingDateTime,SenderNumber,TextDecoded, is_baca'];
    protected $order = ['ReceivingDateTime' => 'DESC'];
    protected $db;
    protected $dt;

    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
        $this->dt = $this->db->table($this->table);
        $this->column_order     = $this->field;
        $this->column_search    = $this->field;
    }

    private function getDatatablesQuery()
    {

        $field = implode(",", $this->field);

        $this->dt->select($field);

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $_POST['search']['value']);
                } else {
                    $this->dt->orLike($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if (!empty($_POST['order'])) {
            $this->dt->orderBy($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    public function getDatatables()
    {
        $this->getDatatablesQuery();
        if ($_POST['length'] != -1)
            $this->dt->limit($_POST['length'], $_POST['start']);
        $query = $this->dt->get();
        return $query->getResult();
    }

    public function countFiltered()
    {
        $this->getDatatablesQuery();
        return $this->dt->countAllResults();
    }

    public function countAll()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }
}
