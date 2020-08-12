<?php
class UserDashboardController extends CI_Controller{
    public function index()
    {
        if ($this->session->userdata('status') == 'login') {
            $this->load->view('user/userdashboard');
        } else {
            header("Location:".base_url().'LoginController/index');
        }
    }
}