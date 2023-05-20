<?php

namespace App\Models;

use CodeIgniter\Model;

class Member_model extends Model {

    public function add_data($data) {
        $this->db->table(DB_PREFIX . 'member')->insert($data);
        return $this->db->insertID();
    }

    public function get_data($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'member a');
        $result->select('a.*,b.email AS login_email');
        $result->join(DB_PREFIX . 'user b', 'a.id = b.rel_id', 'left');
        if ($id > 0) {
            return $result->where(["a.id" => $id])->get()->getRow();
        } else {
            if ($result_type == 0) {
                return $result->where(["b.rel_type" => "member"])->get()->getResult();
            } else {
                return $result->where(["b.rel_type" => "member"])->get()->getResultArray();
            }
        }
    }

    public function get_mem_data($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'member');
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

    public function update_data($data, $id) {
        return $this->db->table(DB_PREFIX . 'member')->update($data, ["id" => $id]);
    }

    public function delete_data($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'member')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'member')->delete(["id" => $id]);
        }
    }

}
