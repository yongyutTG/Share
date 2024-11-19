<?php

namespace App\Models;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\Database\RawSql;
use PHPSQLParser\Test\Parser\issue11Test;


class Expenseinspec_model extends Model {
    protected $tableSys_user_logs = 'sys_user_logs';
    protected $tableSys_users = 'sys_users';
    protected $table_sys_user_group_mapping = 'sys_user_group_mapping';
    protected $table_sys_user_permission = 'sys_user_permission';


    public function __construct() {
        $this->db = \Config\Database::connect();
        
    }


    
        // รายละเอียดสมาชิก
    function member_detail($emp_id, $mem_id) {
        $str_sql = " SELECT  empid emp_id,dbo.fun_get_name_id_from_mem(mem_id) as full_name
        ,A.* 
        FROM dbo.mem_h_member A
        WHERE 1=1
        ";
        if($mem_id != ''){
        $str_sql .= "  AND A.mem_id = '$mem_id'    ";
        }
        if($emp_id != ''){
        $str_sql .= "  AND A.empid = '$emp_id'    ";
        }
        //echo $str_sql;
        //exit;
        $query = $this->db->query($str_sql);
        $results = $query->getFirstRow('array');
        
        //echo $this->db->getCompiledSelect(false);
        //$results = $query->getResult();
        //$results = $query->getResultArray();

        /* OK แล้ววววววววววววว

        // $builder = $this->db->table('mem_h_member');
        // $builder->select('empid,dbo.fun_get_name_from_mem(mem_id) as full_name');
        // if($mem_id != ''){
        //         $builder->where('mem_id', $mem_id);
        //     }
        //     if($emp_id != ''){
        //         $builder->where('empid', $emp_id);
        //     }
        //     echo $builder->getCompiledSelect(false);
        //     $results = $builder->get()->getFirstRow('array');
        //    // print_r($builder);
        //     //exit;

        */
            return $results;



    }
        
    function Expense_detail($ioc_number) {

        
        $str_sql = " SELECT convert(varchar, DATEADD(YEAR, 543, date_paied), 105) as Data_date_paied,dbo.fun_get_username_from_user_id(update_user) user_name
            ,A.paied_name paied_nameA
            ,A.*
            ,B.paied_name paied_nameB
            ,B.*
                FROM dbo.loan_t_law_paied A 
                    LEFT JOIN dbo.loan_law_paied_type B ON A.paied_type = B.paied_type  
                WHERE 1=1 
        ";
        if($ioc_number != ''){ 
            $str_sql .= " AND LTRIM(RTRIM(ioc_no)) = '".$ioc_number."' ";
        }
            $str_sql .= " ORDER BY update_time DESC,A.paied_type,lcont_id  ";

            
            $query = $this->db->query($str_sql);
            //$results = $query->getResult();
            $results = $query->getResultArray();
            return $results;
    }
        //
    function Expense_summary($ioc_number) {
        // $builder = $this->db->table($this->tableSys_users);
        // $builder->select("*");
        // $builder->where('email', trim($email));
        // $builder->where('password', md5($password));
        // $builder->where('status', '1');
        // $data = $builder->get()->getFirstRow();
        // return $data;

        $str_sql = " SELECT B.paied_name,SUM(amount_paied) amount_paied ,COUNT(lcont_id) lcont_id
                    FROM dbo.loan_t_law_paied A --ON B.lcont_id = C.lcont_id   COLLATE Thai_100_CI_AS
                        LEFT JOIN dbo.loan_law_paied_type B ON A.paied_type = B.paied_type  
                    WHERE --CAST(A.update_time AS DATE) = CAST(@sdate AS DATE)
                    1 = 1 
                    --A.paied_type IN ('03','04','41')
                    --AND A.update_user = 'CR6907'
                    --AND trim(remark1) Like '%$ioc_number%'
                    
        ";
        if($ioc_number != ''){
        $str_sql .= "   AND trim(ioc_no) = '".$ioc_number."'";
        }
        $str_sql .= "  GROUP BY  B.paied_name  ";
        $query = $this->db->query($str_sql);
        //$results = $query->getResult();
        $results = $query->getResultArray();
        return $results;
    }
        //คำ้คนอื่น


    
}