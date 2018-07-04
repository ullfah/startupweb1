<?php

class FilePendukung {

    protected $conn;

    function __construct()
    {
        $this->conn = new KoneksiDb;
    }

    function insertFilePendukung($id_proposal, $file)
    {
        $con = $this->conn->connect();
        $sql = "INSERT INTO `kddr2jm4y36uf3p7`.`upload_file`(`id`, `id_proposal`, `file`) VALUES ('','$id_proposal','$file')";
        if ($con->query($sql) === true) {
            return $con->insert_id;
        }
    }
}