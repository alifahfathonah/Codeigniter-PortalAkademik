<?php 

	class Siakad extends CI_Controller{
		
		function __construct()
        {
			parent::__construct();
			$this->load->model('ModelSiakad');
            if(!$this->session->userdata('masuk',TRUE))
            {
                $url = base_url();
                redirect($url);
			}
        }
		
		public function index()
		{
			$nidn = $this->session->userdata('ses_id');
			$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$nim = $this->session->userdata('ses_id');
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$data['jadwal'] = $this->ModelSiakad->getDataPerkuliahanByNIM($nim);
			$data['jadwaldosen'] = $this->ModelSiakad->getDataPerkuliahanByNIDN($nidn);
			$data['jumlahmhs'] = $this->ModelSiakad->getDataCountMhs();
			$data['jumlahmatkul'] = $this->ModelSiakad->getDataCountMatkul();
			$data['jumlahdosen'] = $this->ModelSiakad->getDataCountDosen();
			$data['jumlahkelas'] = $this->ModelSiakad->getDataCountKelas();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('templates/index',$data);
			$this->load->view('templates/footer');
		}

		public function form_dosen()
		{
			$nidn = $this->session->userdata('ses_id');
			$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$nim = $this->session->userdata('ses_id');
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('dosen/tambahdosen');
			$this->load->view('templates/footer');
		}

		public function prosestambahdosen()
		{
			$nidn = htmlspecialchars($_POST['nidn']);
			$nama = htmlspecialchars($_POST['nama']);
			$email = htmlspecialchars($_POST['email']);
			$role = htmlspecialchars($_POST['role']);
			
			$kirim = $this->ModelSiakad->tambahDataDosen($nidn,$nama,$email,$role);
			if( $kirim )
			{
				$this->session->set_flashdata('sukses','Tambah Data Dosen Sukses');
				redirect('siakad/form_dosen');
			}else{
				$this->session->set_flashdata('msg','Tambah Data Dosen Gagal !');
				redirect('siakad/form_dosen');
			}
		
		}

		public function set_dosen()
		{
			$nidn = $this->session->userdata('ses_id');
			$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$nidn = $this->uri->segment(3);
			$data['dosen'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$nim = $this->session->userdata('ses_id');
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('dosen/updatedosen',$data);
			$this->load->view('templates/footer');
		}

		public function prosesupdatedosen()
		{
			$nidn = htmlspecialchars($_POST['nidn']);
			$nama = htmlspecialchars($_POST['nama']);
			$email = htmlspecialchars($_POST['email']);
			$role = htmlspecialchars($_POST['role']);
			
			$kirim = $this->ModelSiakad->updateDataDosen($nidn,$nama,$email,$role);
			if( $kirim )
			{
				$this->session->set_flashdata('sukses','Update Data Dosen Sukses');
				redirect('siakad/set_dosen/'.$nidn);
			}else{
				$this->session->set_flashdata('msg','Update Data Dosen Gagal !');
				redirect('siakad/set_dosen/'.$nidn);
			}
		}

		public function hapusdosen()
		{
			$nidn = $this->session->userdata('ses_id');
			$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$nidn = $this->uri->segment(3);
			$kirim = $this->ModelSiakad->hapusDataDosen($nidn);
			$this->session->set_flashdata('sukses','Hapus Data Dosen Sukses');
			redirect('siakad/list_dosen/');
		}

		public function hapusperkuliahan()
		{
			$id_kelas = $this->uri->segment(3);
			$this->ModelSiakad->hapusDataPerkuliahan($id_kelas);
			$this->session->set_flashdata('sukses','Hapus Data Perkuliahan Sukses');
			redirect('siakad/list_perkuliahan/');
		}

		public function hapuskelas()
		{
			$id_kelas = $this->uri->segment(3);
			$kirim = $this->ModelSiakad->hapusDataKelas($id_kelas);
			$this->session->set_flashdata('sukses','Hapus Data Kelas Sukses');
			redirect('siakad/list_kelas/');
		}


		public function list_mahasiswa()
		{
			$nidn = $this->session->userdata('ses_id');
			$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$data['mahasiswa'] = $this->ModelSiakad->getDataMahasiswa();
			$nim = $this->session->userdata('ses_id');
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('mahasiswa/datamahasiswa',$data);
			$this->load->view('templates/footer');
		}
	
		public function list_dosen()
		{
			$nidn = $this->session->userdata('ses_id');
			$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$data['dosen'] = $this->ModelSiakad->getDataDosen();
			$nim = $this->session->userdata('ses_id');
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('dosen/datadosen',$data);
			$this->load->view('templates/footer');
		}

		public function form_tambahmahasiswa()
		{
			$nidn = $this->session->userdata('ses_id');
			$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$nim = $this->session->userdata('ses_id');
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$data['jurusan'] = $this->ModelSiakad->getDataJurusan();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('dosen/tambahmahasiswa',$data);
			$this->load->view('templates/footer');
		}

		public function prosestambahmahasiswa()
		{
			$nim = htmlspecialchars($_POST['nim']);
			$nama = htmlspecialchars($_POST['nama']);
			$email = htmlspecialchars($_POST['email']);
			$strata = htmlspecialchars($_POST['strata']);
			$jurusan = htmlspecialchars($_POST['jurusan']);
			$angkatan = htmlspecialchars($_POST['angkatan']);
			if( !empty($nim) && !empty($nama) && !empty($email) && !empty($strata) && !empty($jurusan) && !empty($angkatan) )
			{
				$cekMahasiswa = $this->ModelSiakad->getDataMahasiswaByID($nim);
				if( $cekMahasiswa->num_rows() <= 0 )	
				{
					$this->ModelSiakad->insertDataMahasiswa($nim,$nama,$email,$strata,$jurusan,$angkatan);
					$this->session->set_flashdata('sukses','Data Mahasiswa berhasil ditambahkan');
					redirect('siakad/form_tambahmahasiswa/');
				}else{
					$this->session->set_flashdata('gagal','Nim Mahasiswa tersebut sudah terdaftar !');
				redirect('siakad/form_tambahmahasiswa/');
				}
				
			}else{
				$this->session->set_flashdata('gagal','Tolong Isi Semua Field !');
				redirect('siakad/form_tambahmahasiswa/');
			}
		}

		public function list_matakuliah()
		{
			$nidn = $this->session->userdata('ses_id');
			$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$data['matakuliah'] = $this->ModelSiakad->getDataMataKuliah();
			$nim = $this->session->userdata('ses_id');
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('matakuliah/data_matakuliah',$data);
			$this->load->view('templates/footer');
		}

		public function form_matakuliah()
		{
			$nidn = $this->session->userdata('ses_id');
			$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$nim = $this->session->userdata('ses_id');
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('matakuliah/form_matakuliah',$data);
			$this->load->view('templates/footer');
		}

		public function prosesmatakuliah()
		{
			$kode = htmlspecialchars($_POST['kode']);
			$nama = htmlspecialchars($_POST['nama']);
			$sks = htmlspecialchars($_POST['sks']);
			if(!empty($kode) && !empty($nama) && !empty($sks))
			{
				$kirim = $this->ModelSiakad->tambahDataMataKuliah($kode,$nama,$sks);
				if($kirim)
				{
					$this->session->set_flashdata('sukses','Tambah Mata Kuliah Sukses !');
					redirect('siakad/form_matakuliah');
				}else{
					$this->session->set_flashdata('msg','Tambah Mata Kuliah Gagal !');
					redirect('siakad/form_matakuliah');
				}
			}else{
				$this->session->set_flashdata('msg','Tolong Isi Semua Field !');
				redirect('siakad/form_matakuliah');
			}

		}

		public function set_matakuliah()
		{
			$nidn = $this->session->userdata('ses_id');
			$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$kode = $this->uri->segment(3);
			$data['matakuliah'] = $this->ModelSiakad->getDataMatakuliahByKode($kode);
			$nim = $this->session->userdata('ses_id');
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('matakuliah/update_matakuliah',$data);
			$this->load->view('templates/footer');
		}

		public function updatematakuliah()
		{
			$kode = htmlspecialchars($_POST['kode']);
			$nama = htmlspecialchars($_POST['nama']);
			$sks = htmlspecialchars($_POST['sks']);
			$prodi = htmlspecialchars($_POST['prodi']);
			$semester = htmlspecialchars($_POST['semester']);
			if(!empty($kode) && !empty($nama) && !empty($sks) && !empty($prodi) && !empty($semester))
			{
				$kirim = $this->ModelSiakad->updateDataMataKuliah($kode,$nama,$sks,$prodi,$semester);
				if( $kirim )
				{
					$this->session->set_flashdata('sukses','Update Mata Kuliah Sukses !');
					redirect('siakad/set_matakuliah/'.$kode );
				}else{
					$this->session->set_flashdata('msg','Update Mata Kuliah Gagal !');
					redirect('siakad/set_matakuliah/'.$kode );
				}
			}else{
				$this->session->set_flashdata('msg','Tolong Isi Semua Field !');
				redirect('siakad/set_matakuliah/'.$kode );
			}
		}

		public function hapusmatakuliah()
		{
			$kode = $this->uri->segment(3);
			$kirim = $this->ModelSiakad->hapusDataMataKuliah($kode);
			if( $kirim )
			{
				$this->session->set_flashdata('sukses','Hapus Mata Kuliah Sukses !');
				redirect('siakad/list_matakuliah');
			}else{
				$this->session->set_flashdata('msg','Hapus Mata Kuliah Gagal !');
				redirect('siakad/list_matakuliah');
			}
		}

		public function data_dosen()
		{
			if($this->session->userdata('akses') == 1 || $this->session->userdata('akses') == 2 )
			{
				$nidn = $this->session->userdata('ses_id');
				$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topnav',$data);
				$this->load->view('profile/index');
				$this->load->view('templates/footer');
			}else{
				redirect('siakad/');
			}
			
		}
		
		public function detail_mahasiswa()
		{
			$id = $this->uri->segment(3);
			if ($id == null){
				$nim = $this->session->userdata('ses_id');
				$data['foto'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
				$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topnav',$data);
				$this->load->view('mahasiswa/detailmahasiswa',$data);
				$this->load->view('templates/footer');
			}else{
				$nidn = $this->session->userdata('ses_id');
				$data['foto'] = $this->ModelSiakad->getDataMahasiswaByNIM($id);
				$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($id);
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topnav',$data);
				$this->load->view('mahasiswa/detailmahasiswa',$data);
				$this->load->view('templates/footer');
			}
			
		}

		public function updatephotodosen()
		{
			$config['upload_path'] = "./assets/images";
            $config['allowed_types'] = 'gif|jpg|png|';
            $config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			if( $this->upload->do_upload('foto') )
			{
				$data = array('upload_data' => $this->upload->data());
				$nidn = $this->session->userdata('ses_id');
				$foto = $data['upload_data']['file_name'];
				$kirim = $this->ModelSiakad->updatePhotoDosen($foto,$nidn);
				if( $kirim )
				{
					$this->session->set_flashdata('sukses','Foto Profil Berhasil di ganti !');
					redirect('siakad/data_dosen');
				}else{
					$this->session->set_flashdata('msg','Foto Profil Berhasil di ganti !');
					redirect('siakad/data_dosen');
				}

			}else{
				$this->session->set_flashdata('msg',' Type File Bukan Gambar !');
				redirect('siakad/data_dosen');
			}
		}

		public function updatephotomhs()
		{
			$config['upload_path'] = "./assets/images";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|';
            $config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			if($this->upload->do_upload('foto'))
			{
				$data = array('upload_data' => $this->upload->data());
				$nim = $this->session->userdata('ses_id');
				$foto = $data['upload_data']['file_name'];
				$kirim = $this->ModelSiakad->updatePhotomhs($foto,$nim);
				if($kirim)
				{
					$this->session->set_flashdata('sukses','Foto Profile Berhasil di ganti !');
					redirect('siakad/detail_mahasiswa');
				}else{
					$this->session->set_flashdata('msg','Foto Profile Berhasil di ganti !');
					redirect('siakad/detail_mahasiswa');
				}

			}else{
				$this->session->set_flashdata('msg','Type File Bukan Gambar !');
				redirect('siakad/detail_mahasiswa');
			}
		}

		public function set_kelas()
		{
			if( $this->session->userdata('akses') == 1 )
			{
				$nidn = $this->session->userdata('ses_id');
				$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
				$data['dosen'] = $this->ModelSiakad->getDataDosen();
				$data['matkul'] = $this->ModelSiakad->getDataMataKuliah();
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topnav',$data);
				$this->load->view('kelas/form_kelas',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('siakad/');
			}
			
		}

		public function form_updatekelas()
		{
			if( $this->session->userdata('akses') == 1 )
			{
				$nidn = $this->session->userdata('ses_id');
				$id = $this->uri->segment(3);
				$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
				$data['dosen'] = $this->ModelSiakad->getDataDosen();
				$data['matkul'] = $this->ModelSiakad->getDataMataKuliah();
				$data['kelas'] = $this->ModelSiakad->getDataKelasByID($id);
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topnav',$data);
				$this->load->view('kelas/form_updatekelas',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('siakad/');
			}
		}

		public function prosestambahkelas()
		{
			$id = htmlspecialchars($_POST['id']);
			$kode = htmlspecialchars($_POST['kode']);
			$dosen = htmlspecialchars($_POST['dosen']);
			$matkul = htmlspecialchars($_POST['matkul']);
			$waktu = htmlspecialchars($_POST['waktu']);
			if( !empty($kode) && !empty($dosen) && !empty($waktu) && !empty($matkul) )
			{
				$this->ModelSiakad->tambahkelas($id,$kode,$dosen,$matkul,$waktu);
				$this->session->set_flashdata('sukses','Data Kelas Berhasil di tambahkan');
				redirect('siakad/set_kelas/');
			}else{
				$this->session->set_flashdata('gagal','Tolong isi semua field !');
				redirect('siakad/set_kelas/');
			}
		}

		public function set_krs()
		{
			$nidn = $this->session->userdata('ses_id');
			$nim = $this->session->userdata('ses_id');
			$data['sks'] = $this->ModelSiakad->getDataSks($nim);
			$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$data['krs'] = $this->ModelSiakad->getDataPerkuliahan($nim);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('mahasiswa/set_krs',$data);
			$this->load->view('templates/footer');
		}

		public function form_setkrs()
		{
			$data['matkul'] = $this->ModelSiakad->getDataKelas();
 			$nidn = $this->session->userdata('ses_id');
			$nim = $this->session->userdata('ses_id');
			$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('kelas/form_setkrs',$data);
			$this->load->view('templates/footer');
		}

		

		public function prosestambahperkuliahan()
		{
			$matkul = htmlspecialchars($_POST['matkul']);
			$perkuliahan = htmlspecialchars($_POST['perkuliahan']);
			$id_kelas = htmlspecialchars($_POST['id_kelas']);
			$nim = htmlspecialchars($_POST['nim']);
			$cek_sql = "SELECT * from perkuliahan where kode_matakuliah = ? and nim = ?";
			$result = $this->db->query($cek_sql,array($matkul,$nim));
			if($result->num_rows() <= 0)
			{
				$this->ModelSiakad->insertperkuliahan($perkuliahan,$id_kelas,$nim,$matkul);
				$this->session->set_flashdata('sukses','Matakuliah berhasil ditambah ke KRS');
				redirect('siakad/form_setkrs/');
			}else{
				$this->session->set_flashdata('gagal','Gagal, Matakuliah Sudah di ambil !');
				redirect('siakad/form_setkrs/');
			}
		}

		public function list_kelas()
		{
			if( $this->session->userdata('akses') == 1 )
			{
				$data['kelas'] = $this->ModelSiakad->getDataKelas();
				$nidn = $this->session->userdata('ses_id');
			    $data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
			    $this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
			    $this->load->view('templates/topnav',$data);
			    $this->load->view('kelas/data_kelas',$data);
			    $this->load->view('templates/footer');
			}else{
				redirect('siakad/');
			}
			
		}

		public function data_kelas()
		{
			if($this->session->userdata('akses') == 1 || $this->session->userdata('akses') == 2) 
			{
				$nidn = $this->session->userdata('ses_id');
				$data['kelas'] = $this->ModelSiakad->getDataPerkuliahanByNIDN($nidn);
				$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topnav',$data);
				$this->load->view('kelas/data_kelasdosen',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('siakad/');
			}
			
		}

		public function list_perkuliahan()
		{
			if( $this->session->userdata('akses') == 1 || $this->session->userdata('akses') == 2 )
			{
				
				$data['perkuliahan'] = $this->ModelSiakad->getAllDataPerkuliahan();
				$nidn = $this->session->userdata('ses_id');
				$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topnav',$data);
				$this->load->view('kelas/data_perkuliahan',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('siakad/');
			}
		}

		public function list_perkuliahandosen()
		{
			if( $this->session->userdata('akses') == 1 || $this->session->userdata('akses') == 2 )
			{
				$nidn = $this->session->userdata('ses_id');	
				$data['perkuliahan'] = $this->ModelSiakad->getDataPerkuliahanByNIDN($nidn);
				$nidn = $this->session->userdata('ses_id');
				$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topnav',$data);
				$this->load->view('kelas/data_perkuliahan',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('siakad/');
			}
		}

		public function administrasi()
		{
			if( $this->session->userdata('akses') == 1 )
			{
				
				$data['mahasiswa'] = $this->ModelSiakad->getDataMahasiswa();
				$nidn = $this->session->userdata('ses_id');
				$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topnav',$data);
				$this->load->view('administrasi/index',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('siakad/');
			}
		}

		public function set_pembayaran()
		{
			if( $this->session->userdata('akses') == 1 )
			{
				$nim = $this->uri->segment(3);
				$data['mahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
				$nidn = $this->session->userdata('ses_id');
				$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
				$data['jenis'] = $this->ModelSiakad->getDataJenis();
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topnav',$data);
				$this->load->view('administrasi/set_pembayaran',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('siakad/');
			}
		}
		
		public function prosespembayaran()
		{	
			$kode = htmlspecialchars($_POST['kode']);
			$namamahasiswa = htmlspecialchars($_POST['namamahasiswa']);
			$email = htmlspecialchars($_POST['email']);
			$nim = htmlspecialchars($_POST['nim']);
			$jenis = htmlspecialchars($_POST['jenis']);
			$nominal = htmlspecialchars($_POST['nominal']);
			$tgl = htmlspecialchars($_POST['tgl']);
			if($jenis == 1 || $jenis == 3 || $jenis == 5 || $jenis == 7 || $jenis == 9 || $jenis == 11 || $jenis == 13 || $jenis == 15){
				$jenis_pembayaran = "BPP";
			}else if($jenis == 2 || $jenis == 4 || $jenis == 6 || $jenis == 8 || $jenis == 10 || $jenis == 12 || $jenis == 14 || $jenis == 16){
				$jenis_pembayaran = "SKS";
			}
			$sql = "SELECT * from pembayaran where kode_jenis = ? and NIM = ?";
			$result = $this->db->query($sql,array($jenis,$nim));
			if( $result->num_rows() <= 0 )
			{
				$config = [
					'protocol'	=> 'smtp',
					'smtp_host'	=> 'ssl://smtp.googlemail.com',
					'smtp_user' => 'gentaprima605@gmail.com',
					'smtp_pass' => 'diponegoro1',
					'smtp_port' => '465',
					'mailtype'	=> 'html',
					'charset'	=> 'utf-8',
					'newline'	=> "\r\n"
				];
				$this->load->library('email', $config);
				$this->email->from('admin@UMG.com', 'Universitas Masagitu');
				$this->email->to($email);
				$this->email->subject('Universitas Masagitu - Pembayaran');
				$data['judul'] = "Terima Kasih sudah melakukan pembayaran.";
				$data['nama'] = $namamahasiswa; 
				$data['jenis'] = $jenis_pembayaran; 
				$data['tgl'] = $tgl; 
				$data['nominal'] = $nominal; 
				$body = $this->load->view('konfirmasi/email.php',$data,TRUE);
				$this->email->message($body);
				if ( $this->email->send() )
				{
					$this->ModelSiakad->insertpembayaran($kode,$jenis,$nim,$nominal,$tgl);
					$this->session->set_flashdata('sukses','Pembayaran berhasil dilakukan');
					redirect('siakad/set_pembayaran/'.$nim);
				} else {
					$this->session->set_flashdata('gagal','Pembayaran gagal dilakukan,Tolong periksa koneksi internet !');
					redirect('siakad/set_pembayaran/'.$nim);
				}
			}else{
				$this->session->set_flashdata('gagal','Jenis Pembayaran tersebut sudah dibayarkan !');
					redirect('siakad/set_pembayaran/'.$nim);
			}
			
		}


		public function _sendEmail()
		{
			
			
		}
		public function detail_perkuliahan()
		{
			if($this->session->userdata('akses') == 1 || $this->session->userdata('akses') == 2)
			{
				$kode = $this->uri->segment(3);
				$nidn = $this->session->userdata('ses_id');
				$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
				$data['perkuliahan'] = $this->ModelSiakad->getDataPerkuliahanByKode($kode);
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topnav',$data);
				$this->load->view('perkuliahan/detailkelas',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('siakad');
			}
			
		}
		public function list_nilaimahasiswa()
		{
			if($this->session->userdata('akses') == 1 || $this->session->userdata('akses') == 2)
			{
				$kode = $this->uri->segment(3);
				$data['kode'] = $kode;
				$nidn = $this->session->userdata('ses_id');
				$data['foto'] = $this->ModelSiakad->getDataDosenByNIDN($nidn);
				$data['perkuliahan'] = $this->ModelSiakad->getDataPerkuliahanByID($kode);
				$data['nilai'] = $this->ModelSiakad->getDataNilai($kode);
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topnav',$data);
				$this->load->view('perkuliahan/nilaimahasiswa',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('siakad');
			}
			
		}

		public function prosesnilai()
		{
			if(isset($_POST['insert']))
			{
				$id = $this->input->post('id');
				$id_kelas = $this->input->post('id_kelas');
				$nim = $this->input->post('nim');
				$absen = $this->input->post('absen');
				$tugas = $this->input->post('tugas');
				$uts = $this->input->post('uts');
				$uas = $this->input->post('uas');
				$data = array();
				foreach($id_kelas as $key => $val)
				{
					$data[] = array(
						"id_kelas"		=> $id_kelas[$key],
						"NIM"			=> $nim[$key],
						"nilai_absen"	=> $absen[$key],
						"nilai_tugas"	=> $tugas[$key],
						"nilai_uts"		=> $uts[$key],
						"nilai_uas"		=> $uas[$key],
						"nilai_akhir"	=> ($absen[$key]*0.1)+($tugas[$key]*0.2)+($uts[$key]*0.3)+($uas[$key]*0.4)
					);
				}
				$kirim = $this->ModelSiakad->insertDataNilai('nilai',$data);
				if($kirim)
				{
					$this->session->set_flashdata('sukses','Nilai Berhasil disimpan');
					redirect('siakad/list_nilaimahasiswa/'.$id);
				}
			}
			if(isset($_POST['update']))
			{
				$id = $this->input->post('id');
				$id_kelas = $this->input->post('id_kelas');
				$nim = $this->input->post('nim');
				$absen = $this->input->post('absen');
				$tugas = $this->input->post('tugas');
				$uts = $this->input->post('uts');
				$uas = $this->input->post('uas');
				$data = array();
				foreach($id_kelas as $key => $val)
				{
					$id_kls = $id_kelas[$key];
					$Nim = $nim[$key];
					$Absen = $absen[$key];
					$Tugas = $tugas[$key];
					$UTS = $tugas[$key];
					$UAS = $uas[$key];
					$akhir =  ($absen[$key]*0.1)+($tugas[$key]*0.2)+($uts[$key]*0.3)+($uas[$key]*0.4);
					$kirim = $this->ModelSiakad->updateDataNilai($id_kls,$Nim,$Absen,$Tugas,$UTS,$UAS,$akhir,$Nim,$id_kls);
				}
				
				if($kirim)
				{
					$this->session->set_flashdata('sukses','Nilai Berhasil di simpan');
					redirect('siakad/list_nilaimahasiswa/'.$id);
				}
			}
		}

		// MAHASISWA (NILAI ANGKA DETAIL)
		public function nilai_angkadetail()
		{
			$nim = $this->session->userdata('ses_id');
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$data['nilai']	= $this->ModelSiakad->getDataNilaiMahasiswa($nim);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('mahasiswa/nilaiangkadetail',$data);
			$this->load->view('templates/footer');
		}

		public function kartu_hasilstudi()
		{
			$nim = $this->session->userdata('ses_id');
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$data['nilai']	= $this->ModelSiakad->getDataNilaiMahasiswa($nim);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('mahasiswa/v_khs',$data);
			$this->load->view('templates/footer');
		}

		public function list_tagihanmhs()
		{
			$nim = $this->session->userdata('ses_id');
			$data['fotomahasiswa'] = $this->ModelSiakad->getDataMahasiswaByNIM($nim);
			$data['tagihan']	= $this->ModelSiakad->getDataTagihan($nim);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topnav',$data);
			$this->load->view('mahasiswa/tagihanmhs',$data);
			$this->load->view('templates/footer');
		}

		public function gantipassworddosen()
		{
			$id = $this->session->userdata('ses_id');
			$password = htmlspecialchars($_POST['password']);
			$password2 = htmlspecialchars($_POST['password2']);
			if($password != $password2)
			{
				$this->session->set_flashdata('msg','password tidak sama');
				redirect('siakad/data_dosen/');

			}else{
				$this->ModelSiakad->gantipassworddosen($password,$id);
				$this->session->set_flashdata('sukses','password berhasil diganti');
				redirect('siakad/data_dosen/');
			}
		}

		public function gantipasswordmhs()
		{
			$id = $this->session->userdata('ses_id');
			$password = htmlspecialchars($_POST['password']);
			$password2 = htmlspecialchars($_POST['password2']);
			if($password != $password2)
			{
				$this->session->set_flashdata('msg','password tidak sama');
				redirect('siakad/detail_mahasiswa/');

			}else{
				$this->ModelSiakad->gantipasswordmhs($password,$id);
				$this->session->set_flashdata('sukses','password berhasil diganti');
				redirect('siakad/detail_mahasiswa/');
			}
		}

	}