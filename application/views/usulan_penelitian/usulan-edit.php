<div class="page-header">
    <h2>Usulan Penelitian</h2>
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
                    <form action="<?php echo site_url('usulan_penelitian/update_data')?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id_usulan" value="<?php echo $id_usulan;?>">
                        <input type="hidden" name="tahun_penelitian" value="<?php echo $tahun_penelitian;?>">
                        <input type="hidden" name="proposal_lama" value="<?php echo $file_proposal;?>">
                        <input type="hidden" name="suratrencanabelanja_lama" value="<?php echo $file_suratrencanabelanja;?>">
                        <input type="hidden" name="pernyataan_lama" value="<?php echo $file_pernyataan;?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tanggal Usulan</label>
                                <input type="date" name="tgl_usulan" class="form-control" required value="<?php echo $tgl_usulan;?>">
                            </div>
                            <div class="form-group">
                                <label>Skema</label>
                                <select name="skema_id" class="form-control" required>
                                    <option value="">Pilih</option>  
                                    <?php foreach($data_skema as $skema){
                                        if(!in_array($skema['id_skema'],$skema_post)){
                                            ?>
                                            <option value="<?php echo $skema['id_skema'] ?>"><?php echo $skema['skema'] ?></option>
                                        <?php } else { ?>
                                            <option selected="selected" value="<?php echo $skema['id_skema'] ?>"><?php echo $skema['skema'] ?></option>
                                        <?php } } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judul Penelitian</label>
                                <input type="text" name="judul" class="form-control" value="<?php echo $judul;?>">
                            </div>
                            <div class="form-group">
                                <label>Bidang Kajian</label>
                                <input type="text" name="bidang_kajian" class="form-control" value="<?php echo $bidang_kajian;?>">
                            </div>
                            <div class="form-group">
                                <label>Pendanaan</label>
                                <select name="dana_penelitian" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <?php foreach($pendanaan as $pendanaan){
                                        if(!in_array($pendanaan['code_pendanaan'],$pendanaan_post)){
                                            ?>
                                            <option value="<?php echo $pendanaan['code_pendanaan'] ?>"><?php echo $pendanaan['pendanaan_name'] ?></option>
                                        <?php } else { ?>
                                            <option selected="selected" value="<?php echo $pendanaan['code_pendanaan'] ?>"><?php echo $pendanaan['pendanaan_name'] ?></option>
                                        <?php } } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ketua</label>
                                <select name="ketua" class="form-control">
                                      <option value="<?php echo $ketua;?>"><?php echo $ketua;?></option>
                                  <?php $no = 1; foreach ($data_anggota as $data) { $no++ ?>
                                      <option value="<?php echo $data['dosen'];?>"><?php echo $data['nidn'];?> |          <?php echo $data['dosen'];?></option>
                                     <?php } ?>
                                </select>
                            </div>
                           <div class="form-group">
                                <label>Anggota 2</label>
                                <select name="anggota2" class="form-control">
                                      <option value="<?php echo $anggota2;?>"><?php echo $anggota2;?></option>
                                  <?php $no = 1; foreach ($data_anggota as $data) { $no++ ?>
                                      <option value="<?php echo $data['dosen'];?>"><?php echo $data['nidn'];?> |          <?php echo $data['dosen'];?></option>
                                     <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Anggota 3</label>
                               <select name="anggota3" class="form-control">
                                      <option value="<?php echo $anggota3;?>"><?php echo $anggota3;?></option>
                                  <?php $no = 1; foreach ($data_anggota as $data) { $no++ ?>
                                      <option value="<?php echo $data['dosen'];?>"><?php echo $data['nidn'];?> |          <?php echo $data['dosen'];?></option>
                                     <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tenaga Ahli</label>
                                <input type="text" name="tenaga_ahli" class="form-control" value="<?php echo $tenaga_ahli;?>">
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
                                <label>File Proposal</label><br>
                                <?php if ($file_proposal != null){
                                    echo "<label>".$file_proposal."</label>";
                                }else{
                                    echo "pdf tidak ada";
                                }?>
                                <input type="file" name="file_proposal">
                            </div>
                            <div class="form-group">
                                <label>File Surat Rencana Belanja</label><br>
                                <?php if ($file_suratrencanabelanja != null){
                                    echo "<label>".$file_suratrencanabelanja."</label>";
                                }else{
                                    echo "pdf tidak ada";
                                }?>
                                <input type="file" name="file_suratrencanabelanja">
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
                        <label>Verifikasi</label>
                        <select name="verifikasi" class="form-control" required >
                            <option value="<?php echo $verifikasi;?>"><?php echo $verifikasi;?></option>
                            <option value="PENDING">PENDING</option>
                            <option value="DITERIMA">DITERIMA</option>
                            <option value="DITOLAK">DITOLAK</option>
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