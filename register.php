
<?php include 'header.php';?>
<?php
session_start();
include 'koneksi.php';
if (!empty($_POST['Register'])) {
    $post = $_POST['Register'];
    if ($post['password'] == $post['password2']) {
        $date = date('Y-m-d');
        $password = md5($post['password']);
        $sqlcek = "SELECT * FROM `startup`.`user` WHERE username = '$post[username]'";
        $querycek = mysql_query($sqlcek);
        $datauser = mysql_fetch_assoc($querycek);
        if (!mysql_num_rows($querycek)) {
            $sql = "INSERT INTO `startup`.`user`(`id_user`, `id_group`, `username`, `password`, `email`, `status`, `created_date`, `updated_date`) VALUES ('','3','$post[username]','$password','$post[email]','1','$date','')";
            if (mysql_query($sql)) {
                $_SESSION['pesan'] = 'Data Berhasil disimpan, silahkan login menggunakan username dan password yang baru saja anda buat.';
                $_SESSION['alert'] = 'alert-success';
            } else {
                $_SESSION['pesan'] = 'Data Gagal disimpan';
                $_SESSION['alert'] = 'alert-danger';
            }
        } else {
            $_SESSION['pesan'] = 'Username sudah ada';
            $_SESSION['alert'] = 'alert-danger';
        }
    } else {
        $_SESSION['pesan'] = 'Ulangi Password harus sama';
        $_SESSION['alert'] = 'alert-danger';
    }
}
?>
<div class="contact_form_container"></div>
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 contact_form_col">
                <div class="section_title_container">
                    <div class="section_subtitle"></div>
                    <div class="section_title">Bergabung sekarang</div>
                </div>
                <?php if (!empty($_SESSION['alert'])) :?>
                    <div class="alert <?=$_SESSION['alert'];?>">
                        <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
                        <?=$_SESSION['pesan'];?>
                    </div>
                <?php endif;?>
                <div class="contact_form_container">
                    <form action="index.php?page=register" class="contact_form" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="input_item" placeholder="Input Username" required="required" name="Register[username]">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="input_item" placeholder="Input E-mail" required="required" name="Register[email]">
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="input_item" placeholder="Input Password" required="required" name="Register[password]">
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="input_item" placeholder="Ulangi Password" required="required" name="Register[password2]">
                            </div>
                            <div class="col-md-12">
                                <button id="contact_btn" type="submit" class="contact_button trans_200" value="Submit">Daftar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>