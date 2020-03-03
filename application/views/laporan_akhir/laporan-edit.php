<div class="page-header">
    <h2>Laporan Akhir</h2>
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
                <div class="modal-dialog">
                    <?php
                    $data=$this->session->flashdata('error');
                    if($data!=""){ ?>
                        <div id="pesan-flash">
                            <div class='alert alert-danger alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <strong> Error! </strong> <?=$data;?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $data2=$this->session->flashdata('sukses');
                    if($data2!=""){ ?>
                        <div id="pesan-error-flash">
                            <div class='alert alert-success alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <strong> Succes! </strong> <?=$data2;?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $data3=$this->session->flashdata('warning');
                    if($data3!=""){ ?>
                        <div id="pesan-error-flash">
                            <div class='alert alert-warning alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <strong> Warning! </strong> <?=$data3;?>
                            </div>
                        </div>
                    <?php } ?>
                    <form action="<?php echo site_url('laporan_akhir/update_data')?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id_laporan" value="<?php echo $id_laporan;?>">
                        <input type="hidden" name="tahun_penelitian" value="<?php echo $tahun_penelitian;?>">
                        <input type="hidden" name="program_lama" value="<?php echo $file_program;?>">
                        <input type="hidden" name="sptb_lama" value="<?php echo $file_sptb;?>">
                        <input type="hidden" name="pernyataan_lama" value="<?php echo $file_pernyataan;?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tanggal Laporan Akhir</label>
                                <input type="date" name="tgl_laporan" class="form-control" required value="<?php echo $tgl_laporan;?>">
                            </div>
                            <div class="form-group">
                                <label>Judul | Ketua Penelitian</label>
                        <select name="usulan_id" class="form-control" required >
                            <option value="">Pilih</option>
                            <?php $no = 1; foreach ($data_ketua as $data) { $no++ ?>
                            <option value="<?php echo $data['id_usulan'];?>"><?php echo $data['judul'];?> | <?php echo $data['ketua'];?> </option>
                            <?php } ?>
                        </select>
                            </div>
                            <div class="form-group">
                                <label>Ringkasan Penelitian</label>
                                <input type="text" name="ringkasan_penelitian" class="form-control" value="<?php echo $ringkasan_penelitian;?>">
                            </div>
                            <div class="form-group">
                                <label>Upload Program</label><br>
                                <?php if ($file_program != null){
                                    echo "<label>".$file_program."</label>";
                                }else{
                                    echo "pdf tidak ada";
                                }?>
                                <input type="file" name="file_program">
                            </div>
                            <div class="form-group">
                                <label>Upload SPTB</label><br>
                                <?php if ($file_sptb != null){
                                    echo "<label>".$file_sptb."</label>";
                                }else{
                                    echo "pdf tidak ada";
                                }?>
                                <input type="file" name="file_sptb">
                            </div>
                            <div class="form-group">
                                <label>Link Luaran Jurnal</label>
                                <input type="text" name="link_luaranjurnal" class="form-control" value="<?php echo $link_luaranjurnal;?>">
                            </div>
                            <div class="form-group">
                                <label>File Pernyataan</label><br>
                                <?php if ($file_pernyataan != null){
                                    echo "<label>".$file_pernyataan."</label>";
                                }else{
                                    echo "pdf tidak ada";
                                }?>
                                <input type="file" name="file_pernyataan">
                            </div>
                            <div class="form-group">
                                <label>Tahun Penelitian</label>
                                <select name="tahun_penelitian1" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <?php foreach($years as $years){
                                        if(!in_array($years['code_years'],$years_post)){
                                            ?>
                                            <option value="<?php echo $years['code_years'] ?>"><?php echo $years['years_name'] ?></option>
                                        <?php } else { ?>
                                            <option selected="selected" value="<?php echo $years['code_years'] ?>"><?php echo $years['years_name'] ?></option>
                                        <?php } } ?>
                                </select>
                            </div>
                            <div class="form-group">
                        <label>Verifikasi</label>
                        <select name="verifikasi" class="form-control" required >
                            <option value="<?php echo $verifikasi;?>"><?php echo $verifikasi;?></option>
                            <option value="BERJALAN">BERJALAN</option>
                            <option value="SEMINAR">SEMINAR</option>
                            <option value="SELESAI">SELESAI</option>
                        </select>
                    </div>
                        </div>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger ">Reset</button>
                            <button type="button" class="btn btn-warning " data-dismiss="modal" onclick="history.back();">Batal
                            </button>
                            <input type="submit" class="btn btn-primary" value="Update" name="update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>