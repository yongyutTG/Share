<?php

namespace App\Models;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\Database\RawSql;
use PHPSQLParser\Test\Parser\issue11Test;


class Home_model extends Model {

    
    public function __construct() {
        $this->db = \Config\Database::connect();
    }


    
        // รายละเอียดสมาชิก
    function verdict_is_nearly_10_years() {
        $str_sql = " SELECT  top 1 empid emp_id,dbo.fun_get_name_from_mem(mem_id) as full_name
        ,A.* 
        FROM dbo.mem_h_member A
        WHERE 1=1
        ";
        //echo $str_sql;
        //exit;
        $query = $this->db->query($str_sql);
        $results = $query->getFirstRow('array');

        return $results;
    }
        




    
}