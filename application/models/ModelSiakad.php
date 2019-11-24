<?php 

    class ModelSiakad extends CI_Model{

        public function getDataMahasiswa()
        {
            $sql = "SELECT * from mahasiswa order by NIM ASC";
            $result = $this->db->query($sql);
            return $result->result_array();
        }

        public function getDataDosen()
        {
            $sql = "SELECT * from dosen order by nama_dosen ASC";
            $result = $this->db->query($sql);
            return $result->result_array();
        }

        public function getDataMataKuliah()
        {
            $sql = "SELECT * from matakuliah order by kode_matakuliah";
            $result = $this->db->query($sql);
            return $result->result_array();
        }

        public function getDataMataKuliahByKode($kode)
        {
            $sql = "SELECT * from matakuliah where kode_matakuliah = ?";
            $result = $this->db->query($sql,$kode);
            return $result->result_array();
        }

        public function getDataMahasiswaByNIM($nim)
        {
            $sql = "SELECT * from mahasiswa where NIM = ?";
            $result = $this->db->query($sql,$nim);
            return $result->result_array();
        }

        public function getDataMahasiswaByID($nim)
        {
            $sql = "SELECT * from mahasiswa where NIM = ?";
            $result = $this->db->query($sql,$nim);
            return $result;
        }

        public function getDataProdi()
        {
            $sql = "SELECT * from prodi ";
            $result = $this->db->query($sql);
            return $result->result_array();
        }

        public function getDataCountMhs()
        {
            $sql = "SELECT COUNT(NIM)as jumlahmhs from mahasiswa";
            return $this->db->query($sql)->result_array();
        }

        public function getDataCountMatkul()
        {
            $sql = "SELECT COUNT(kode_matakuliah)as jumlahmatkul from matakuliah";
            return $this->db->query($sql)->result_array();
        }

        public function getDataCountDosen()
        {
            $sql = "SELECT COUNT(NIDN)as jumlahdosen from dosen";
            return $this->db->query($sql)->result_array();
        }
        public function getDataCountKelas()
        {
            $sql = "SELECT COUNT(kode_perkuliahan)as jumlahkelas from perkuliahan";
            return $this->db->query($sql)->result_array();
        }

        public function tambahDataDosen($nidn,$nama,$email,$role)
        {
            $sql = "INSERT INTO dosen(NIDN,nama_dosen,email,password,photo,role)
                        VALUES
                    (?,?,?,?,?,?)";
            $result = $this->db->query($sql,array($nidn,$nama,$email,md5($nidn),'',$role));
            return $result;
        }

        public function getDataDosenByNIDN($nidn)
        {
            $sql = "SELECT * from dosen where NIDN = ?";
            $result = $this->db->query($sql,$nidn);
            return $result->result_array();
        }

        public function updateDataDosen($nidn,$nama,$email,$role)
        {
            $sql = "UPDATE dosen SET nama_dosen = ?, email = ?, role = ? Where NIDN = ?";
            $result = $this->db->query($sql,array($nama,$email,$role,$nidn));
            return $result;
        }

        public function hapusDataDosen($nidn)
        {
            $sql = "DELETE from dosen where NIDN = ?";
            $result = $this->db->query($sql,$nidn);
        }

        public function hapusDataPerkuliahan($id_kelas)
        {
            $sql = "DELETE from perkuliahan where id_kelas = ?";
            $result = $this->db->query($sql,$id_kelas);
            return $result;
        }

        public function hapusDataKelas($id_kelas)
        {
            $sql = "DELETE from kelas where id_kelas = ?";
            $result = $this->db->query($sql,$id_kelas);
            return $result;
        }

        public function updatePhotoDosen($foto,$nidn)
        {
            $sql = "UPDATE dosen SET photo = ? where NIDN = ?";
            $result = $this->db->query($sql,array($foto,$nidn));
            return $result;
        }

        public function updatePhotomhs($foto,$nim)
        {
            $sql = "UPDATE mahasiswa SET foto = ? where NIM = ?";
            $result = $this->db->query($sql,array($foto,$nim));
            return $result;
        }

        public function insertDataMahasiswa($nim,$nama,$email,$strata,$jurusan,$angkatan)
        {
            $sql = "INSERT INTO mahasiswa (NIM,nama_mahasiswa,email,password,strata,jurusan,angkatan)
                        VALUES
                    (?,?,?,?,?,?,?)";
            return $this->db->query($sql,array($nim,$nama,$email,md5($nim),$strata,$jurusan,$angkatan));
        }

        public function tambahDataMataKuliah($kode,$nama,$sks)
        {
            $sql = "INSERT INTO matakuliah (kode_matakuliah,nama_matakuliah,sks)
                        VALUES (?,?,?)";
            $result = $this->db->query($sql,array($kode,$nama,$sks));
            return $result;
        }

        public function updateDataMataKuliah($kode,$nama,$sks,$prodi,$semester)
        {
            $sql = "UPDATE matakuliah SET nama_matakuliah = ?, sks = ?, prodi = ?, semester = ? where kode_matakuliah = ?";
            $result = $this->db->query($sql,array($nama,$sks, $prodi,$semester,$kode));
            return $result;
        }

        public function hapusDataMataKuliah($kode)
        {
            $sql = "DELETE from matakuliah where kode_matakuliah = ?";
            $result = $this->db->query($sql,$kode);
            return $result; 
        }

        public function gantipassworddosen($password,$id)
        {
            $sql = "UPDATE dosen SET password =? where NIDN = ?";
            $result = $this->db->query($sql,array(md5($password),$id));
            return $result;
        }

        public function gantipasswordmhs($password,$id)
        {
            $sql = "UPDATE mahasiswa SET password =? where NIM = ?";
            $result = $this->db->query($sql,array(md5($password),$id));
            return $result;
        }

        public function tambahkelas($id,$kode,$dosen,$matkul,$waktu)
        {
            $sql = "INSERT INTO kelas (id_kelas,kode_kelas,NIDN,kode_matakuliah,waktu) 
                        VALUES
                    (?,?,?,?,?)";
            return $this->db->query($sql,array($id,$kode,$dosen,$matkul,$waktu));   
        }
        
        public function getDataKelas()
        {
            $sql = "SELECT kelas.kode_matakuliah,dosen.nama_dosen, matakuliah.nama_matakuliah, matakuliah.sks, matakuliah.kode_matakuliah, kelas.id_kelas ,kelas.kode_kelas, kelas.waktu from matakuliah,kelas,dosen where matakuliah.kode_matakuliah = kelas.kode_matakuliah and dosen.NIDN = kelas.NIDN " ; 
            return $this->db->query($sql)->result_array();
        }

        public function getDataKelasByID($id)
        {
            $sql = "SELECT kelas.kode_matakuliah,dosen.nama_dosen, matakuliah.nama_matakuliah, matakuliah.sks, matakuliah.kode_matakuliah, kelas.id_kelas ,kelas.kode_kelas, kelas.waktu,dosen.NIDN from matakuliah,kelas,dosen where matakuliah.kode_matakuliah = kelas.kode_matakuliah and dosen.NIDN = kelas.NIDN and id_kelas = ? " ; 
            return $this->db->query($sql,$id)->result_array();
        }

        public function insertperkuliahan($perkuliahan,$id_kelas,$nim,$matkul)
        {
            $sql = "INSERT INTO perkuliahan (kode_perkuliahan,id_kelas,NIM,kode_matakuliah)
                        VALUES
                    (?,?,?,?)";
            return $this->db->query($sql,array($perkuliahan,$id_kelas,$nim,$matkul));
        }

        public function getDataPerkuliahan($nim)
        {
            $sql = "SELECT kelas.kode_matakuliah, matakuliah.nama_matakuliah, kelas.kode_kelas, matakuliah.sks, kelas.waktu  from kelas,matakuliah,perkuliahan where kelas.kode_matakuliah = matakuliah.kode_matakuliah and kelas.id_kelas = perkuliahan.id_kelas and NIM = ?";
            return $this->db->query($sql,$nim)->result_array();
        }

        public function getAllDataPerkuliahan()
        {
            $sql = " SELECT DISTINCT matakuliah.nama_matakuliah, kelas.id_kelas, perkuliahan.kode_perkuliahan , dosen.nama_dosen, kelas.kode_kelas, perkuliahan.kode_matakuliah from perkuliahan,kelas,matakuliah,dosen where kelas.id_kelas = perkuliahan.id_kelas and matakuliah.kode_matakuliah = kelas.kode_matakuliah and dosen.NIDN = kelas.NIDN group by perkuliahan.id_kelas";
            return $this->db->query($sql)->result_array();
        }

        public function getDataPerkuliahanByNIDN($nidn)
        {
            $sql = "SELECT DISTINCT perkuliahan.kode_perkuliahan,matakuliah.nama_matakuliah, kelas.waktu, kelas.kode_kelas, dosen.nama_dosen, kelas.kode_kelas, perkuliahan.kode_matakuliah from perkuliahan,kelas,matakuliah,dosen where kelas.id_kelas = perkuliahan.id_kelas and matakuliah.kode_matakuliah = kelas.kode_matakuliah and dosen.NIDN = kelas.NIDN and dosen.NIDN = ? group by perkuliahan.id_kelas";
            return $this->db->query($sql,$nidn)->result_array();
        }

        public function getDataPerkuliahanByNIM($nim)
        {
            $sql = "SELECT matakuliah.nama_matakuliah, dosen.nama_dosen, kelas.kode_kelas, perkuliahan.kode_matakuliah,kelas.waktu from perkuliahan,kelas,matakuliah,dosen where kelas.id_kelas = perkuliahan.id_kelas and matakuliah.kode_matakuliah = kelas.kode_matakuliah and dosen.NIDN = kelas.NIDN and perkuliahan.NIM = ?";
            return $this->db->query($sql,$nim)->result_array();
        }

        public function getDataSks($nim)
        {
            $sql = "SELECT sum(sks)as jumlah_sks from perkuliahan,kelas,matakuliah where kelas.id_kelas = perkuliahan.id_kelas and matakuliah.kode_matakuliah = kelas.kode_matakuliah and NIM = ?";
            return $this->db->query($sql,$nim)->result_array();
        }

        public function getDataPerkuliahanByKode($kode)
        {
            $sql = "SELECT perkuliahan.kode_perkuliahan,kelas.id_kelas , mahasiswa.nama_mahasiswa, dosen.nama_dosen, kelas.kode_kelas, matakuliah.nama_matakuliah,kelas.waktu from perkuliahan,kelas,dosen,matakuliah,mahasiswa where kelas.id_kelas = perkuliahan.id_kelas and matakuliah.kode_matakuliah = kelas.kode_matakuliah and dosen.NIDN = kelas.NIDN and mahasiswa.NIM = perkuliahan.NIM and perkuliahan.kode_perkuliahan = ?";
            return $this->db->query($sql,$kode)->result_array();
        }

        public function getDataPerkuliahanByID($kode)
        {
            $sql = "SELECT perkuliahan.kode_perkuliahan,kelas.id_kelas ,mahasiswa.NIM, mahasiswa.nama_mahasiswa, dosen.nama_dosen, kelas.kode_kelas, matakuliah.nama_matakuliah,kelas.waktu from perkuliahan,kelas,dosen,matakuliah,mahasiswa where kelas.id_kelas = perkuliahan.id_kelas and matakuliah.kode_matakuliah = kelas.kode_matakuliah and dosen.NIDN = kelas.NIDN and mahasiswa.NIM = perkuliahan.NIM and perkuliahan.id_kelas = ? order by perkuliahan.NIM ASC";
            return $this->db->query($sql,$kode)->result_array();
        }

        public function getDataNilai($kode)
        {
            $sql = "SELECT nilai.id_kelas, mahasiswa.NIM, nilai.nilai_absen, nilai.nilai_tugas, nilai.nilai_uts,nilai.nilai_uas,nilai.nilai_akhir ,mahasiswa.nama_mahasiswa from nilai,mahasiswa where mahasiswa.NIM = nilai.NIM and id_kelas =  ?";
            return $this->db->query($sql,$kode)->result_array();
        }

        public function getDataJurusan()
        {
            $sql = "SELECT * from jurusan";
            return $this->db->query($sql)->result_array();
        }

        public function getDataJenis()
        {
            $sql = "SELECT * from jenis_pembayaran";
            return $this->db->query($sql)->result_array();
        }

        public function insertpembayaran($kode,$jenis,$nim,$nominal,$tgl)
        {
            $sql = "INSERT INTO pembayaran (id_pembayaran,kode_jenis,NIM,nominal,tgl_pembayaran)
                        VALUES
                    (?,?,?,?,?)";
            return $this->db->query($sql,array($kode,$jenis,$nim,$nominal,$tgl));
        }

        public function insertDataNilai($table,$data)
        {
            return $this->db->insert_batch($table,$data);
        }

        public function updateDataNilai($id_kls,$Nim,$Absen,$tugas,$UTS,$UAS,$akhir,$nim,$id)
        {
            $jumlah = count($id_kls);
            for($i = 0 ; $i <= $jumlah; $i++)
            {
                $sql = "UPDATE nilai SET 
                id_kelas = ?,
                NIM = ?, 
                nilai_absen = ?,
                nilai_tugas = ?,
                nilai_uts = ?,
                nilai_uas = ?,
                nilai_akhir = ? WHERE NIM = ? and id_kelas = ?
                 ";
                 
                return $this->db->query($sql,array($id_kls,$Nim,$Absen,$tugas,$UTS,$UAS,$akhir,$nim,$id));
            }
          
        }

        public function getDataNilaiMahasiswa($nim)
        {
            $sql = "SELECT matakuliah.kode_matakuliah,matakuliah.sks,nilai.nilai_absen, nilai.nilai_tugas, nilai.nilai_uts, nilai.nilai_uas, nilai.nilai_akhir, matakuliah.nama_matakuliah, matakuliah.kode_matakuliah from nilai,matakuliah,kelas where kelas.id_kelas = nilai.id_kelas and matakuliah.kode_matakuliah = kelas.kode_matakuliah and nilai.NIM = ? group by nilai.id_kelas";
            return $this->db->query($sql,$nim)->result_array();
        }

        public function getDataTagihan($nim)
        {
            $sql = "SELECT pembayaran.id_pembayaran, jenis_pembayaran.jenis_pembayaran,pembayaran.nominal,pembayaran.tgl_pembayaran from pembayaran,jenis_pembayaran where jenis_pembayaran.kode_jenis = pembayaran.kode_jenis and pembayaran.NIM = ?";
            return $this->db->query($sql,$nim)->result_array();
        }
    }