<?php

namespace App\Controllers;

class Home extends BaseController {

    public function index() {
        $view = [];
        // $script_path = '';
        // $this->template->set_js('myscript', script_tag($script_path));
        return $this->template->load_view_content('contents/home/index', $view);
        //return $this->template->load_view_content('contents/data_dict/index', $view);
    }

    public function realtime(){
        return date_th(date('Y-m-d H:i:s'),3);
        //return date('Y-m-d H:i:s');
     }

}