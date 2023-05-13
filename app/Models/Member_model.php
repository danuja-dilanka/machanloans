<?php

namespace App\Models;

use CodeIgniter\Model;

class Member_model extends Model {

    public function add_data($data) {
        $this->db->table(DB_PREFIX . 'member')->insert($data);
        return $this->db->insertID();
    }

    public function get_data($id = 0, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'member');
        if ($id > 0) {
            return $result->where(["id" => $id])->get()->getRow();
        } else {
            if($result_type == 0){
                return $result->where(["id" => $id])->get()->getResult();
            }else{
                return $result->where(["id" => $id])->get()->getResultArray();
            }
            
        }
    }

    public function update_data($data, $id) {
        return $this->db->table(DB_PREFIX . 'member')->update($data, ["id" => $id]);
    }
    
    public function delete_data($id = 0, $where = []) {
        if($id == 0){
            return $this->db->table(DB_PREFIX . 'member')->delete($where);
        }else{
            return $this->db->table(DB_PREFIX . 'member')->delete(["id" => $id]);
        }
        
    }

}
