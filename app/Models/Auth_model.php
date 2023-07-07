<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_model extends Model {

    //GET USER TYPE ACCESS
    public function get_utype_access(int $utype, string $module, string $action, int $force = 0) {
        $result = $this->db->table(DB_PREFIX . 'utype_access a');
        $result->select('a.*');
        $result->join(DB_PREFIX . 'module_action b', 'a.module = b.id');
        $result->join(DB_PREFIX . 'module c', 'b.module = c.id');
        $result->where(["a.utype" => $utype, "c.code" => $module, "b.action" => $action]);
        if ($force == 0) {
            $result->where(["b.status" => 1, "c.status" => 1]);
            $access = $result->get()->getRow();
            if (isset($access->id)) {
                return true;
            }

            return false;
        }

        return $result->get()->getRow();
    }

    //ADD USER ACCESS
    public function add_user_access(array $data) {
        $this->db->table(DB_PREFIX . 'user_access')->insert($data);
        return $this->db->insertID();
    }

    //ADD USER TYPE ACCESS
    public function add_user_type_access(array $data) {
        $this->db->table(DB_PREFIX . 'utype_access')->insert($data);
        return $this->db->insertID();
    }

    //UPDATE USER ACCESS
    public function update_user_access(array $data, int $id) {
        return $this->db->table(DB_PREFIX . 'user_access')->update($data, ["id" => $id]);
    }

    //UPDATE USER TYPE ACCESS
    public function update_user_type_access(array $data, int $id) {
        return $this->db->table(DB_PREFIX . 'utype_access')->update($data, ["id" => $id]);
    }

    //GET USER ACCESS
    public function get_user_access(int $user, string $module, string $action, int $force = 0) {
        $result = $this->db->table(DB_PREFIX . 'user_access a');
        $result->select('a.*');
        $result->join(DB_PREFIX . 'module_action b', 'a.module = b.id');
        $result->join(DB_PREFIX . 'module c', 'b.module = c.id');
        $result->where(["a.user" => $user, "c.code" => $module, "b.action" => $action]);
        if ($force == 0) {
            $result->where(["b.status" => 1, "c.status" => 1]);
            $access = $result->get()->getRow();
            if (isset($access->id)) {
                return true;
            }

            return false;
        }

        return $result->get()->getRow();
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
    public function get_user(string $email, int $status = 1) {
        $result = $this->db->table(DB_PREFIX . 'user a');
        $result->select('a.*,b.utype AS utype_name');
        $result->join(DB_PREFIX . 'user_type b', 'a.utype = b.id');
        return $result->where(["a.email" => $email, "a.status" => $status])->get()->getRow();
    }

    //GET USER BY MEMBER
    public function get_user_by_member(string $member) {
        $result = $this->db->table(DB_PREFIX . 'user a');
        $result->select('a.*,b.utype AS utype_name');
        $result->join(DB_PREFIX . 'user_type b', 'a.utype = b.id');
        return $result->where(["a.rel_id" => $member, "a.rel_type" => 'member'])->get()->getRow();
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
