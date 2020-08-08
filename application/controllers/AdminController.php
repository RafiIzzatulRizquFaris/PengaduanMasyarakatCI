<?php

class AdminController extends CI_Controller{
    public function index()
    {
        $this->load->view('admin/admindashboard');
    }
}