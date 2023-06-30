<?php

namespace App\Models;

use CodeIgniter\Model;

class Loan_model extends Model {

//    GET NEXT LOAM NO
    public function get_nxt_loan_id() {
        $result = $this->db->query("SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'machanloans_db' AND TABLE_NAME = 'ml_loan_request';");
        return $result->getResult()[0]->AUTO_INCREMENT;
    }

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
            return $result->where(["id" => $id])->get()->getRow();
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

    //GET LOAN GROUP MEMBER BY GROUP
    public function get_grp_members_by_group($group = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'loan_grp_mem a');
        $result->select('a.*, CONCAT(b.first_name, " ", b.last_name) AS member_name');
        $result->join(DB_PREFIX . 'member b', 'a.member = b.id');
        $result->where(["group" => $group]);
        if ($result_type == 0) {
            return $result->get()->getResult();
        } else {
            return $result->get()->getResultArray();
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

    //ADD LOAN REQUEST
    public function add_loan_req_data($data) {
        $this->db->table(DB_PREFIX . 'loan_request')->insert($data);
        return $this->db->insertID();
    }

    //GET LOAN REQUEST
    public function get_loan_req_data($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'loan_request a');
        $result->select('a.*,b.last_amount,c.member_no,b.loan_name AS loan_product,b.int_rate AS lp_int_rate,b.int_rate_per AS lp_int_rate_per,b.term AS lp_term,b.term_per AS lp_term_per, CONCAT(c.first_name, c.last_name) AS mem_name, c.id AS mem_no, c.mobile AS mem_phone');
        $result->join(DB_PREFIX . 'loan_product b', 'a.loan_type = b.id');
        $result->join(DB_PREFIX . 'member c', 'a.member = c.id', 'left');
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

    //GET LOAN REQUEST BY -> where
    public function get_loan_req_data_by($where = []) {
        $result = $this->db->table(DB_PREFIX . 'loan_request a');
        $result->select('a.*,b.last_amount,b.loan_name AS loan_product');
        $result->join(DB_PREFIX . 'loan_product b', 'a.loan_type = b.id');
        $result->where($where);
        return $result->get()->getResult();
    }

    //UPDATE LOAN REQUEST
    public function update_loan_req_data($data, $id) {
        return $this->db->table(DB_PREFIX . 'loan_request')->update($data, ["id" => $id]);
    }

    //DELETE LOAN REQUEST
    public function delete_loan_req_data($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'loan_request')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'loan_request')->delete(["id" => $id]);
        }
    }

    //ADD LOAN PAYMENT
    public function add_loan_pay_data($data) {
        $this->db->table(DB_PREFIX . 'loan_pay')->insert($data);
        return $this->db->insertID();
    }

    //GET LOAN PAYMENT
    public function get_loan_pay_data($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'loan_pay a');
        $result->select('a.*, b.id AS loan_id, c.last_amount, c.int_rate, d.mobile AS mem_phone, CONCAT(d.first_name, d.last_name) AS mem_name');
        $result->join(DB_PREFIX . 'loan_request b', 'a.loan = b.id');
        $result->join(DB_PREFIX . 'loan_product c', 'b.loan_type = c.id');
        $result->join(DB_PREFIX . 'member d', 'a.member = d.id');
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

    //GET LOAN PAYMENT BY -> where
    public function get_loan_pay_data_by($where = []) {
        $result = $this->db->table(DB_PREFIX . 'loan_pay a');
        $result->select('a.*, b.id AS loan_id');
        $result->join(DB_PREFIX . 'loan_request b', 'a.loan = b.id');
        $result->where($where);
        return $result->get()->getResult();
    }

    //GET LOAN PAYMENT BY -> where
    public function get_loan_pay_data_summary($where = []) {
        $result = $this->db->table(DB_PREFIX . 'loan_pay');
        $result->select('SUM(total) AS paid_total, SUM(pen_amount) AS paid_pen_amount, COUNT(id) AS tot_paid_count');
        $result->where($where);
        return $result->get()->getRow();
    }

    //UPDATE LOAN PAYMENT
    public function update_loan_pay_data($data, $id) {
        return $this->db->table(DB_PREFIX . 'loan_pay')->update($data, ["id" => $id]);
    }

    //DELETE LOAN PAYMENT
    public function delete_loan_pay_data($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'loan_pay')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'loan_pay')->delete(["id" => $id]);
        }
    }

    //ADD LOAN GUARANTOR
    public function add_loan_guarantor($data) {
        $this->db->table(DB_PREFIX . 'member_guarantor')->insert($data);
        return $this->db->insertID();
    }

}
