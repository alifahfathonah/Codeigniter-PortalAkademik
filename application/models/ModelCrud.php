<?php 

        class ModelCrud extends CI_Model 
        {
            public function InsertData($data)
            {
                $sql = "INSERT INTO mahasiswa Values ?,?,?,?,?";
                $querybind = $this->db->query($sql,array($data['NIM'],$data['nama'],$data['fakultas'],$data['strata'],$data['no_hp']));
                return $query;
            }
        }