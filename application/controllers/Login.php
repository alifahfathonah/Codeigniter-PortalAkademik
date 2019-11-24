<?php
	
	class Login extends CI_Controller{
		
		public function __construct()
		{
			parent::__construct();
            $this->load->model('ModelLogin');
		}
		
		public function index()
		{
            if($this->session->userdata('masuk',TRUE))
            {
                $url = base_url().'siakad';
                redirect($url);
            }
			$this->load->view('login/login');
		}
		
		public function auth()
		{
			$username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $cek_dosen = $this->ModelLogin->auth_dosen($username,$password);
            $cek_mahasiswa = $this->ModelLogin->auth_mahasiswa($username,$password);
			if( $cek_dosen -> num_rows() > 0 )
            {
                $data = $cek_dosen->row_array();
                $this->session->set_userdata('masuk',TRUE);
                if($data['role'] == 1 )
                {
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_id',$data['NIDN']);
                    $this->session->set_userdata('ses_nama', $data['nama_dosen']);
                    $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
                        Selamat Datang Admin 
                    </div>');
                    redirect('siakad');
                }else if($data['role'] == 0 ){
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('ses_id',$data['NIDN']);
                    $this->session->set_userdata('ses_nama',$data['nama_dosen']);
                    $nama = $data['nama'];
                    echo $this->session->set_flashdata('msg','
                    <div class="alert alert-success" role="alert">
                        Selamat Datang Dosen '.$nama.'
                    </div>');
                    redirect('siakad');
                }else{
                    echo $this->session->set_flashdata('msg','Username atay Passwrod Salah !');
                }
            }else if($cek_mahasiswa -> num_rows() > 0){
                    $data=$cek_mahasiswa->row_array();
					$this->session->set_userdata('masuk',TRUE);
                    $this->session->set_userdata('akses','3');
                    $this->session->set_userdata('mahasiswa');
                    $this->session->set_userdata('ses_id',$data['NIM']);
                    $this->session->set_userdata('ses_nama',$data['nama_mahasiswa']);
                    echo $this->session->set_flashdata('msg','
                    <div class="alert alert-success" role="alert">
                        Selamat Datang Admin 
                    </div>');
						redirect('siakad');
			 }else{
				echo $this->session->set_flashdata('msg','
				<div class="alert alert-danger" role="alert">
					<font size="2">Login Gagal, <b>Akun Pengguna</b> atau <b>Kata Sandi</b> salah </font>
				</div>');
				$url = base_url();
				redirect($url);
			 }
		}
		public function logout()
		{
          
			$this->session->sess_destroy();
            $url=base_url();
            redirect($url);
		}
	}