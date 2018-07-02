<?php
include '../koneksi.php';
if (!empty($_POST['Login'])) {
    session_start();
    $post = $_POST['Login'];
    $user = $post['username'];
    $pass = $post['password'];
    $pass = md5($pass);
    $sql = "SELECT * FROM `startup`.`user` WHERE username = '$user' AND password = '$pass' AND `status` = 1";
    $login = mysql_query($sql);
    $data = mysql_fetch_assoc($login);
    if (mysql_num_rows($login)) {
        $sql2 = "SELECT * FROM `startup`.`profile` WHERE id_user = '$data[id_user]'";
        $profile = mysql_query($sql2);
        $udata = mysql_fetch_assoc($profile);
        $_SESSION['username'] = $user;
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['id_group'] = $data['id_group'];
        if (mysql_num_rows($profile)) {
            $_SESSION['id_profile'] = $udata['id'];
            $_SESSION['nama'] = $udata['nama'];
            if (!empty($_SESSION['username'])) {
                unset($_POST['Login']);
                echo '<script>window.location.href="index.php";</script>';
            }
        } else {
            unset($_POST['Login']);
            echo '<script>window.location.href="index.php";</script>';
        }
    } else {
        echo '<script>window.location.href="login.php";</script>';
    }
} else {
    echo '<script>window.location.href="index.php";</script>';
}
?>