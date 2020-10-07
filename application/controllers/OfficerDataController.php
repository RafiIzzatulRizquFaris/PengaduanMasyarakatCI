<?php
class OfficerDataController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAction');
    }

    public function index()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
            $this->load->view('admin/officerdatadashboard');
        } else {
            header("Location:".base_url().'LoginController/index');
        }
    }

    public function detailOfficerDelete()
    {
        $id = $this->input->post('id');
        if(isset($id) and !empty($id)){
            $records = $this->ModelAction->detailOfficerDelete($id);
            $output = '';
            $data = $records->result_array();
            if (!empty($data)) {
                foreach($data as $row){
                    $output .= '
                    <form id="form-delete-officer">
                    Menghapus <input type="text" name="officer_name" readonly value="'.$row['nama_petugas'].'"> 
                    dengan id <input type="text" name="petugas_id" readonly value="'.$row['id_petugas'].'">
                    <button type="submit" class="btn btn--radius-2 btn-danger btn-block mt-3">Delete</button>
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

    public function detailOfficerEdit()
    {
        $id = $this->input->post('id');
        if(isset($id) and !empty($id)){
            $records = $this->ModelAction->detailOfficerEdit($id);
            $output = '';
            $data = $records->result_array();
            if (!empty($data)) {
                foreach($data as $row){
                    $output .= '
                    <div class="card card-7">
						<div class="card-body">
							<form id="form-edit-officer">
								<div class="form-row">
									<div class="name">ID</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="id_officer" readonly value="'.$row['id_petugas'].'"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Nama</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="name_officer" value="'.$row['nama_petugas'].'"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Username</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="username_officer" value="'.$row['username'].'"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Password</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="password"
												name="password_officer" />
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">No Telepon</div>
									<div class="value">
										<div class="input-group">
											<input type="text" class="input--style-5" name="telepon_officer" value="'.$row['telp'].'">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Position</div>
									<div class="value">
										<div class="input-group">
											<div class="rs-select2 js-select-simple select--no-search">
												<select name="position_officer">
													<option disabled="disabled" selected="selected">Choose
														option</option>
													<option value="admin">Admin</option>
													<option value="petugas">Officer</option>
												</select>
												<div class="select-dropdown"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn--radius-2 btn-success btn-block btn-lg" type="submit">
										Submit
									</button>
								</div>
							</form>
						</div>
					</div>
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

    public function officerDataService()
    {
        $officer = $this->ModelAction->get_masyarakat();
        $strconcat = "'";
        foreach ($officer as $value) {
            $tbody = array();
            $tbody[] = $value->id_petugas;
            $tbody[] = $value->nama_petugas;
            $tbody[] = $value->level;
            $tbody[] = $value->username;
            $tbody[] = $value->telp;
            $button = '
            <button type="button" class="btn btn-warning view-officer-edit" data-toggle="modal" data-target="#editModal" id="'.$value->id_petugas.'">Edit</button>
			<button type="button" class="btn btn-danger view-officer-delete" data-toggle="modal" data-target="#deleteModal" id="'.$value->id_petugas.'">Delete</button>
            ';
            $tbody[] = $button;
            $data[] = $tbody; 
        }

        if ($officer) {
            echo json_encode(array('data'=> $data));
        }else{
            echo json_encode(array('data'=> 0));
        }
    }
}