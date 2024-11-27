<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Debtor_model;

class Debtor extends BaseController {

    public function __construct() {
        helper("cookie");
        $this->db = \Config\Database::connect();
        $this->debtormodel = new Debtor_model();
    }

    public function index() {
        $encrypter = \Config\Services::encrypter();
        $plainText  = '023548';
        $encrypted_data = bin2hex($encrypter->encrypt($plainText));
        $data = [];
        $data['test'] = $encrypted_data;
        $data['test2'] = $decrypted_data = $encrypter->decrypt(hex2bin($encrypted_data));
      
        return $this->template->load_view_content('contents/Debtor/index', $data);  //  load_view_content
    }

    public function get_data_debtor(){  
        
         $encrypter = \Config\Services::encrypter();
         $mem_id = $_POST['mem_id'];
         $emp_id = $_POST['emp_id'];

         if($mem_id != ''){
            $mem_id= str_pad($mem_id,6,"0",STR_PAD_LEFT);
            }
            if($emp_id != ''){
            $emp_id= str_pad($emp_id,6,"0",STR_PAD_LEFT);
            }

            // รายละเอียดสมาชิก
            $results_mem_detail = $this->debtormodel->member_detail($emp_id, $mem_id); 
            
        //  สัญญา
            $results_contract_list = $this->debtormodel->contract_list($emp_id, $mem_id);

        //   คนค้ำของสัญญาที่ยังมียอดหนี้อยู่
            $results_contract_guar = $this->debtormodel->contract_guar($emp_id, $mem_id);

        //   การไปค้ำสัญญาอื่น
            $results_contract_guarantee = $this->debtormodel->contract_guarantee($emp_id, $mem_id);

        //   เตือนผู้กู้
            $results_contract_guarantee = $this->debtormodel->contract_guarantee($emp_id, $mem_id);

        //  การสืบทรัพย์   count_invest_no
            $results_count_invest_no = $this->debtormodel->count_invest_no($emp_id, $mem_id);
            $results_invest_detail = $this->debtormodel->invest_detail($emp_id, $mem_id);




        $data = [];
        $data['encrypter'] = $encrypter;
        $data['results_mem_detail'] = $results_mem_detail;
        $data['results_contract_list'] = $results_contract_list;
        $data['results_contract_guar'] = $results_contract_guar;
        $data['results_contract_guarantee'] = $results_contract_guarantee;
        $data['results_count_invest_no'] = $results_count_invest_no;
        $data['results_invest_detail'] = $results_invest_detail;


       
        //$center_model = $this->load->model('Debtor_model');
        //$data['center_model'] = $center_model;


        return view('layouts/contents/Debtor/data_grid',$data); //  load_view_content   grid_tab

    }

    public function get_m_data_debtor(){
        $encrypter = \Config\Services::encrypter();
        
         $mem_id = $_POST['mem_id'];
         $emp_id = $_POST['emp_id'];
         
         if($mem_id != ''){
            $mem_id= str_pad($mem_id,6,"0",STR_PAD_LEFT);
            }
            if($emp_id != ''){
            $emp_id= str_pad($emp_id,6,"0",STR_PAD_LEFT);
            }

         $data = $this->debtormodel->member_detail2($emp_id, $mem_id);
        if ($data) {
            header('application/json');
            echo json_encode($data);
        } else {
            header('application/json');
            $d = 0;
            echo json_encode($d);
        }
    }




    

}