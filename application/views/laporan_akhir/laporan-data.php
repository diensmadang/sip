<div class="page-header">
    <h2>Laporan Akhir</h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
            <div id="widget1" class="panel-body collapse in">
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
                <div class="nav" style="margin-bottom: 10px">
                    <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengembang'){?>
                        <button data-toggle="modal" data-target="#data-tambah" class="btn btn-info col-md-2">
                            <span class="glyphicon glyphicon-plus"></span>
                            <span>Tambah Data</span>
                        </button>
                    <?php } ?>
                </div>
                <table id="table" class="table penelitian table-bordered table-striped" width="100%">
                    <thead>
                    <tr>
                        <th width="4%">#</th>
                        <th width="10%">TANGGAL<br> LAPORAN AKHIR</th>
                        <th width="20%">JUDUL<br> PENELITIAN </th>
                        <th width="30%">KETUA<br> PENELITIAN </th>
                        <th width="20%">RINGKASAN <br>PENELITIAN</th>
                        <th width="20%">LINK LUARAN <br>JURNAL</th>
                        <th width="10%">VERIFIKASI</th>
                        <th width="10%" class="text-center">Opsi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>tgl_laporan</th>
                        <th>judul</th>
                        <th>ketua</th>
                        <th>ringkasan_penelitian</th>
                        <th>link_luaranjurnal</th>
                        <th>verifikasi</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $no = 0; foreach ($data_laporan as $data){ $no++
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $data['tgl_laporan'];?></td>
                            <td><?php echo $data['judul'];?></td>
                            <td><?php echo $data['ketua'];?></td>
                            <td><?php echo $data['ringkasan_penelitian'];?></td>
                            <td><?php echo $data['link_luaranjurnal'];?></td>
                             <?php if ($data['verifikasi']=='SEMINAR') { ?>
                                <td class="text-center"><span class="btn btn-warning"><?php echo $data['verifikasi'];?></span></td>
                             <?php }elseif ($data['verifikasi']=='BERJALAN') { ?>
                              <td class="text-center"><span class="btn btn-danger"><?php echo $data['verifikasi'];?></span></td>
                             <?php }else{ ?>
                               <td class="text-center"><span class="btn btn-success"><?php echo $data['verifikasi'];?></span></td>
                              <?php } ?>
                                <td class="text-center">
                                    <?php if ($ses_level != 'Admin' and $ses_level != 'Super Admin'){?>
                                    <a href="<?php echo base_url('assets/pdf/'.$data['years_name'].'/'.$data['file_program'])?>" data-toggle="tooltip" data-placement ="top" title="lihat pdf" target="_blank"><span class="fa fa-file-pdf-o" style="font-size: 14pt;"> </span></a>
                                    <?php } ?>
                                    <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
                                    <a href="<?php echo base_url()?>laporan_akhir/detail_data/<?php echo $data['id_laporan'];?>" data-toggle="tooltip" data-placement ="top" title="detail"><span class="glyphicon glyphicon-check" style="font-size: 14pt"></span></a>
                                    <a href="<?php echo base_url()?>laporan_akhir/edit_data/<?php echo $data['id_laporan'];?>" data-toggle="tooltip" data-placement ="top" title="edit"><span class="fa fa-edit ukuran" style="font-size: 14pt"></span></a>
                                    <a href="<?php echo base_url()?>laporan_akhir/hapus_data/<?php echo $data['id_laporan'];?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="hapus"><span class="glyphicon glyphicon-trash" style="font-size: 12pt"></span></a>
                                    <?php } ?>
                                </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php if ($ses_level != 'Pengunjung'){?>
        <div class="col-sm-5 col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Filtur Laporan Akhir
                    <a href="#widget2" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                    </a>
                </div>
                <div id="widget2" class="panel-body collapse in">
                    <form action="cek.php" method="post" name="form_cek" id="form_cek">
                        <div class="form-group">
                            <label>Tanggal Laporan Akhir</label>
                            <input type="date" name="tgl_laporan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Penanggung Jawab</label>
                            <select name="ketua" class="form-control">
                                <option value="">Pilih</option>
                                <?php $no = 1; foreach ($data_ketua as $data) { $no++ ?>
                                    <option value="<?php echo $data['ketua'];?>"><?php echo $data['ketua'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pendanaan</label>
                            <select name="pendanaan_name" class="form-control">
                                <option value="">Pilih</option>
                                <?php $no = 1; foreach ($data_pendanaan as $data) { $no++ ?>
                                    <option value="<?php echo $data['code_pendanaan'];?>"><?php echo $data['pendanaan_name'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tahun Penelitian</label>
                            <select name="tahun_penelitian" class="form-control">
                                <option value="">Pilih</option>
                                <?php $no = 1; foreach ($data_years as $data) { $no++ ?>
                                    <option value="<?php echo $data['code_years'];?>"><?php echo $data['years_name'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="pull-right">
                            <a href="" onclick="document.form_cek.action = '<?php echo base_url('laporan_akhir/export_print');?>'" target="_blank"><button class="btn btn-success">
                                    <span class="fa fa-print"></span> Print
                                </button></a>
                            <a href="" onclick="document.form_cek.action = '<?php echo base_url('laporan_akhir/export_excel');?>'" target="_blank"><button class="btn btn-primary" >
                                    <span class="fa fa-file-excel-o"></span> Excel
                                </button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php $this->load->view('laporan_akhir/laporan-tambah');?>