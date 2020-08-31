<?php
class ModelAduan extends CI_Model{

    public function prosesLaporanModel()
    {
        $data = array(
            'status' => 'proses',
        );

        $where = array('id_pengaduan' => $this->input->post('report_id'),);

        $this->db->update('pengaduan', $data, $where);
        header("Location:".base_url().'AdminController/index');
    }

}