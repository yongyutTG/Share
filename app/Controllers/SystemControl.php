<?php

namespace App\Controllers;

class SystemControl extends BaseController {

    public function index() {
        $view = [];
        // $script_path = '';
        // $this->template->set_js('myscript', script_tag($script_path));
        return $this->template->load_view('contents/systemControl/index', $view);
    }

}
