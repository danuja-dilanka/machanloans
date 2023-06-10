<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model {

    public function add_data($data) {
        $this->db->table(DB_PREFIX . 'user')->insert($data);
        return $this->db->insertID();
    }

    public function get_data($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'user a');
        $result->select('a.*, b.utype AS utype_name');
        $result->join(DB_PREFIX . 'user_type b', 'a.utype = b.id');
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

    public function get_user_types($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'user_type');
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

    public function add_user_type($data) {
        $this->db->table(DB_PREFIX . 'user_type')->insert($data);
        return $this->db->insertID();
    }

    public function update_user_type($data, $id) {
        return $this->db->table(DB_PREFIX . 'user_type')->update($data, ["id" => $id]);
    }

    public function delete_user_type($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'user_type')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'user_type')->delete(["id" => $id]);
        }
    }

    public function get_data_by($where) {
        return $this->db->table(DB_PREFIX . 'user')->where($where)->get()->getResult();
    }

    public function update_data($data, $id) {
        return $this->db->table(DB_PREFIX . 'user')->update($data, ["id" => $id]);
    }

    public function delete_data($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'user')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'user')->delete(["id" => $id]);
        }
    }

}
