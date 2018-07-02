<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['id_user']);
unset($_SESSION['id_group']);
session_destroy();
header("Location: ./index.php");
?>