<?php

class ModelAction extends CI_Model{

    public function save_database()
    {
        // $config['upload_path'] = './assets/';
        // $config['allowed_types'] = 'jpg|png|gif';
        // $config['max_size'] = '2048000';
        // $config['file_name'] = url_title($this->input->post('gambar'));
        // $filename = $this->upload->file_name;
        // $this->upload->initialize($config);
        // $this->upload->do_upload('gambar');
        // $data = $this->upload->data();

        $data = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('first_name'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'telp' => $this->input->post('telepon'),
        );

        $this->db->insert('masyarakat', $data);
        header("Location:".base_url().'LoginController/index');
    }

    public function get_masyarakat()
    {
        $data = $this->db->get('Petugas');
        return $data->result();
    }

    public function count_masyarakat()
    {
        $data = $this->db->get('Petugas');
        return $data->num_rows();
    }

    public function login_database($account)
    {
        $petugas = $this->db->get_where('Petugas',$account);
        $masyarakat = $this->db->get_where('masyarakat',$account);
        if ($petugas->result() == null) {
            return $masyarakat;
        }else{
            return $petugas;
        }
        
    }

}