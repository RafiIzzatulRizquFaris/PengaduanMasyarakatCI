<?php 
class InputDashboardController extends CI_Controller{
    public function index()
    {
        $this->load->view('user/userdashboard');
    }
}