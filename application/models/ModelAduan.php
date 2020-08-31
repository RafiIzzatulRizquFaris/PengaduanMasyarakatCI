<?php
class ModelAduan extends CI_Model{

    public function getLaporan()
    {
        $data = $this->db->get('pengaduan');
        return $data->result();
    }

    public function prosesLaporanModel()
    {
        $data = array(
            'status' => 'proses',
        );

        $where = array('id_pengaduan' => $this->input->post('report_id'),);

        $this->db->update('pengaduan', $data, $where);
        header("Location:".base_url().'AdminController/index');
    }

    public function insertLaporanModel()
    {

        $foto = $_FILES['foto_report']['name'];
        if ($foto = '') {
            // kosong
        } else {
            $config['upload_path'] = FCPATH .'./assets';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size']  = '2048';

            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_report')) {
                echo "gagal upload"; 
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nik' => $this->session->userdata('id'),
            'judul' => $this->input->post('judul_report'),
            'isi_laporan' => $this->input->post('isi_report'),
            'foto' => $foto,
        );

        $this->db->set('tgl_pengaduan','NOW()',FALSE);

        $this->db->insert('pengaduan', $data);
        header("Location:".base_url().'UserDashboardController/index');
    }

}