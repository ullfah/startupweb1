<?php

$kategori = new Kategori;
$proposal = new Proposal;
$pendukung = new FilePendukung;

if (isset($_POST['submit'])) {
    $target_dir = "uploads/"; //nama folder untuk menyimpan file

    //ngecek folder
    if (!file_exists($target_dir)) {
        //buat folder jika folder tidak ada
        mkdir($target_dir, 0777);
    }

    $target_file = $target_dir . basename($_FILES["file_pendukung"]["name"]); //path file pendukung yang akan diupload
    $target_gambar = $target_dir . basename($_FILES["gambar"]["name"]); //path file gambar cover yang akan diupload
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //buat dapetin extensi atau jenis file yang diupload
    $imageType = strtolower(pathinfo($target_gambar,PATHINFO_EXTENSION)); //buat dapetin extensi atau jenis file yang diupload

    $post = $_POST['Proposal'];
    $id_user = $_SESSION['id_user'];
    $id_kategori = $post['id_kategori'];
    $judul = $post['judul'];
    $keterangan = $post['keterangan'];
    $seen = 0;
    $status = 0;
    $gambar = !empty($target_gambar) ? $target_gambar : '';
    $file = !empty($target_file) ? $target_file : '';
    $created = date('Y-m-d');

    $uploadOk = 1;
    if (empty($id_kategori)) {
        echo "<div class='col-lg-12'><div class='alert alert-danger'>Kategori tidak boleh kosong</div></div>";
        $uploadOk = 0;
    }
    if (empty($judul)) {
        echo "<div class='col-lg-12'><div class='alert alert-danger'>Judul tidak boleh kosong</div></div>";
        $uploadOk = 0;
    }
    if (empty($keterangan)) {
        echo "<div class='col-lg-12'><div class='alert alert-danger'>Keterangan tidak boleh kosong</div></div>";
        $uploadOk = 0;
    }
    if (empty($_FILES["file_pendukung"]["name"])) {
        echo "<div class='col-lg-12'><div class='alert alert-danger'>File pendukung harus diupload.</div></div>";
        $uploadOk = 0;
    }
    if (empty($_FILES["gambar"]["name"])) {
        echo "<div class='col-lg-12'><div class='alert alert-danger'>File Cover harus diupload.</div></div>";
        $uploadOk = 0;
    }
    if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif" ) {
        echo "<div class='col-lg-12'><div class='alert alert-danger'>Cover hanya boleh berupa file gambar (jpg, jpeg, gif, png).</div></div>";
        $uploadOk = 0;
    }
    if($fileType != "docx" && $fileType != "pdf" && $fileType != "doc" && $fileType != "xlsx" && $fileType != 'pptx') {
        echo "<div class='col-lg-12'><div class='alert alert-danger'>File Pendukung hanya boleh berupa file docx/pdf/ppt/xlsx.</div></div>";
        $uploadOk = 0;
    }
    if ($uploadOk > 0) {
        if (move_uploaded_file($_FILES["file_pendukung"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_gambar)) {
            $simpan = $proposal->insertProposal($id_user, $id_kategori, $judul, $keterangan, $seen, $status, $gambar, $created); //return id proposal yang baru saja di insert
            $simpan_upload = $pendukung->insertFilePendukung($simpan, $file);
            if (!empty($simpan) && !empty($simpan_upload)) {
                echo "<div class='col-lg-12'><div class='alert alert-success'>Data berhasil disimpan</div></div>";
                echo "<script>setTimeout(function () { window.location.href= 'index.php'},3000);</script>";
            }
        }
    }
}
?>
<div class="col-lg-12">
    <div class="form-panel">
        <h4 class="mb"><i class="fa fa-angle-right"></i> Buat Proposal</h4>
            <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="index.php?act=create-proposal">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="Proposal[judul]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                    <div class="col-sm-10">
                        <select name="Proposal[id_kategori]" class="form-control">
                            <?php echo $kategori->getOptions();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="Proposal[keterangan]"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Upload Cover</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="gambar">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Upload File Pendukung (pdf/docx/ppt)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="file_pendukung">
                    </div>
                </div>
                <button type="submit" class="btn btn-theme" name="submit">Submit</button>
            </form>
    </div>
</div>