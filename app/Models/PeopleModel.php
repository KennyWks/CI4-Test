<?php

namespace App\Models;

use CodeIgniter\Model;

class PeopleModel extends Model
{
    protected $table = 'tbl_people';

    public function getProduct($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function search($keyword)
    {
        //     $builder = $this->table('tbl_people');
        //     $builder->like('nama', $keyword);
        //     return $builder;
        return $this->table($this->table)->like('nama', $keyword)->orLike('alamat', $keyword);
    }

    // public function getDataOrang()
    // { 
    //     $db      = \Config\Database::connect();
    //     $builder = $db->table('tbl_people');
    //     return $builder->get()->getResultArray();
    // }
}
