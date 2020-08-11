<?php
class Action extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAction');
    }

    public function register()
    {
        $this->ModelAction->save_database();
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $account = array(
            'username' => $username,
            'password' => $password
        );

        $check = $this->ModelAction->login_database($account)->num_rows();
        if ($check > 0) {
            $data_session = array(
                'username' => $username,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            if ($this->session->userdata('status') == 'login') {
                header("Location:".base_url().'AdminController/index');
            } else {
                header("Location:".base_url().'Welcome/index');
            }
        } else {
            echo 'login gagal';
        }
        
    }

    public function logout (){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}