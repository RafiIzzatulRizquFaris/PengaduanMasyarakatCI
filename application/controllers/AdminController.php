<?php

class AdminController extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAction');
        $this->load->model('ModelAduan');
    }
    public function index()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
            $this->load->view('admin/admindashboard');
        } else {
            header("Location:".base_url().'LoginController/index');
        }
    }

    public function detailProsesLaporan()
    {
        $id = $this->input->post('id');
        if(isset($id) and !empty($id)){
            $records = $this->ModelAduan->detailProsesLaporan($id);
            $output = '';
            $data = $records->result_array();
            if (!empty($data)) {
                foreach($data as $row){
                    $output .= '
                    <form id="form-proses-laporan">
                    Proses laporan : <input type="text" name="report_title" readonly value="'.$row['judul'].'">
                    <br><br> 
                    Dengan id : <input type="text" name="report_id" readonly value="'.$row['id_pengaduan'].'">
                    <br><br>
                    Isi laporan :</br>'.$row['isi_laporan'].'
                    <br><br>
                    Bukti : <br><img src="http://localhost/PengaduanMasyarakatCI/assets/'.$row['foto'].'" width="300">
                    <button type="submit" class="btn btn--radius-2 btn-primary btn-block mt-3">Proses</button>
                    </form>
                    ';
                   }    
                   echo $output;
            }else{
                echo 'Pilihan laporan salah';
            }
        }
        else {
         echo 'Tidak ada Laporan';
        }
    }

    public function pengaduanService()
    {
        $pengaduan = $this->ModelAction->get_pengaduan();
        $strconcat = "'";
        foreach ($pengaduan as $value) {
            $tbody = array();
            $tbody[] = $value->id_pengaduan;
            $tbody[] = $value->judul;
            $tbody[] = $value->tgl_pengaduan;
            $tbody[] = $value->status;
            $button = '';
            if ($value->status == 'menunggu') {
                $button = '<td class="text-center"><button type="button" class="btn btn-primary view-data-proses" data-toggle="modal" data-target="#prosesModal" id="'.$value->id_pengaduan.'">Proses</button></td>';
            } else if ($value->status == 'proses') {
                $button = '<td class="text-center view-data"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#selesaiModal" onclick="onSelesaiLaporan('.$strconcat.''.$value->id_pengaduan.''.$strconcat.', '.$strconcat.''.$value->judul.''.$strconcat.', '.$strconcat.''.$value->tgl_pengaduan.''.$strconcat.', '.$strconcat.''.$value->isi_laporan.''.$strconcat.', '.$strconcat.''.$value->foto.''.$strconcat.')">Selesai</button></td>';
            } else if ($value->status == 'selesai') {
                $button = '<td class="text-center view-data"><button type="button" class="btn btn-secondary" disabled>No Action</button></td>';
            }
            $tbody[] = $button;
            $data[] = $tbody; 
        }

        if ($pengaduan) {
            echo json_encode(array('data'=> $data));
        }else{
            echo json_encode(array('data'=> 0));
        }
    }
}