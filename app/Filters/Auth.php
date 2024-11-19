<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Center_model;
use Config\Services;


class Auth implements FilterInterface {
    protected $response;

    public function __construct() {
        $this->response = Services::response();
    }
    public function before(RequestInterface $request, $arguments = null) {

        session();
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(BASE_URL . '/login');
        } elseif ($_SESSION['user_id'] == '' || $_SESSION['user_id'] == 'undefined') {
            return redirect()->to(BASE_URL . '/login');
        } else {
            if (!empty($arguments)) {
                $this->Center_model = new Center_model();
                $this->User_group    = $this->Center_model->User_Group($_SESSION['user_id']);
                $this->User_group_id = $this->User_group->group_id;
                $permissionText = ['read' => 'read_p', 'insert' => 'add_p', 'edit' => 'update_p', 'update' => 'update_p', 'delete' => 'delete_p'];
                $module_id = isset($arguments[1]) ? $arguments[1] : null;
                $permission =  $this->Center_model->sys_user_permission($this->User_group_id, $module_id);
                if (!empty($permission)) {
                    if ($permission->{$permissionText[$arguments[0]]} != 1) {
                        if ($request->isAJAX()) {
                            return $this->response->setStatusCode(403)->setJSON(['error' => 'Permissiondenied']);
                        } else {
                            return redirect()->to(BASE_URL . '/NotPermission');
                        }
                    }
                } else {
                    if ($request->isAJAX()) {
                        return $this->response->setStatusCode(403)->setJSON(['error' => 'Permissiondenied']);
                    } else {
                        return redirect()->to(BASE_URL . '/NotPermission');
                    }
                }
            }
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
    }
}
