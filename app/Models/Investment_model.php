<?php

namespace App\Models;

use CodeIgniter\Model;

class Investment_model extends Model {

    //ADD INVESTMENT ACCOUNT
    public function add_invest_acc_data($data) {
        $this->db->table(DB_PREFIX . 'invest_acc')->insert($data);
        return $this->db->insertID();
    }

    //GET INVESTMENT ACCOUNT
    public function get_invest_acc_data($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'invest_acc');
        if ($id > 0) {
            return $result->where(["id" => $id])->get()->getRow();
        } else {
            if ($result_type == 0) {
                return $result->get()->getResult();
            } else {
                return $result->get()->getResultArray();
            }
        }
    }

    //GET INVESTMENT ACCOUNT BY -> where
    public function get_invest_acc_data_by($where = []) {
        $result = $this->db->table(DB_PREFIX . 'invest_acc');
        $result->select('*');
        $result->where($where);
        return $result->get()->getResult();
    }

    //UPDATE INVESTMENT ACCOUNT
    public function update_invest_acc_data($data, $id) {
        return $this->db->table(DB_PREFIX . 'invest_acc')->update($data, ["id" => $id]);
    }

    //DELETE INVESTMENT ACCOUNT
    public function delete_invest_acc_data($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'invest_acc')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'invest_acc')->delete(["id" => $id]);
        }
    }

}
