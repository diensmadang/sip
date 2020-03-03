<div class="page-header">
    <h2>Laporan Akhir Penelitian</h2>
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
                            <th width="20%">Tanggal Laporan Akhir</th>
                            <th width="3%">:</th>
                            <th><?php if ($tgl_laporan != null){echo $tgl_laporan;}else {echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Judul</th>
                            <th>:</th>
                            <th><?php if ($judul != null ){ echo $judul; } else {echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Ketua Tim</th>
                            <th>:</th>
                            <th><?php if ($ketua != null ){ echo $ketua; } else {echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Ringkasan Penelitian</th>
                            <th>:</th>
                            <th><?php if ($ringkasan_penelitian != null ){ echo $ringkasan_penelitian; } else { echo '-'; }?></th>
                        </tr>
                        <tr>
                            <th>Link Luaran Jurnal</th>
                            <th>:</th>
                            <th><?php if ($link_luaranjurnal != null ){ echo $link_luaranjurnal; } else{echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Status Verifikasi</th>
                            <th>:</th>
                            <th><?php if ($verifikasi != null ){ echo $verifikasi; } else{echo '-';}?></th>
                        </tr>
                    </table>
                    <a href="<?php echo base_url('assets/pdf/'.$tahun_penelitian.'/'.$file_program)?>"><button class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Upload Program</button></a>
                    <a href="<?php echo base_url('assets/pdf/'.$tahun_penelitian.'/'.$file_sptb)?>"><button class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Upload SPTB</button></a>
                    <a href="<?php echo base_url('assets/pdf/'.$tahun_penelitian.'/'.$file_pernyataan)?>"><button class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Upload Pernyataan</button></a>
                    <button class="btn btn-warning" onclick="history.back()"> KEMBALI</button>
                </div>
            </div>
        </div>
    </div>
</div>