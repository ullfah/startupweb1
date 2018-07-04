<?php
/**
 * 
 */
class KoneksiDb
{
    // protected $host = "olxl65dqfuqr6s4y.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    // protected $db = "kddr2jm4y36uf3p7";
    // protected $user = "yl2lm3lz9bqhjjab";
    // protected $pass = "em3ziyis2vggx7mm";
    protected $host = "localhost";
    protected $db = "kddr2jm4y36uf3p7";
    protected $user = "root";
    protected $pass = "";

    function connect()
    {
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);exit;
        }
        return $conn;
    }
}