<?php
$ses_id = $this->session->userdata('ses_id');
$ses_nama = $this->session->userdata('ses_nama');
$ses_email = $this->session->userdata('ses_email');
$ses_foto = $this->session->userdata('ses_foto');
$ses_level = $this->session->userdata('ses_level');
?>
<div id="data-tambah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data Usulan Penelitian</h4>
            </div>
            <form action="<?php echo site_url('usulan_penelitian/simpan_data')?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal Usulan</label>
                        <input type="date" name="tgl_usulan"  class="form-control" required>
                     <!--   <div class="form-group">
                            <div class='input-group date' id='datepicker'>
                                <input type='text' name="tgl_usulan" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>-->
                    </div>
                    <div class="form-group">
                        <label>Skema</label>
                        <select name="skema_id" class="form-control" required >
                            <option value="">Pilih</option>
                            <?php $no = 1; foreach ($data_skema as $data) { $no++ ?>
                            <option value="<?php echo $data['id_skema'];?>"><?php echo $data['skema'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Judul Penelitian</label>
                        <input type="text" name="judul"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Bidang Kajian</label>
                        <input type="text" name="bidang_kajian"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pendanaan</label>
                        <select name="dana_penelitian" class="form-control">
                            <option value="">Pilih</option>
                            <?php $no = 1; foreach ($data_pendanaan as $data) { $no++ ?>
                            <option value="<?php echo $data['code_pendanaan'];?>"><?php echo $data['pendanaan_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ketua</label>
                        <select name="ketua" class="form-control">
                            <option value="">Pilih</option>
                            <?php $no = 1; foreach ($data_anggota as $data) { $no++ ?>
                            <option value="<?php echo $data['dosen'];?>"><?php echo $data['nidn'];?> | <?php echo $data['dosen'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Anggota 2</label>
                        <select name="anggota2" class="form-control">
                            <option value="">Pilih</option>
                            <?php $no = 1; foreach ($data_anggota as $data) { $no++ ?>
                            <option value="<?php echo $data['dosen'];?>"><?php echo $data['nidn'];?> | <?php echo $data['dosen'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                         <label>Anggota 3</label>
                        <select name="anggota3" class="form-control">
                            <option value="">Pilih</option>
                            <?php $no = 1; foreach ($data_anggota as $data) { $no++ ?>
                            <option value="<?php echo $data['dosen'];?>"><?php echo $data['nidn'];?> | <?php echo $data['dosen'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tenaga Ahli</label>
                        <input type="text" name="tenaga_ahli"  class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Tahun Penelitian</label>
                        <select name="tahun_penelitian" class="form-control" required >
                            <option value="">Pilih</option>
                            <?php $no = 1; foreach ($data_years as $data) { $no++ ?>
                            <option value="<?php echo $data['code_years'];?>"><?php echo $data['years_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File Proposal</label>
                        <input type="file" name="file_proposal">
                    </div>
                    <div class="form-group">
                        <label>File Surat Rencana Belanja</label>
                        <input type="file" name="file_suratrencanabelanja">
                    </div>
                    <div class="form-group">
                        <label>File Surat Pernyataan</label>
                        <input type="file" name="file_pernyataan">
                    </div>
                    <div class="form-group">
                        <label>Verifikasi</label>
                        <select name="verifikasi" class="form-control" required >
                            <option value="PENDING">PENDING</option>
                            <option value="DITERIMA">DITERIMA</option>
                            <option value="DITOLAK">DITOLAK</option>
                        </select>
                    </div>
                   <!-- <div class="form-group">
                        <label>File Pdf</label>
                        <input type="file" name="pdf">
                    </div>-->
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'DD MMMM YYYY HH:mm'
        });

        $('#datepicker').datetimepicker({
            format: 'DD MMMM YYYY'
        });

        $('#timepicker').datetimepicker({
            format: 'HH:mm'
        });
    });
</script>