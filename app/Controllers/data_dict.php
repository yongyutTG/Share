<?php
namespace App\Controllers;


class Data_dict extends BaseController {

    public function __construct() {
        helper("cookie");
        // get cookie
        // get cookie
        // $this->user_id = get_cookie('id');
        // $this->id = get_cookie('id');
        // $this->name = get_cookie('name');
        $this->db = \Config\Database::connect();

    }

    public function index() {

        $encrypter = \Config\Services::encrypter();
        $plainText  = '023548';
        $encrypted_data = bin2hex($encrypter->encrypt($plainText));

        $data = [];
        //$data['test'] = $encrypted_data;
        //$data['test2'] = $decrypted_data = $encrypter->decrypt(hex2bin($encrypted_data));
        //  $script_path = '';
        //  $script_path .= 'plugins/DataTables_master/dataTables.css';
        //  $script_path .= 'plugins/datatables/jquery.dataTables.min.js';
        //  $this->template->set_js('myscript', script_tag($script_path));
        return $this->template->load_view_content_dict('contents/data_dict/index', $data);  //  load_view_content
    }

    public function get_data_dict(){  
        $encrypter = \Config\Services::encrypter();
        $options = $_POST['options'];
        //$options = 2;
        if($options == '1'){
            $query = $this->db->query("SELECT * FROM catcol");
            $results = $query->getResultArray();
        }else{
                
            $query = $this->db->query("SELECT * FROM catcol WHERE trim(cmnt) <> '' ");
            //echo $this->db->getLastQuery();
            //exit;
            $results = $query->getResultArray();
        }
        
        //echo $this->db->last_query();
        //exit;
        //$data['encrypt'] = $this->encrypt;
        
        $data = [];
        $data['encrypter'] = $encrypter;
        $data['data_dict'] = $results;
        //$this->load->view('layouts/contents/data_dict/data_grid');
        return view('layouts/contents/data_dict/data_grid',$data);

    }

    public function add_data_dict(){  
        $this->load->view('Home/welcome_add_grid');
    }

    public function save_add_data_dict(){  
        $post_data = array(
			'tnam' => $_POST['tbl_name'],
			'cnam' => $_POST['col_name'],
            'cmnt' => $_POST['cmnt']
		);
        if($this->db->insert("catcol", $post_data)){
            $this->session->set_flashdata('msg_type', 'info');
            $this->session->set_flashdata('msg', 'add Successfully');
            redirect('Mainpage');
        }else{
            $this->session->set_flashdata('msg_type', 'error');
            $this->session->set_flashdata('msg', 'add error');
            redirect('Mainpage');
        }
        
    }

    public function edit_data_dict(){  
        $data['encrypt'] = $this->encrypt;
        $id  = $this->encrypt->decode($_POST['id']);
        //echo $id;
        //exit;
        $query = $this->db->query(" SELECT * FROM dbo.catcol   WHERE id = $id "); 
        //echo $this->db->last_query();
        //exit;
        $data_dic = $query->row_array();
        $data['data_dict'] = $data_dic;
        $this->load->view('Home/welcome_edit_grid', $data);

    }
    public function save_edit_data_dict(){  
        
        $id  = $this->encrypt->decode($_POST['id_catcol']);
        // echo $id.'<br>';
        // echo $_POST['id_catcol'].'<br>';
        // echo $_POST['tbl_name'].'<br>';
        // echo $_POST['col_name'].'<br>';
        // echo $_POST['cmnt'].'<br>';
        // exit;
        $post_data = array(
			'tnam' => $_POST['tbl_name'],
			'cnam' => $_POST['col_name'],
            'cmnt' => $_POST['cmnt']
		);
        $where_data = array("id" => $id);
        if($this->db->update("catcol", $post_data,$where_data)){
        // echo $this->db->last_query();
        // exit;
            $this->session->set_flashdata('msg_type', 'info');
            $this->session->set_flashdata('msg', 'Update Successfully');
            redirect('Mainpage');
        }else{
            $this->session->set_flashdata('msg_type', 'error');
            $this->session->set_flashdata('msg', 'Update error');
            redirect('Mainpage');
        }
        redirect('Mainpage');

    }




    

}