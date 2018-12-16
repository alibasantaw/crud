<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	var $folder_tugas;
	var $userid;

	public function __construct()
    {
        parent::__construct();

        // MODEL
        $this->load->model("Data_model");
    }
	

	public function index()
	{
		$data['js'] = '';
		$data['validasi'] = '';
		//$data['modal'] = array($this->load->view("template/modal/tambah_kelas", NULL, TRUE));

		//HASIL PROGRESS
		$data['profil'] 			= $this->Data_model->get_profil();
		$data['folder_foto_profil']	= base_url()."/upload/foto/profil/";

		$this->load->view('template/header');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}

	public function detail($profil = 0)
	{	
		if($profil > 0){
			$data['js'] = '';
			$data['validasi'] = '';
			$data['modal'] = '';

			//DETAIL 
			$data['profil'] 			= $this->Data_model->get_profil_by_id($profil);
			$data['siswa'] 				= $this->Data_model->get_siswa_profil($profil);
			$data['folder_foto_siswa']	= base_url()."../upload/foto/siswa/";
			$this->load->view('template/header');
			$this->load->view('detail', $data);
			$this->load->view('template/footer');	
		}
		else
		{
			redirect("Beranda");
		}
	}

	public function tambah()
	{

		//PROFIL SISWA
		$data['profil']	= $this->Data_model->get_profil();


		 $this->load->library('image_lib');
		
		if($_POST)
		{
			$nama		=	$this->input->post('nama');
			$bod		=	$this->input->post('bod');
			$address	=	$this->input->post('address');
			$email		=	$this->input->post('email');
			$foto 							= $_FILES["foto"]['name'];

			$config['upload_path']          = "upload/foto/profil/";
		    $config['allowed_types']        = 'jpg';
		    $config['file_name']			= "600x600".$foto;
		    $config['source_image']			= "upload/foto/profil/".$foto;

		    $this->load->library('upload', $config);


		    $config2['upload_path']          = "upload/foto/profil/";
		    $config2['allowed_types']        = 'jpg';
		    $config2['file_name']			 = "240x240".$foto;
		    $config2['source_image']		 = "upload/foto/profil/".$foto;

		    $this->load->library('upload', $config2);
			
			if(!$this->upload->do_upload('foto'))
			{
				echo "<script>alert('ERROR')</script>";
			} 
			else 
			{

            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  "upload/foto/profil/600x600".$foto,
              'maintain_ratio'  =>  FALSE,
              'width'           =>  600,
              'height'          =>  600,
            );

            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();

            $configer2 =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  "upload/foto/profil/240x240".$foto,
              'maintain_ratio'  =>  FALSE,
              'width'           =>  240,
              'height'          =>  240,
            );

            $this->image_lib->clear();
            $this->image_lib->initialize($configer2);
            $this->image_lib->resize();


				$data_profil = array('nama' 	=> $nama,
									 'bod' 		=> $bod,
									 'address'	=> $address,
									 'email' 	=> $email,
									 'foto'		=> "600x600".$foto.",240x240".$foto);

				if($this->db->insert("data_profil", $data_profil))
				{
					chmod($config['upload_path']."600x600".$foto, 0777);
					$this->session->set_flashdata("message","Berhasil menambahkan profil");
				}
				else
				{
				$this->session->set_flashdata("error","Kegagalan sistem.");
				}
			}
			redirect('beranda');
		}

		$this->load->view('template/header');
		$this->load->view('tambah', $data);
		$this->load->view('template/footer');
	}

	public function ubah($profil)
	{

        // JS
		$data['js']			= array('form-validator/formValidation.js', 'form-validator/bootstrap.js');
		$data['validasi']	= array($this->load->view('template/js/validasi_ubahprofil', NULL, TRUE));
		$data['modal'] = '';

		//PROFIL SISWA
		$data['profil']	= $this->Data_model->get_profil_by_id($profil);

		$this->load->view('template/header');
		$this->load->view('ubah', $data);
		$this->load->view('template/footer');
	}
	
	public function doUbah(){

	 $this->load->library('image_lib');

		if($_POST)
		{
			$id 		= $this->input->post('id');
			$nama		= $this->input->post('nama');
			$bod		= $this->input->post('bod');
			$address	= $this->input->post('address');
			$email		= $this->input->post('email');
			$foto 							= $_FILES["foto"]['name'];

			$config['upload_path']          = "upload/foto/profil/";
		    $config['allowed_types']        = 'jpg';
		    $config['file_name']			= "600x600".$foto;
		    $config['source_image']			= "upload/foto/profil/".$foto;

		    $this->load->library('upload', $config);

			
			if(!$this->upload->do_upload('foto'))
			{
				echo "<script>alert('ERROR')</script>";
			} 
			else 
			{

            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  "upload/foto/profil/600x600".$foto,
              'maintain_ratio'  =>  FALSE,
              'width'           =>  600,
              'height'          =>  600,
            );

            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();
				$data_profil = array('nama' 	=> $nama,
									 'bod' 		=> $bod,
									 'address'	=> $address,
									 'email' 	=> $email,
									 'foto'		=> "600x600".$foto.",240x240".$foto);

				// $where = array(
				// 	'id' => $id);
	            // CHANGE MODE\
	            chmod($config['upload_path'].$foto, 0777); 
	            // note that it's usually changed to 0755
	           if($this->Data_model->update_profil($id, $nama, $bod, $address, $email, $foto))
	       {
					chmod($config['upload_path']."600x600".$foto, 0777);
					$this->session->set_flashdata("message","Berhasil menambahkan profil");
				}
				else
				{
				$this->session->set_flashdata("error","Kegagalan sistem.");
				}
			}
		redirect('beranda');
	}}

	public function hapus($idprofil){
		$hapus = $this->Data_model->hapus_profil($idprofil);
		if($hapus){
			$this->session->set_flashdata("error","Berhasil menghapus profil");
		}
		redirect('beranda');
	}
}
