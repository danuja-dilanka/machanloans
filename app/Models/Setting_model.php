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

    //ADD SMS TEMPLATES
    public function add_sms_template($data) {
        $this->db->table(DB_PREFIX . 'sms_template')->insert($data);
        return $this->db->insertID();
    }

    //GET SMS TEMPLATES
    public function get_sms_template_by($where, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'sms_template');
        $result->select('*');
        $result->where($where);
        
        if ($result_type == 0) {
            return $result->get()->getResult();
        } else {
            return $result->get()->getResultArray();
        }
    }

    //UPDATE SMS TEMPLATES
    public function update_sms_template($data, $id) {
        return $this->db->table(DB_PREFIX . 'sms_template')->update($data, ["id" => $id]);
    }

    //DELETE SMS TEMPLATES
    public function delete_sms_template($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'sms_template')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'sms_template')->delete(["id" => $id]);
        }
    }

    //ADD SMS REPLACEMENT CODES
    public function add_sms_rep_code($data) {
        $this->db->table(DB_PREFIX . 'sms_rep_codes')->insert($data);
        return $this->db->insertID();
    }

    //GET SMS REPLACEMENT CODES
    public function get_sms_rep_code_by($where, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'sms_rep_codes');
        $result->select('*');
        $result->where($where);
        
        if ($result_type == 0) {
            return $result->get()->getResult();
        } else {
            return $result->get()->getResultArray();
        }
    }

    //UPDATE SMS REPLACEMENT CODES
    public function update_sms_rep_code($data, $id) {
        return $this->db->table(DB_PREFIX . 'sms_rep_codes')->update($data, ["id" => $id]);
    }

    //DELETE SMS REPLACEMENT CODES
    public function delete_sms_rep_code($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'sms_rep_codes')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'sms_rep_codes')->delete(["id" => $id]);
        }
    }

}
