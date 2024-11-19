<?php

namespace App\Models;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\Database\RawSql;
use PHPSQLParser\Test\Parser\issue11Test;

class Center_model extends Model {
    protected $tableSys_user_logs = 'sys_user_logs';
    protected $tableSys_users = 'sys_users';
    protected $table_sys_user_group_mapping = 'sys_user_group_mapping';
    protected $table_sys_user_permission = 'sys_user_permission';

    protected $table_SWG_Station = 'SWG_Station';
    protected $table_GroupLevel1 = 'GroupLevel1';
    protected $table_GroupLevel2 = 'GroupLevel2';

    public function __construct() {
        $this->db = \Config\Database::connect();
    }
    function AuthLogin($email, $password) {
        $builder = $this->db->table($this->tableSys_users);
        $builder->select("*");
        $builder->where('email', trim($email));
        $builder->where('password', md5($password));
        $builder->where('status', '1');
        $data = $builder->get()->getFirstRow();
        return $data;
    }
    public function add_log($module_id, $actions = null, $message = null, $user_id = null, $system_id = null, $is_channel = null) {

        $module = is_numeric($module_id) ? true : false;
        if ($module == true) {
            $data = [
                'module_id' => $module_id == null ? 0 : $module_id,
                'actions' => $actions,
                'message' => json_encode($message),
                'user_id' => $user_id == null ? $_SESSION['user_id'] : $user_id,
                'system_id' => $system_id == null ? 0 : $system_id,
                'is_channel' => $is_channel,
                'create_date' => date('Y-m-d H:i:s'),
                'ip_address' => get_client_ip(),
            ];
            $builder = $this->db->table($this->tableSys_user_logs);
            return $builder->insert($data);
        } else {
            return false;
        }
    }
    public function User_Group($UserID) {
        $builder = $this->db->table($this->table_sys_user_group_mapping);
        $builder->select("group_id");
        $builder->where('user_id', $UserID);
        $query = $builder->get();
        return $query->getFirstRow();
    }
    public function sys_user_permission($group_id, $module_id = null) {
        $builder = $this->db->table($this->table_sys_user_permission);
        $builder->select("*");
        $builder->where('group_id', $group_id);
        if ($module_id != null) {
            $builder->where('module_id', $module_id);
        }
        $query = $builder->get();
        return $query->getFirstRow();
    }

    public function sideBarGroupLevel() {
        $builder = $this->db->table($this->table_GroupLevel1);
        $builder->select(
            $this->table_GroupLevel1 . '.*,' .
                $this->table_GroupLevel2 . '.groupLevel_id as groupLevel2_id,' .
                $this->table_GroupLevel2 . '.ref_id,' .
                $this->table_GroupLevel2 . '.groupLevel_name as groupLevel2_name,'
        );
        $builder->join($this->table_GroupLevel2, $this->table_GroupLevel2 . '.ref_id =' . $this->table_GroupLevel1 . '.groupLevel_id', 'left');
        $builder->where($this->table_GroupLevel1 . '.is_status', 0);
        $query = $builder->get()->getResultArray();
        $data = [];
        $duplicate = [];
        if (!empty($query)) {
            foreach ($query as $n => $row) {

                $list_array = [
                    "groupLevel_id" => $row['groupLevel2_id'],
                    "groupLevel_name" => $row['groupLevel2_name'],
                ];
                $newData = [
                    "groupLevel_id" => $row['groupLevel_id'],
                    "groupLevel_name" => $row['groupLevel_name'],
                    'list' => $row['groupLevel2_id'] != '' ? [$list_array] : null,
                ];
                if (in_array($row['groupLevel_id'], $duplicate)) {
                    array_push($data[(count($data) - 1)]['list'], $list_array);
                } else {
                    array_push($duplicate, $row['groupLevel_id']);
                    array_push($data, $newData);
                }
            }
        }
        return $data;
    }

    public function SWG_Station($GroupId_level1 = null, $GroupId_level2 = null) {
        $builder = $this->db->table($this->table_SWG_Station)->select('*');
        if (is_numeric($GroupId_level1)) {
            $builder->where('GroupId_level1', $GroupId_level1);
        }
        if (is_numeric($GroupId_level2)) {
            $builder->where('GroupId_level2', $GroupId_level2);
        }
        $builder->orderBy('HwsSWG_ID', 'asc');
        return $builder->get()->getResultObject();
    }

    public function fn_dmy_th($db_dmy){ 
        //วันภาษาไทย
        $ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
        //เดือนภาษาไทย
        $ThMonth = array ( "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );
        
        $ymd = substr($db_dmy,5,4).'-'.substr($db_dmy,3,2).'-'.substr($db_dmy,1,2); // วดป คศ 31122001 แปลงเป็น 2001-12-31
        //วันที่ ที่ต้องการเอามาเปลี่ยนฟอแมต
        $myDATE = ($ymd); //แปลงมาจากฐานข้อมูล
        //กำหนดคุณสมบัติ
        $week = date("w",strtotime($myDATE)); // ค่าวันในสัปดาห์ (0-6)
        $months = date("m",strtotime($myDATE))-1; // ค่าเดือน (1-12)
        $day = date("d",strtotime($myDATE)); // ค่าวันที่(1-31)
        $years = date("Y",strtotime($myDATE))+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น พ.ศ.
        
        return "$day เดือน $ThMonth[$months] พ.ศ. $years"; 


    }
}