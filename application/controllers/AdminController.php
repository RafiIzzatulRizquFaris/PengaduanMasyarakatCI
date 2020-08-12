<?php

class AdminController extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAction');
    
    }
    public function index()
    {
        if ($this->session->userdata('status') == 'login') {
            $data['pengaduan'] = $this->ModelAction->get_pengaduan();
            $this->load->view('admin/admindashboard', $data);
        } else {
            header("Location:".base_url().'LoginController/index');
        }
    }
}