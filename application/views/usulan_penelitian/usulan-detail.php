<div class="page-header">
    <h2>Data Laporan Penelitian</h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Data
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
            <div id="widget1" class="panel-body collapse in">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th width="20%">Tanggal Usulan Penelitian</th>
                            <th width="3%">:</th>
                            <th><?php if ($tgl_usulan != null){echo $tgl_usulan;}else {echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Skema Penelitian</th>
                            <th>:</th>
                            <th><?php if ($skema != null ){ echo $skema; } else {echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Judul Penelitian</th>
                            <th>:</th>
                            <th><?php if ($judul != null ){ echo $judul; } else {echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Bidang Kajian</th>
                            <th>:</th>
                            <th><?php if ($bidang_kajian != null ){ echo $bidang_kajian; } else { echo '-'; }?></th>
                        </tr>
                        <tr>
                            <th>Dana Penelitian</th>
                            <th>:</th>
                            <th><?php if ($dana_penelitian != null ){ echo $dana_penelitian; } else{echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Ketua</th>
                            <th>:</th>
                            <th><?php if ($ketua != null ){ echo $ketua; } else{echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Anggota</th>
                            <th>:</th>
                            <th><?php if ($anggota2 != null ){ echo $anggota2; } else{echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Anggota</th>
                            <th>:</th>
                            <th><?php if ($anggota3 != null ){ echo $anggota3; } else{echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Tenaga Ahli</th>
                            <th>:</th>
                            <th><?php if ($tenaga_ahli != null ){ echo $tenaga_ahli; } else{echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Luaran Penelitian</th>
                            <th>:</th>
                            <th><?php if ($luaran != null ){ echo $luaran; } else {echo '-';}?></th>
                        </tr>
                      <!--  <tr>
                            <th>Proposal</th>
                            <th>:</th>
                            <th><?php if ($file_proposal != null ){ echo $file_proposal; } else{echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Surat Rencana Belanja</th>
                            <th>:</th>
                            <th><?php if ($file_suratrencanabelanja != null ){ echo $file_suratrencanabelanja; } else{echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Surat Pernyataan</th>
                            <th>:</th>
                            <th><?php if ($file_pernyataan != null ){ echo $file_pernyataan; } else{echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Tahun Penelitian</th>
                            <th>:</th>
                            <th><?php if ($tahun_penelitian != null ){ echo $tahun_penelitian; } else{echo '-';}?></th>
                        </tr>-->
                        <tr>
                            <th>Status Verifikasi</th>
                            <th>:</th>
                            <th><?php if ($verifikasi != null ){ echo $verifikasi; } else{echo '-';}?></th>
                        </tr>
                     <!--   <tr>
                            <th>PDF</th>
                            <th>:</th>
                            <th><?php if ($pdf != null ){ echo $pdf; } else{echo '-';}?></th>
                        </tr>  -->
                    </table>
                    <a href="<?php echo base_url('assets/pdf/'.$tahun_penelitian.'/'.$file_proposal)?>"><button class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Proposal</button></a>
                    <a href="<?php echo base_url('assets/pdf/'.$tahun_penelitian.'/'.$file_suratrencanabelanja)?>"><button class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Surat Rencana Belanja</button></a>
                    <a href="<?php echo base_url('assets/pdf/'.$tahun_penelitian.'/'.$file_pernyataan)?>"><button class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Surat Pernyataan</button></a>
                    <button class="btn btn-warning" onclick="history.back()"> KEMBALI</button>
                </div>
            </div>
        </div>
    </div>
</div>