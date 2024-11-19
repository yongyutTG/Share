<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Debtor_model;

class Debtor_invest extends BaseController {

    public function __construct() {
        helper("cookie");
        // get cookie
        // get cookie
        // $this->user_id = get_cookie('id');
        // $this->id = get_cookie('id');
        // $this->name = get_cookie('name');
        $this->db = \Config\Database::connect();
        $this->debtormodel = new Debtor_model();
        //$this->centermodel = new Center_model();
        

    }

    public function index() {
        $encrypter = \Config\Services::encrypter();
        $plainText  = '023548';
        $encrypted_data = bin2hex($encrypter->encrypt($plainText));
        $data = [];
        $data['test'] = $encrypted_data;
        $data['test2'] = $decrypted_data = $encrypter->decrypt(hex2bin($encrypted_data));
        // $script_path = '';
        // $this->template->set_js('myscript', script_tag($script_path));
        return $this->template->load_view_content('contents/Debtor_invest/index', $data);  //  load_view_content
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

        //  การสืบทรัพย์   count_invest_no
            $results_count_invest_no = $this->debtormodel->count_invest_no($emp_id, $mem_id);
            $results_invest_detail = $this->debtormodel->invest_detail($emp_id, $mem_id);

        $data = [];
   
        $data['results_count_invest_no'] = $results_count_invest_no;
        $data['results_invest_detail'] = $results_invest_detail;

       
        //$center_model = $this->load->model('Debtor_model');
        //$data['center_model'] = $center_model;

        return view('layouts/contents/Debtor_invest/data_grid',$data); //  load_view_content   grid_tab

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