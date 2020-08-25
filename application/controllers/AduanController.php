<?php
class AduanController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAction');
    }

    public function prosesLaporan()
    {
        $this->ModelAction->prosesLaporanModel();
    }
}