<?php
$host = "localhost";
$db = "startup";
$user = "root";
$pass = "";
mysql_select_db($db);
mysql_connect($host, $user, $pass) or die('koneksi gagal');
