<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Implementasi_kerja_sama extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->model('m_implementasi_kerja_sama');
		$this->load->model('m_kategori_kerja_sama');
		$this->load->model('m_bentuk_perjanjian');
		$this->load->model('m_user');
		$this->load->model('m_masa_berlaku');
		
	}

	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

			$data['implementasi_kerja_sama'] = $this->m_implementasi_kerja_sama->get_implementasi_kerja_sama();
			$data['kategori_kerja_sama'] = $this->m_kategori_kerja_sama->get_kategori_kerja_sama();
			$data['bentuk_perjanjian_pilih'] = $this->m_bentuk_perjanjian->get_bentuk_perjanjian();
			$data['masa_berlaku_data'] = $this->m_masa_berlaku->get_masa_berlaku();
			$data['user'] = $this->m_user->get_user();

		$this->load->view('admin/view_implementasi_kerja_sama', $data);

		}else{
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}

	public function filter_admin($id_kategori_kerja_sama)
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

			$data['implementasi_kerja_sama'] = $this->m_implementasi_kerja_sama->get_implementasi_kerja_sama_by_kategori($id_kategori_kerja_sama);
			$data['kategori_kerja_sama'] = $this->m_kategori_kerja_sama->get_kategori_kerja_sama();
			$data['bentuk_perjanjian_pilih'] = $this->m_bentuk_perjanjian->get_bentuk_perjanjian();
			$data['masa_berlaku_data'] = $this->m_masa_berlaku->get_masa_berlaku();
			$data['user'] = $this->m_user->get_user();

		$this->load->view('admin/view_implementasi_kerja_sama', $data);

		}else{
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}

	public function input_data_admin(){

		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

		$masa_berlaku = $this->input->post("masa_berlaku");
		$id_lembaga_mitra = $this->input->post("id_lembaga_mitra");
		$keterangan = $this->input->post("keterangan");
		$id_bentuk_perjanjian = $this->input->post("id_bentuk_perjanjian");
		$id_kategori_kerja_sama = $this->input->post("id_kategori_kerja_sama");
		$id_masa_berlaku = $this->input->post("id_masa_berlaku");

		$file_name = md5($masa_berlaku.$keterangan);
		// echo $masa_berlaku;
		// echo "<br>";
		// echo $id_lembaga_mitra;
		// echo "<br>";
		// echo $keterangan;
		// echo "<br>";
		// echo $id_jenis_perjanjian;
		// echo "<br>";
		// die();

		$path = './assets/implementasi_kerja_sama/admin/';

		$this->load->library('upload');
		$config['upload_path'] = './assets/implementasi_kerja_sama/admin';
		$config['allowed_types'] = 'pdf|docx';
		$config['max_size'] = '4048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $file_name;
		$this->upload->initialize($config);
		$file_implementasi_kerja_sama_upload = $this->upload->do_upload('file_implementasi_kerja_sama');

			if($file_implementasi_kerja_sama_upload){
				$file_implementasi_kerja_sama = $this->upload->data();
			}else{
				$this->session->set_flashdata('error_file','error_file');
				redirect('implementasi_kerja_sama/view_admin');
			}
		
			$hasil = $this->m_implementasi_kerja_sama->tambah_implementasi_kerja_sama($masa_berlaku, $id_lembaga_mitra,  $keterangan, $id_bentuk_perjanjian , $file_implementasi_kerja_sama['file_name'], $id_kategori_kerja_sama, $id_masa_berlaku);
	
			if($hasil==false){
				$this->session->set_flashdata('eror','eror');
			
			}else{
				$this->session->set_flashdata('input','input');
			
			}

			redirect('Implementasi_kerja_sama/view_admin');

		}else{
				$this->session->set_flashdata('loggin_err','loggin_err');
				redirect('Login/index');
		}

	}

	public function edit_data_admin(){
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {
			$id_implementasi_kerja_sama = $this->input->post("id_implementasi_kerja_sama");
			$masa_berlaku = $this->input->post("masa_berlaku");
			$id_lembaga_mitra = $this->input->post("id_lembaga_mitra");
			$keterangan = $this->input->post("keterangan");
			$id_bentuk_perjanjian = $this->input->post("id_bentuk_perjanjian");
			$id_kategori_kerja_sama = $this->input->post("id_kategori_kerja_sama");
			$id_masa_berlaku = $this->input->post("id_masa_berlaku");
	
			$file_name = md5($masa_berlaku.$keterangan);
		// $file_name = md5($no_usulan.$keterangan);
		
		// echo $id_implementasi_kerja_sama;
		// echo "<br>";
		// echo $id_lembaga_mitra;
		// echo "<br>";
		// echo $keterangan;
		// echo "<br>";
		// echo $id_jenis_perjanjian;
		// echo "<br>";
		// echo $file;
		// echo "<br>";
		
		// die();
		$path = './assets/implementasi_kerja_sama/admin/';



		$this->load->library('upload');
		$config['upload_path'] = './assets/implementasi_kerja_sama/admin';
		$config['allowed_types'] = 'pdf|docx';
		$config['max_size'] = '4048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $file_name;
		$this->upload->initialize($config);
		$file_implementasi_kerja_sama_upload = $this->upload->do_upload('file_implementasi_kerja_sama');

			if($file_implementasi_kerja_sama_upload){
				$file_implementasi_kerja_sama = $this->upload->data();
			}else{
				$this->session->set_flashdata('error_fil','error_file');
				redirect('implementasi_kerja_sama/view_admin');
			}
		
			$hasil = $this->m_implementasi_kerja_sama->update_implementasi_kerja_sama($masa_berlaku, $id_lembaga_mitra,  $keterangan, $id_bentuk_perjanjian , $file_implementasi_kerja_sama['file_name'], $id_kategori_kerja_sama, $id_masa_berlaku, $id_implementasi_kerja_sama );
	
			if($hasil==false){
				$this->session->set_flashdata('eror_edit','eror_edit');
			
			}else{
				$this->session->set_flashdata('edit','edit');
			}
			@unlink($path.$this->input->post('file_implementasi_kerja_sama_old'));

			redirect('Implementasi_kerja_sama/view_admin');

		}else{
				$this->session->set_flashdata('loggin_err','loggin_err');
				redirect('Login/index');
		}
		

	}

	public function hapus_implementasi_kerja_sama($id_implementasi_kerja_sama)
	{
	if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {
		// $file = $this->input->post('file_implementasi_kerja_sama_old');
		// echo $file;
		// die();
		$this->m_implementasi_kerja_sama->hapus_implementasi_kerja_sama($id_implementasi_kerja_sama);
		$hasil = $this->m_implementasi_kerja_sama->hapus_implementasi_kerja_sama($id_implementasi_kerja_sama);
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}
		$path = './assets/implementasi_kerja_sama/admin/';
		@unlink($path.$this->input->post('file_implementasi_kerja_sama_old'));
		redirect('Implementasi_kerja_sama/view_admin');
		}else{
			
			redirect('welcome');
		}
	}

	public function view_mitra()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {
		$id = $this->session->userdata('id');
		$data['implementasi_kerja_sama'] = $this->m_implementasi_kerja_sama->get_implementasi_kerja_sama_by_id($id);

		$this->load->view('mitra/view_implementasi_kerja_sama', $data);

		}else{
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}

	public function filter_mitra($id_kategori_kerja_sama)
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {

			$data['implementasi_kerja_sama'] = $this->m_implementasi_kerja_sama->get_implementasi_kerja_sama_by_kategori($id_kategori_kerja_sama);
			$data['kategori_kerja_sama'] = $this->m_kategori_kerja_sama->get_kategori_kerja_sama();
			$data['bentuk_perjanjian_pilih'] = $this->m_bentuk_perjanjian->get_bentuk_perjanjian();
			$data['user'] = $this->m_user->get_user();

		$this->load->view('mitra/view_implementasi_kerja_sama', $data);

		}else{
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}

	public function view_anggota()
	{
		$data['implementasi_kerja_sama'] = $this->m_implementasi_kerja_sama->get_implementasi_kerja_sama();
		$this->load->view('anggota/view_implementasi_kerja_sama', $data);
	}

	public function filter_anggota($id_kategori_kerja_sama)
	{
		$data['implementasi_kerja_sama'] = $this->m_implementasi_kerja_sama->get_implementasi_kerja_sama_by_kategori($id_kategori_kerja_sama);
		$this->load->view('anggota/view_implementasi_kerja_sama', $data);
	}

}
