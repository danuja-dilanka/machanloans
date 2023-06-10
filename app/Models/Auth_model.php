<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_model extends Model {

    //GET USER TYPE ACCESS
    public function get_utype_access(int $utype, string $module, string $action) {
        $result = $this->db->table(DB_PREFIX . 'utype_access a');
        $result->select('a.*');
        $result->join(DB_PREFIX . 'module_action b', 'a.module = b.id');
        $result->join(DB_PREFIX . 'module c', 'b.module = c.id');
        $access = $result->where(["a.utype" => $utype, "c.code" => $module, "b.action" => $action, "b.status" => 1, "c.status" => 1])->get()->getRow();
        if (isset($access->id)) {
            return true;
        }

        return false;
    }

    //GET USER ACCESS
    public function get_user_access(int $user, string $module, string $action) {
        $result = $this->db->table(DB_PREFIX . 'user_access a');
        $result->select('a.*');
        $result->join(DB_PREFIX . 'module_action b', 'a.module = b.id');
        $result->join(DB_PREFIX . 'module c', 'b.module = c.id');
        $access = $result->where(["a.user" => $user, "c.code" => $module, "b.action" => $action, "b.status" => 1, "c.status" => 1])->get()->getRow();
        if (isset($access->id)) {
            return true;
        }

        return false;
    }

    //GET USERS
    public function get_users(int $id = 0, int $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'user a');
        $result->select('a.*,b.utype AS utype_name');
        $result->join(DB_PREFIX . 'user_type b', 'a.utype = b.id');
        $result->where("a.status", 1);

        if ($id > 0) {
            $result->where(["a.id" => $id]);
        }
        if ($result_type == 0) {
            return $result->get()->getResult();
        } else {
            return $result->get()->getResultArray();
        }
    }

    //GET USERS BY -> where
    public function get_users_by($where, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'user a');
        $result->select('a.*,b.utype AS utype_name');
        $result->join(DB_PREFIX . 'user_type b', 'a.utype = b.id');
        $result->where("a.status", 1);
        $result->where($where);

        if ($result_type == 0) {
            return $result->get()->getResult();
        } else {
            return $result->get()->getResultArray();
        }
    }

    //GET USER
    public function get_user(string $email) {
        $result = $this->db->table(DB_PREFIX . 'user a');
        $result->select('a.*,b.utype AS utype_name');
        $result->join(DB_PREFIX . 'user_type b', 'a.utype = b.id');
        return $result->where(["a.email" => $email, "a.status" => 1])->get()->getRow();
    }

    //GET USER TYPE
    public function get_user_type(int $id) {
        $result = $this->db->table(DB_PREFIX . 'user_type');
        $result->select('*');
        return $result->where(["id" => $id, "status" => 1])->get()->getRow();
    }

    //GET USER TYPES BY -> where
    public function get_user_types_by($where, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'user_type');
        $result->select('*');
        $result->where("status", 1);
        $result->where($where);

        if ($result_type == 0) {
            return $result->get()->getResult();
        } else {
            return $result->get()->getResultArray();
        }
    }

    //GET PARENT NAV
    public function get_parent_nav() {
        $result = $this->db->table(DB_PREFIX . 'parent_nav a');
        $result->select('a.*,c.name AS module_name,b.action AS action_name');
        $result->join(DB_PREFIX . 'module_action b', 'a.module = b.id');
        $result->join(DB_PREFIX . 'module c', 'b.module = c.id');
        $result->where(["a.status" => 1]);

        $result->orderBy('a.m_order', "ASC");
        return $result->get()->getResult();
    }

    //GET PARENT -> CHILD NAV
    public function get_child_nav(int $parent = 0) {
        $result = $this->db->table(DB_PREFIX . 'child_nav a');
        $result->select('a.*,c.name AS module_name,b.action AS action_name');
        $result->join(DB_PREFIX . 'module_action b', 'a.module = b.id');
        $result->join(DB_PREFIX . 'module c', 'b.module = c.id');
        $result->where('a.status', 1);
        if ($parent > 0) {
            $result->where('a.parent', $parent);
        }

        $result->orderBy('a.sm_order', "ASC");
        return $result->get()->getResult();
    }

}
