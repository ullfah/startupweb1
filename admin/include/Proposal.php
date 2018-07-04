<?php

class Proposal {

    protected $conn;

    function __construct()
    {
        $this->conn = new KoneksiDb;
    }

    function insertProposal($id_user, $id_kategori, $judul, $keterangan, $seen = null, $status = null, $gambar, $created_date = null)
    {
        $con = $this->conn->connect();
        $seen = !empty($seen) ? $seen : 0;
        $status = !empty($status) ? $status : 0;
        $created_date = !empty($created_date) ? $created_date : date('Y-m-d');
        $sql = "INSERT INTO `kddr2jm4y36uf3p7`.`proposal`(`id`, `id_user`, `id_kategori`, `judul`, `keterangan`, `seen`, `status`, `gambar`, `created_date`, `updated_date`) VALUES ('','$id_user','$id_kategori','$judul','$keterangan','$seen','$status','$gambar','$created_date','')";
        if ($con->query($sql) === true) {
            return $con->insert_id;
        }
    }

    function getProposalUser($id_user)
    {
        if (!empty($id_user)) {
            $sql = "SELECT * FROM `kddr2jm4y36uf3p7`.`proposal` WHERE id_user = '$id_user'";
            $query = mysqli_query($this->conn->connect(), $sql);
            if (mysqli_num_rows($query)) {
                return $query;
            }
        }
    }

    function countProposalUser($id_user)
    {
        if (!empty($id_user)) {
            $sql = "SELECT * FROM `kddr2jm4y36uf3p7`.`proposal` WHERE id_user = '$id_user'";
            $query = mysqli_query($this->conn->connect(), $sql);
            return mysqli_num_rows($query);
        }
    }

    function countSeen($id_user)
    {
        if (!empty($id_user)) {
            $seen = 0;
            $con = $this->conn->connect();
            $sql = "SELECT * FROM `kddr2jm4y36uf3p7`.`proposal` WHERE id_user = '$id_user'";
            $query = $con->query($sql);
            if (mysqli_num_rows($query)) {
                while ($r = mysqli_fetch_assoc($query)) {
                    $seen += intval($r['seen']);
                }
            }
            return $seen;
        }
    }

    function proposalInvestor($id_user)
    {
        if (!empty($id_user)) {
            $con = $this->conn->connect();
            $sql = "SELECT p.*, a.`id_proposal`, i.`created_date` AS tgl_accept, i.`id_accepted` FROM proposal p, accepted a, investor_accept i WHERE p.`id` = a.`id_proposal` AND a.`id` = i.`id_accepted` AND i.`id_user` = '$id_user'";
            $query = $con->query($sql);
            if (mysqli_num_rows($query)) {
                return $query;
            }
        }
    }

    function countProposalInvestor($id_user)
    {
        if (!empty($id_user)) {
            $count = 0;
            $con = $this->conn->connect();
            $sql = "SELECT p.*, a.`id_proposal`, i.`created_date` AS tgl_accept, i.`id_accepted` FROM proposal p, accepted a, investor_accept i WHERE p.`id` = a.`id_proposal` AND a.`id` = i.`id_accepted` AND i.`id_user` = '$id_user'";
            $query = $con->query($sql);
            if (mysqli_num_rows($query)) {
                $count = mysqli_num_rows($query);
            }
            return $count;
        }
    }

    function countAllProposal()
    {
        $count = 0;
        $con = $this->conn->connect();
        $sql = "SELECT * FROM `proposal`";
        $query = $con->query($sql);
        if (mysqli_num_rows($query)) {
            $count = mysqli_num_rows($query);
        }
        return $count;
    }

    function getAllProposal($mulai = null, $halaman = null)
    {
        $con = $this->conn->connect();
        $sql = "SELECT * FROM `proposal`";
        $sql .=" ORDER BY created_date DESC";
        $query = $con->query($sql);
        if (mysqli_num_rows($query)) {
            return $query;
        }
    }
}