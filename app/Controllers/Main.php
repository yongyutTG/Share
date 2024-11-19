<?php

namespace App\Controllers;

class Main extends BaseController {

    public function login() {
        $view = [];
        return $this->template->load_view_login('login', $view);
    }
    public function welcome() {
        $view = [];
        // $script_path = '';
        // $this->template->set_js('myscript', script_tag($script_path));
        return $this->template->load_view('welcome', $view);
    }
}
