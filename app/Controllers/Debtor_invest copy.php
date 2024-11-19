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

        //  การสืบทรัพย์   count_invest_no
            $results_invest_detail = $this->debtormodel->count_invest_detail();


        $data = [];
        $data['encrypter'] = $encrypter;
        $data['results_invest_detail'] = $results_invest_detail;


        return view('layouts/contents/Debtor/data_grid',$data); //  load_view_content   grid_tab

    }


    

}