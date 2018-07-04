<?php
include '../koneksi.php';
$konek = new KoneksiDb;
if (!empty($_POST['Login'])) {
    session_start();
    $post = $_POST['Login'];
    $user = $post['username'];
    $pass = $post['password'];
    $pass = md5($pass);
    $sql = "SELECT * FROM `kddr2jm4y36uf3p7`.`user` WHERE username = '$user' AND password = '$pass' AND `status` = 1";
    $login = mysqli_query($konek->connect(), $sql);
    $data = mysqli_fetch_assoc($login);
    if (mysqli_num_rows($login)) {
        $sql2 = "SELECT * FROM `kddr2jm4y36uf3p7`.`profile` WHERE id_user = '$data[id_user]'";
        $profile = mysqli_query($konek->connect(), $sql2);
        $udata = mysqli_fetch_assoc($profile);
        $_SESSION['username'] = $user;
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['id_group'] = $data['id_group'];
        if (mysqli_num_rows($profile)) {
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