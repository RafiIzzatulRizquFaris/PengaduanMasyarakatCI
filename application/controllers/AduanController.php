<?php
class AduanController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAduan');
    }

    public function prosesLaporan()
    {
        $this->ModelAduan->prosesLaporanModel();
    }
}