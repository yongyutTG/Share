<?php

namespace App\Models;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\Database\RawSql;
use PHPSQLParser\Test\Parser\issue11Test;

class Debtor_model extends Model {
    protected $tableSys_user_logs = 'sys_user_logs';
    protected $tableSys_users = 'sys_users';
    protected $table_sys_user_group_mapping = 'sys_user_group_mapping';
    protected $table_sys_user_permission = 'sys_user_permission';


    public function __construct() {
        $this->db = \Config\Database::connect();
    }


    // รายละเอียดสมาชิก 2 
    function member_detail2($emp_id, $mem_id) {

        $str_sql = " SELECT  empid emp_id,dbo.fun_get_name_from_mem(A.mem_id) as full_name
        
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
        
        return $results;



    }
        // รายละเอียดสมาชิก
    function member_detail($emp_id, $mem_id) {

        $str_sql = " SELECT  empid emp_id,dbo.fun_get_name_from_mem(A.mem_id) as full_name
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
        
        return $results;



    }
        // สัญญา
    function contract_list($emp_id, $mem_id) {

        $str_sql = " SELECT empid,dbo.fun_get_name_from_mem(A.mem_id)  AS full_name
        ,A.* FROM [dbo].[loan_m_contact] A
            LEFT JOIN  dbo.mem_h_member B ON A.mem_id = B.mem_id 
            LEFT JOIN 	dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id
        WHERE lcont_status_cont <> 'P'
        ";
        if($mem_id != ''){
        $str_sql .= "  AND B.mem_id = '$mem_id'    ";
        }
        if($emp_id != ''){
        $str_sql .= "  AND B.empid = '$emp_id'    ";
        }
        $str_sql .= " ORDER BY lcont_amount_sal DESC ,flag_judgment DESC   ";
        

        // echo $str_sql;
        // exit;

        $query = $this->db->query($str_sql);
        //$results = $query->getResult();
        $results = $query->getResultArray();
        return $results;
    }
        //คนค้ำ
    function contract_guar($emp_id, $mem_id) {

        $str_sql = " SELECT *
                    FROM(
                        SELECT empid empid1,dbo.fun_get_name_from_mem(A.mem_id)  AS full_name 
                        ,Trim(lcont_id) lcont_id2
                        ,lcont_amount_sal lcont_amount_sal2
                        ,flag_judgment
                         
                        FROM [dbo].[loan_m_contact] A 
                            LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id 
                            LEFT JOIN dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id 
                        WHERE lcont_status_cont<>'P'
                        AND lcont_status_flag <> '4'
                        AND lcont_amount_sal > 0 
                        AND SUBSTRING(lcont_id,4,1) = '_'
        ";
        if($mem_id != ''){
        $str_sql .= "  AND B.mem_id = '$mem_id'    ";
        }
        if($emp_id != ''){
        $str_sql .= "  AND B.empid = '$emp_id'    ";
        }

        $str_sql .= " )A
                        LEFT JOIN (
                            SELECT empid,dbo.fun_get_name_from_mem(A.mem_id)  AS full_name_guar 
                            ,Trim(lcont_id) lcont_id2,A.*
                            FROM dbo.loan_t_guar_eme A
                                LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id 
                                LEFT JOIN dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id 
                                WHERE 1=1
        ";
        if($mem_id != ''){
        $str_sql .= "  AND B.mem_id = '$mem_id'    ";
        }
        if($emp_id != ''){
        $str_sql .= "  AND B.empid = '$emp_id'    ";
        }
         $str_sql .= "
                    UNION ALL
                            SELECT empid,dbo.fun_get_name_from_mem(A.mem_id)  AS full_name_guar 
                            ,Trim(lcont_id) lcont_id2,A.*
                            FROM dbo.loan_t_guar_ncm A
                                LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id 
                                LEFT JOIN dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id 
                                WHERE 1=1
        ";
        if($mem_id != ''){
        $str_sql .= "  AND B.mem_id = '$mem_id'    ";
        }
        if($emp_id != ''){
        $str_sql .= "  AND B.empid = '$emp_id'    ";
        }
         $str_sql .= "
                    UNION ALL
                            SELECT empid,dbo.fun_get_name_from_mem(A.mem_id)  AS full_name_guar 
                            ,Trim(lcont_id) lcont_id2,A.*
                            FROM dbo.loan_t_guar_ncr A
                                LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id 
                                LEFT JOIN dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id 
                                WHERE 1=1
        ";
        if($mem_id != ''){
        $str_sql .= "  AND B.mem_id = '$mem_id'    ";
        }
        if($emp_id != ''){
        $str_sql .= "  AND B.empid = '$emp_id'    ";
        }
         $str_sql .= "
                    UNION ALL
                            SELECT empid,dbo.fun_get_name_from_mem(A.mem_id)  AS full_name_guar 
                            ,Trim(lcont_id) lcont_id2,A.*
                            FROM dbo.loan_t_guar_nfp A
                                LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id 
                                LEFT JOIN dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id 
                                WHERE 1=1
        ";
        if($mem_id != ''){
        $str_sql .= "  AND B.mem_id = '$mem_id'    ";
        }
        if($emp_id != ''){
        $str_sql .= "  AND B.empid = '$emp_id'    ";
        }
         $str_sql .= "
                    UNION ALL
                            SELECT empid,dbo.fun_get_name_from_mem(A.mem_id)  AS full_name_guar 
                            ,Trim(lcont_id) lcont_id2,A.*
                            FROM dbo.loan_t_guar_nhc A
                                LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id 
                                LEFT JOIN dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id 
                                WHERE 1=1
        ";
        if($mem_id != ''){
        $str_sql .= "  AND B.mem_id = '$mem_id'    ";
        }
        if($emp_id != ''){
        $str_sql .= "  AND B.empid = '$emp_id'    ";
        }
         $str_sql .= "
                        )B ON A.lcont_id2 = trim(B.lcont_id2)

                    WHERE B.full_name_guar IS NOT NULL ";
        $str_sql .= " ORDER BY A.lcont_amount_sal2 DESC ";

        // echo $str_sql;
        // exit;

        $query = $this->db->query($str_sql);
        //$results = $query->getResult();
        $results = $query->getResultArray();
        return $results;
    }
        //คำ้คนอื่น
    function contract_guarantee($emp_id, $mem_id){

        if($mem_id != ''){
            
            $str_sqlguarantee = "  WHERE B.mem_id = '$mem_id'    ";
            }
        if($emp_id != ''){
        
        $str_sqlguarantee = "  WHERE B.empid = '$emp_id'    ";
        }

        if($emp_id != '' && $mem_id != ''){
        
            $str_sqlguarantee = "  WHERE B.empid = '$emp_id'  AND B.mem_id = '$mem_id'   ";
            }

        $str_sql = " SELECT B.* FROM (
                SELECT dbo.fun_get_name_from_mem(A.mem_id)  AS full_name_guar 
                ,Trim(lcont_id) lcont_id2
                FROM dbo.loan_t_guar_eme A
                    LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id 
                    LEFT JOIN dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id 
        ";
        $str_sql .=$str_sqlguarantee;

        $str_sql .= " UNION ALL
            SELECT dbo.fun_get_name_from_mem(A.mem_id)  AS full_name_guar 
            ,Trim(lcont_id) lcont_id2
            FROM dbo.loan_t_guar_ncm A
                LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id 
                LEFT JOIN dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id 
        ";
        $str_sql .=$str_sqlguarantee;

        $str_sql .= " UNION ALL
            SELECT dbo.fun_get_name_from_mem(A.mem_id)  AS full_name_guar 
            ,Trim(lcont_id) lcont_id2
            FROM dbo.loan_t_guar_ncr A
                LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id 
                LEFT JOIN dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id 
        ";
        $str_sql .=$str_sqlguarantee;

        $str_sql .= " UNION ALL
                SELECT dbo.fun_get_name_from_mem(A.mem_id)  AS full_name_guar 
                ,Trim(lcont_id) lcont_id2
                FROM dbo.loan_t_guar_nfp A
                    LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id 
                    LEFT JOIN dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id 
        ";
        $str_sql .=$str_sqlguarantee;

        $str_sql .= " UNION ALL
                SELECT dbo.fun_get_name_from_mem(A.mem_id)  AS full_name_guar 
                ,Trim(lcont_id) lcont_id2
                FROM dbo.loan_t_guar_nhc A
                    LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id 
                    LEFT JOIN dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id  
        ";
        $str_sql .=$str_sqlguarantee;

        $str_sql .= " )A
                INNER JOIN (
                SELECT empid empid_borrower,dbo.fun_get_name_from_mem(A.mem_id)  AS full_name
                ,A.* 
                FROM [dbo].[loan_m_contact] A
                    LEFT JOIN  dbo.mem_h_member B ON A.mem_id = B.mem_id 
                    LEFT JOIN 	dbo.mem_m_ptitle C ON C.ptitle_id = B.ptitle_id
                    WHERE lcont_amount_sal>0
                    AND lcont_status_cont<>'P'
                            AND lcont_status_flag <> '4'
                        )B ON A.lcont_id2 = B.lcont_id

                        ORDER BY b.lcont_amount_sal DESC
                ";
            $query = $this->db->query($str_sql);

            //echo $str_sql;
            //echo $this->db->getLastQuery();
            //exit;
            //$results = $query->getResult();
            $results = $query->getResultArray();

            return $results;

    }



        //สืบทรัพ 1 จำนวนรวมครั้งที่สืบ
    function count_invest_no($emp_id, $mem_id){
        $str_sql = " SELECT invest_no
                    FROM [dbo].[loan_investigate_land] A 
                        LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id		
                    WHERE 1=1  
                        ";

        if($mem_id != ''){
            $str_sql .= "  AND B.mem_id = '$mem_id'    ";
            }
        if($emp_id != ''){
        $str_sql .= "  AND B.empid = '$emp_id'    ";
        }
   
          $str_sql .= "  GROUP BY invest_no
                         ORDER BY invest_no DESC ";
        
        $query = $this->db->query($str_sql);
        //$results = $query->getResult();
        $results = $query->getResultArray();
        return $results;

    } 
        //สืบทรัพ 2 detail ที่สืบ
    function invest_detail($emp_id, $mem_id){
        $str_sql = " SELECT *
                    FROM [dbo].[loan_investigate_land] A 
                        LEFT JOIN dbo.mem_h_member B ON A.mem_id = B.mem_id		
                    WHERE 1=1  
                        ";

        if($mem_id != ''){
            $str_sql .= "  AND B.mem_id = '$mem_id'    ";
            }
        if($emp_id != ''){
        $str_sql .= "  AND B.empid = '$emp_id'    ";
        }
   
          $str_sql .= "  ORDER BY invest_no DESC ";
        
        //echo $str_sql;
        //exit;
        $query = $this->db->query($str_sql);
        //$results = $query->getResult();
        $results = $query->getResultArray();
        return $results;
        

    }

    





}