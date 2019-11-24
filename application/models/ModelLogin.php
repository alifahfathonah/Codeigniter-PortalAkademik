<?php 

    class ModelLogin extends CI_Model{

        public function auth_dosen($username,$password)
        {
            $sql = "SELECT * from dosen where NIDN = ? and password = ?";
            $querybind = $this->db->query($sql,array($username,md5($password)));
            return $querybind;
        }

        public function auth_mahasiswa($username,$password)
        {
            $sql = "SELECT * from mahasiswa where NIM = ? and password = ?";
            $querybind = $this->db->query($sql,array($username,md5($password)));
            return $querybind;
        }
    }