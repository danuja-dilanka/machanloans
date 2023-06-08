<?php

namespace App\Models;

use CodeIgniter\Model;

class Sms_model extends Model {

    public function add_data($data) {
        $this->db->table(DB_PREFIX . 'sms_logs')->insert($data);
        return $this->db->insertID();
    }

}
