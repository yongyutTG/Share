<?php

namespace App\Controllers;

class General extends BaseController {

    public function __construct() {
        $this->db = \Config\Database::connect();
    }

    public function auto_get_member()
    {

        $keyword = $this->request->getVar('term');

        $str_sql = "SELECT TOP 20 dbo.fun_get_name_from_mem(A.mem_id)  AS full_name ,*
        FROM dbo.mem_h_member A 
        WHERE CONCAT(LTRIM(RTRIM(fname)), ' ', LTRIM(RTRIM(lname))) LIKE '%$keyword%'
        ORDER BY mem_id
        ";
        $query = $this->db->query($str_sql);
        $data = $query->getResultArray();
            
        $result = [];
        foreach ($data as $row) {
            $result[] = ['label' => $row['empid'].' '.$row['full_name'], 'mem_id' => $row['mem_id'], 'emp_id' => $row['empid'],'full_name' => $row['full_name']];
        }

        return $this->response->setJSON($result);
    }

    public function auto_get_empid()
    {
        $keyword = $this->request->getVar('term');
        $str_sql = "SELECT TOP 15 dbo.fun_get_name_from_mem(A.mem_id)  AS full_name ,*
        FROM dbo.mem_h_member A 
        WHERE empid LIKE '%".$keyword."%' 
        ORDER BY empid
        ";

        // echo $str_sql;
        // exit;
        $query = $this->db->query($str_sql);
        //$results = $query->getResult();
        $data = $query->getResultArray();
            
        $result = [];
        foreach ($data as $row) {
            $result[] = ['label' => $row['empid'].' '.$row['full_name'], 'mem_id' => $row['mem_id'], 'emp_id' => $row['empid'],'full_name' => $row['full_name']];
        }

        return $this->response->setJSON($result);
    }

    public function auto_get_memid()
    {
        $keyword = $this->request->getVar('term');
        $str_sql = "SELECT TOP 15 dbo.fun_get_name_from_mem(A.mem_id)  AS full_name ,*
        FROM dbo.mem_h_member A 
        WHERE mem_id LIKE '%".$keyword."%' 
        ORDER BY mem_id
        ";

        // echo $str_sql;
        // exit;
        $query = $this->db->query($str_sql);
        //$results = $query->getResult();
        $data = $query->getResultArray();
            
        $result = [];
        foreach ($data as $row) {
            $result[] = ['label' => $row['mem_id'].' '.$row['full_name'], 'mem_id' => $row['mem_id'], 'emp_id' => $row['empid'],'full_name' => $row['full_name']];
        }

        return $this->response->setJSON($result);
    }













}