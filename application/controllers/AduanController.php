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

    public function selesaiLaporan()
    {
        $this->ModelAduan->selesaiLaporanModel();
    }

    public function insertLaporan()
    {
        $this->ModelAduan->insertLaporanModel();
    }

    public function detailLaporan()
    {
        $id = $this->input->post('id');
        if(isset($id) and !empty($id)){
            $records = $this->ModelAduan->detailLaporanModel($id);
            $output = '';
            $data = $records->result_array();
            if (!empty($data)) {
                foreach($data as $row){
                    $output .= '
       
                    <div class="text-justify">'.$row["tanggapan"].'</div><br>
                    ';
                   }    
                   echo $output;
            }else{
                echo 'Belum ditanggapi';
            }
        }
        else {
         echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Phone'.'</li></ul></center>';
        }
    }
}