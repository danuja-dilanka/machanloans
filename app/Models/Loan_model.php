<?php

namespace App\Models;

use CodeIgniter\Model;

class Loan_model extends Model {

    //ADD LOAN PRODUCT
    public function add_pro_data($data) {
        $this->db->table(DB_PREFIX . 'loan_product')->insert($data);
        return $this->db->insertID();
    }

    //GET LOAN PRODUCT
    public function get_pro_data($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'loan_product');
        $result->select('*');
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

    //UPDATE LOAN PRODUCT
    public function update_pro_data($data, $id) {
        return $this->db->table(DB_PREFIX . 'loan_product')->update($data, ["id" => $id]);
    }

    //DELETE LOAN PRODUCT
    public function delete_pro_data($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'loan_product')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'loan_product')->delete(["id" => $id]);
        }
    }

    //ADD LOAN GROUP
    public function add_group_data($data) {
        $this->db->table(DB_PREFIX . 'loan_grp')->insert($data);
        return $this->db->insertID();
    }

    //GET LOAN GROUP
    public function get_group_data($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'loan_grp');
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

    //UPDATE LOAN GROUP
    public function update_group_data($data, $id) {
        return $this->db->table(DB_PREFIX . 'loan_grp')->update($data, ["id" => $id]);
    }

    //DELETE LOAN GROUP
    public function delete_group_data($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'loan_grp')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'loan_grp')->delete(["id" => $id]);
        }
    }

    //ADD LOAN GROUP MEMBER
    public function add_grp_mem_data($data) {
        $this->db->table(DB_PREFIX . 'loan_grp_mem')->insert($data);
        return $this->db->insertID();
    }

    //GET LOAN GROUP MEMBER
    public function get_grp_mem_data($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'loan_grp_mem');
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

    //UPDATE LOAN GROUP MEMBER
    public function update_grp_mem_data($data, $id) {
        return $this->db->table(DB_PREFIX . 'loan_grp_mem')->update($data, ["id" => $id]);
    }

    //DELETE LOAN GROUP MEMBER
    public function delete_grp_mem_data($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'loan_grp_mem')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'loan_grp_mem')->delete(["id" => $id]);
        }
    }
}
