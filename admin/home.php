<?php

$kategori = new Kategori;
$proposal = new Proposal;
$query_proposal = $proposal->getProposalUser($_SESSION['id_user']);
$count_proposal = $proposal->countProposalUser($_SESSION['id_user']);
$seen = $proposal->countSeen($_SESSION['id_user']);
?>
<div class="col-lg-12 main-chart">
    <div class="row mtbox">
        <div class="col-md-3 col-sm-2 col-md-offset-1 box0">
            <div class="box1">
                <span class="li_news"></span>
                <h3><?=$count_proposal; ?></h3>
            </div>
            <p>
                933 Proposal yang anda submit
            </p>
        </div>
        <div class="col-md-3 col-sm-2 box0">
            <div class="box1">
                <span class="li_eye"></span>
                <h3><?=$seen;?></h3>
            </div>
            <p>
                <?=$seen;?> Kali Semua Proposal anda dilihat.
            </p>
        </div>
        <div class="col-md-3 col-sm-2 box0">
            <div class="box1">
                <span class="li_like"></span>
                <h3>OK!</h3>
            </div>
            <p>
                Proposal disetujui.
            </p>
        </div>
    </div>
    <!-- /row mt -->
    <div class="row mt">
    </div>
    <!-- /row -->
    <div class="row">
    </div>
    <!-- /row -->
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-file-text"></i> Proposal</h4>
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
    <!-- /row -->
</div>