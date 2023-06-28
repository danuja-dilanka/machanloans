<?php

namespace App\Models;

use CodeIgniter\Model;

class Options_model extends Model {

    //ADD OPTION
    public function add_option($data) {
        $this->db->table(DB_PREFIX . 'options')->insert($data);
        return $this->db->insertID();
    }

    //GET OPTION
    public function get_option($option_name, $result_type = 0) {
        $result = $this->db->table(DB_PREFIX . 'options');
        $result->select('*');
        $result->where(["option_name" => $option_name]);
        if ($result_type == 0) {
            return $result->get()->getRow();
        } else if ($result_type == 1) {
            return $result->get()->getResult();
        } else {
            return $result->get()->getResultArray();
        }
    }

    //UPDATE OPTION
    public function update_option($data, $opt_name) {
        return $this->db->table(DB_PREFIX . 'options')->update($data, ["option_name" => $opt_name]);
    }

    //DELETE OPTION
    public function delete_option($option_name) {
        return $this->db->table(DB_PREFIX . 'options')->delete(["option_name" => $option_name]);
    }

}
