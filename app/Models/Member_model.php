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
        $result->select('a.*,b.email AS login_email, CONCAT(a.first_name, " ", a.last_name) AS full_name');
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
        $result->select('*, CONCAT(first_name, " ", last_name, " (", member_no, ")") AS full_name');
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

    //GET MEMBERS BY -> where
    public function get_mem_data_by($where = []) {
        $result = $this->db->table(DB_PREFIX . 'member');
        $result->select('*');
        $result->where($where);
        return $result->get()->getResult();
    }

//    GET NEXT MEMBERS NO
    public function get_nxt_mem_no() {
        $result = $this->db->query("SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'machanloans_db' AND TABLE_NAME = 'ml_member';");
        return $result->getResult()[0]->AUTO_INCREMENT;
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

    //ADD MEMBER DOCUMENT
    public function add_doc($data) {
        $this->db->table(DB_PREFIX . 'member_doc')->insert($data);
        return $this->db->insertID();
    }

    //UPDATE MEMBER DOCUMENT
    public function update_doc($data, $id) {
        return $this->db->table(DB_PREFIX . 'member_doc')->update($data, ["id" => $id]);
    }

    //GET MEMBER DOCUMENTS BY -> where
    public function get_docs_by($where = []) {
        $result = $this->db->table(DB_PREFIX . 'member_doc');
        $result->select('*');
        $result->where($where);
        return $result->get()->getResult();
    }

    //DELETE MEMBER DOC
    public function delete_docs($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'member_doc')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'member_doc')->delete(["id" => $id]);
        }
    }

}
