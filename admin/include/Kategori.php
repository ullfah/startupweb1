<?php

class Kategori {

    protected $sql;
    protected $query;
    protected $conn;

    function __construct()
    {
        $this->conn = new KoneksiDb;
        $this->sql = "SELECT * FROM `kddr2jm4y36uf3p7`.`kategori` ORDER BY `nama_kategori`";
        $this->query = mysqli_query($this->conn->connect(), $this->sql);
    }

    function getKategori()
    {
        return mysqli_fetch_assoc($this->query);
    }

    function getOptions()
    {
        $opt = '<option value="">-- pilih kategori --</option>';
        if (mysqli_num_rows($this->query)) {
            while ($data = $this->getKategori()) {
                $opt .= '<option value="'.$data['id'].'">'.$data['nama_kategori'].'</option>';
            }
        }
        return $opt;
    }

    function getNamaKategori($id)
    {
        if (!empty($id)) {
            $sql = "SELECT * FROM `kddr2jm4y36uf3p7`.`kategori` WHERE id = '$id'";
            $query = mysqli_query($this->conn->connect(), $sql);
            if (mysqli_num_rows($query)) {
                $data = mysqli_fetch_assoc($query);
                return $data['nama_kategori'];
            }
        }
    }
}