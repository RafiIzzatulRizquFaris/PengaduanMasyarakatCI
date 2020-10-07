<?php
class AduanController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAduan');
    }

    public function prosesLaporan()
    {
        $data = array(
            'status' => 'proses',
        );

        $where = array('id_pengaduan' => $this->input->post('report_id'),);

        $updatean = $this->ModelAduan->prosesLaporanModel($data, $where);
        echo json_encode($updatean);
    }

    public function selesaiLaporan()
    {
        $data = $this->ModelAduan->selesaiLaporanModel();
        echo json_encode($data);
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
                    <p class="font-weight-bold">Tanggal  Tanggapan</p>
                    <div class="text-justify">'.$row["tgl_tanggapan"].'</div>
                    <br>
                    <p class="font-weight-bold">Isi Tanggapan</p>
                    <div class="text-justify">'.$row["tanggapan"].'</div>
                    ';
                   }    
                   echo $output;
            }else{
                echo 'Belum ditanggapi';
            }
        }
        else {
         echo 'Tidak ada tanggapan';
        }
    }
}