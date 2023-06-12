<?php

namespace App\Models;

use CodeIgniter\Model;

class Common_model extends Model {

    //GET QUERY DATA
    public function get_data(string $query, int $result_type = 0) {
        $results = $this->db->query($query);
        if ($result_type == 0) {
            return $results->getRow();
        }elseif ($result_type == 1) {
            return $results->getResult();
        }else{
            return $results->getResultArray();
        }
    }

}
