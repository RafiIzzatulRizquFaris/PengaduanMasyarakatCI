<?php

class AdminController extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAction');
    
    }
    public function index()
    {
        $data['pengaduan'] = $this->ModelAction->get_pengaduan();
        $this->load->view('admin/admindashboard', $data);
    }
}