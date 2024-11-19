<?php
namespace App\Controllers;


class Member extends BaseController {

    public function index() {

        $encrypter = \Config\Services::encrypter();

        $plainText  = '023548';
        $encrypted_data = bin2hex($encrypter->encrypt($plainText));

        $data = [];
        $data['test'] = $encrypted_data;
        $data['test2'] = $decrypted_data = $encrypter->decrypt(hex2bin($encrypted_data));
        // $script_path = '';
        // $this->template->set_js('myscript', script_tag($script_path));
        return $this->template->load_view_content('contents/member/index', $data);  //  load_view_content
    }


    

}