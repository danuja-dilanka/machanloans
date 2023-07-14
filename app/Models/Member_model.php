<?php

namespace App\Models;

use CodeIgniter\Model;

class Member_model extends Model {

    public function add_data($data) {
        $this->db->table(DB_PREFIX . 'member')->insert($data);
        return $this->db->insertID();
    }

    public function add_unreg_member($data) {
        $this->db->table(DB_PREFIX . 'unreg_member')->insert($data);
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

    public function tranfer_unreg_to_reg_mem($id = 0) {
        $unreg_mem = $this->get_unreg_mem_data($id);
        $member_id = 0;
        if (isset($unreg_mem->id)) {
            $data = json_decode(json_encode($unreg_mem), TRUE);
            $ins_id = $this->add_unreg_member([
                "first_name" => $data["first_name"],
                "last_name" => $data["last_name"],
                "google_location" => $data["google_location"],
                "name_with_ini" => $data["full_name"],
                "birthday" => $data["birthday"],
                "email" => $data["email"],
                "mobile" => $data["phone"],
                "whatsapp" => $data["whatsapp"],
                "address" => $data["residential_address"],
                "cred_address" => $data["current_address"],
                "business_name" => $data["employment"],
                "working_address" => $data["employment_address"],
                "nic" => $data["nic"],
                "branch_name" => $data["branch_name"],
                "acc_number" => $data["acc_number"],
                "bank_name" => $data["bank_name"],
                "crowd_name" => $data["memberships"],
                "spouse_name" => $data["spouse_name"],
                "spouse_tel_number" => $data["spouse_tel_number"],
                "nic_back" => $data["nic_back"],
                "nic_front" => $data["nic_front"],
                "spouse_nic_front" => $data["spouse_nic_front"],
                "spouse_nic_back" => $data["spouse_nic_back"],
                "civil_status" => $data["marital_status"],
                "gender" => $data["gender"],
                "city" => $data["city"],
                'rel_friend1' => $data["friend1_name"],
                'rel_friend1_phone' => $data["friend1_phone"],
                'rel_friend1_address' => $data["friend1_address"],
                'rel_friend2' => $data["friend2_name"],
                'rel_friend2_phone' => $data["friend2_phone"],
                'rel_friend2_address' => $data["friend2_address"],
                'fb_screenshot' => $data["fb_screenshot"],
                'selfie' => $data["selfie"],
                'photo' => $data["photo"],
                'electricity_bill' => $data["electricity_bill"]
            ]);
            if ($ins_id > 0) {
                $member_id = $ins_id;
            }
        }
        
        return $member_id;
    }

    public function get_unreg_mem_data($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'unreg_member');
        $result->select('*, CONCAT(first_name, " ", last_name) AS full_name');
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

    public function delete_unreg_mem_data($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'unreg_member')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'unreg_member')->delete(["id" => $id]);
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

    //UPDATE MEMBER DOCUMENT BY MEMBER
    public function update_doc_by_mem($data, $member) {
        return $this->db->table(DB_PREFIX . 'member_doc')->update($data, ["member" => $member]);
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

    //ADD MEMBER SMS WISHES
    public function add_sms_wish($data) {
        $this->db->table(DB_PREFIX . 'sms_wishes')->insert($data);
        return $this->db->insertID();
    }

    //UPDATE MEMBER SMS WISHES
    public function update_sms_wish($data, $id) {
        return $this->db->table(DB_PREFIX . 'sms_wishes')->update($data, ["id" => $id]);
    }

    //GET MEMBER SMS WISHES BY -> where
    public function get_sms_wishs_by($where = []) {
        $result = $this->db->table(DB_PREFIX . 'sms_wishes');
        $result->select('*');
        $result->where($where);
        return $result->get()->getResult();
    }

    //DELETE MEMBER SMS WISHES
    public function delete_sms_wishs($id = 0, $where = []) {
        if ($id == 0) {
            return $this->db->table(DB_PREFIX . 'sms_wishes')->delete($where);
        } else {
            return $this->db->table(DB_PREFIX . 'sms_wishes')->delete(["id" => $id]);
        }
    }

}
