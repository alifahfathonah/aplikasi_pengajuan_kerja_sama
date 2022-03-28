<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_pengajuan extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->model('m_status_pengajuan');
    }

    public function view_admin()
    {
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {
            $data['status_pengajuan'] = $this->m_status_pengajuan->get_status_pengajuan();
            // echo var_dump($data);
            // die();

            $this->load->view('admin/status_pengajuan', $data);
        }else{
            $this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
        }
    }

    public function input_data_admin()
    {
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {
            $status_pengajuan = $this->input->post("status_pengajuan");
            $keterangan_pengajuan = $this->input->post("keterangan_pengajuan");

            $hasil = $this->m_status_pengajuan->tambah_status_pengajuan($status_pengajuan, $keterangan_pengajuan);
	
			if($hasil==false){
				$this->session->set_flashdata('eror','eror');
			
			}else{
				$this->session->set_flashdata('input','input');
			
			}

			redirect('Status_pengajuan/view_admin');

        }else{
            $this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
        }
    }

    public function edit_data_admin()
    {
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {
            $status_pengajuan = $this->input->post("status_pengajuan");
            $keterangan_pengajuan = $this->input->post("keterangan_pengajuan");
            $id_status_pengajuan = $this->input->post("id_status_pengajuan");


            $hasil = $this->m_status_pengajuan->update_status_pengajuan($status_pengajuan,  $id_status_pengajuan, $keterangan_pengajuan );
	
			if($hasil==false){
				$this->session->set_flashdata('eror','eror');
			
			}else{
				$this->session->set_flashdata('edit','edit');
			
			}

			redirect('Status_pengajuan/view_admin');

        }else{
            $this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
        }
    }

    
}