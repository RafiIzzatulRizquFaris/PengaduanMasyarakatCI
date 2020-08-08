<?php
class OfficerInputController extends CI_Controller{
    public function index()
    {
        $this->load->view('admin/officerinputdashboard');
    }
}