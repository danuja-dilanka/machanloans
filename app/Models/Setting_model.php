<?php

namespace App\Models;

use CodeIgniter\Model;

class Setting_model extends Model {

    //GET MAIN MODULES

    public function get_module($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'module');
        $result->select('*');
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

    //GET MAIN MODULE ACTIONS

    public function get_module_action($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'module_action a');
        $result->select('a.*, b.name AS main_module_name, b.code AS main_module_code, b.status AS main_module_status');
        $result->join(DB_PREFIX . 'module b', 'a.module = b.id');
        if ($id > 0) {
            return $result->where(["a.id" => $id])->get()->getRow();
        } else {
            if ($result_type == 0) {
                return $result->get()->getResult();
            } else {
                return $result->get()->getResultArray();
            }
        }
    }

    //GET MAIN MODULE ACTIONS BY -> where

    public function get_module_action_by($where = [], $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'module_action a');
        $result->select('a.*, b.name AS main_module_name, b.code AS main_module_code, b.status AS main_module_status');
        $result->join(DB_PREFIX . 'module b', 'a.module = b.id');
        $result->where($where);
        if ($result_type == 0) {
            return $result->get()->getResult();
        } else {
            return $result->get()->getResultArray();
        }
    }

}
