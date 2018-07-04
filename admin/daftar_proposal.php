<?php
$kategori = new Kategori;
$proposal = new Proposal;


$halaman = 10;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = $proposal->getAllProposal();
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman); 

if ($_SESSION['id_group'] == 2) {
    $query_proposal = $proposal->getAllProposal();
} elseif ($_SESSION['id_group'] == 3) {
    $query_proposal = $proposal->getProposalUser($_SESSION['id_user']);
} else {
    $query_proposal = $proposal->getAllProposal();
}

?>
<div class="col-lg-12 main-chart">

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-file-text"></i> Semua Proposal yang diajukan</h4>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal Submit</th>
                            <th>Dilihat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($query_proposal)) :?>
                            <?php
                            $no = 1;
                            while ($dt = mysqli_fetch_assoc($query_proposal)) :
                            ?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?=$dt['judul'];?></td>
                                    <td><?=$kategori->getNamaKategori($dt['id_kategori']);?></td>
                                    <td><?=$helper->dateIndo($dt['created_date']);?></td>
                                    <td><?=intval($dt['seen']);?> x</td>
                                </tr>
                                <?php
                                $no++;
                            endwhile;
                            ?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
            <!-- --/content-panel ---->
        </div>
        <!--custom chart end-->
    </div>

</div>