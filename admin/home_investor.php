<?php

$kategori = new Kategori;
$proposal = new Proposal;
$query_proposal = $proposal->proposalInvestor($_SESSION['id_user']);
$proposal_accepted = $proposal->countProposalInvestor($_SESSION['id_user']);
$count_proposal_all = $proposal->countAllProposal($_SESSION['id_user']);
?>
<div class="col-lg-12 main-chart">
    <div class="row mtbox">
        <div class="col-md-4 col-sm-3 col-md-offset-1 box0">
            <div class="box1">
                <span class="li_news"></span>
                <h3><?=$count_proposal_all; ?></h3>
            </div>
            <p>
                <?=$count_proposal_all; ?> Proposal yang diajukan.
            </p>
        </div>
        <div class="col-md-4 col-sm-3 col-md-offset-1 box0">
            <div class="box1">
                <span class="li_like"></span>
                <h3><?=$proposal_accepted;?></h3>
            </div>
            <p>
                <?=$proposal_accepted;?> Proposal yang disetujui.
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
                <h4><i class="fa fa-file-text"></i> Proposal Yang Anda Setujui</h4>
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