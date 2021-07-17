<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'tbl_mhs';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'nim', 'email', 'prodi', 'foto'];

    public function getDataMhs($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id])->getRowArray();
        }
    }

    public function prodi()
    {
        return ['Teknik Informatika S1', 'Teknik informatika D3', 'Sistem Informasi S1'];
    }

    // public function tambahMhs($data)
    // {
    //     return $this->db->table($this->table)->insert($data);
    // }

    public function removeMhs($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    public function updateMhs($input, $id)
    {
        return $this->db->table($this->table)->update($input, ['id' => $id]);
    }
}
