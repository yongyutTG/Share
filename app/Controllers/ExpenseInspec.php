<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Expenseinspec_model;

class Expenseinspec extends BaseController {

    public function __construct() {
        helper("cookie");
        // get cookie
        // get cookie
        // $this->user_id = get_cookie('id');
        // $this->id = get_cookie('id');
        // $this->name = get_cookie('name');
        $this->db = \Config\Database::connect();
        $this->ExpenseInspecmodel = new Expenseinspec_model();
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
        return $this->template->load_view_content('contents/ExpenseInspec/index', $data);  //  load_view_content
    }

    public function get_data_expense(){  
        
         $encrypter = \Config\Services::encrypter();
         $ioc_number = $_POST['ioc_number'];



            // รายละเอียด
            $results_detail = $this->ExpenseInspecmodel->Expense_detail($ioc_number);
            // Sum
            $results_sum = $this->ExpenseInspecmodel->Expense_summary($ioc_number);
  


        $data = [];
        $data['encrypter'] = $encrypter;
        $data['results_detail'] = $results_detail;
        $data['results_sum'] = $results_sum;

        return view('layouts/contents/ExpenseInspec/data_grid',$data); //  load_view_content   grid_tab

    }




    

}