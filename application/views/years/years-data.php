<?php
    $ses_level = $this->session->userdata('ses_level');
?>
<div class="page-header">
    <h2>Data Tahun Penelitian</h2>
</div>
<div class="row">
    <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
        <div class="col-sm-4 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add / Edit Data
                    <a href="#widget2" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                    </a>
                </div>
                <div id="widget2" class="panel-body collapse in">
                    <?php echo form_open('years/save_years'); ?>
                    <input type="hidden" name="years_name2" value="<?php echo $years_name;?>">
                    <input type="hidden" name="code_years" value="<?php echo $code_years;?>">
                    <input type="hidden" name="status" value="<?php echo $status;?>">
                    <div class="form-group">
                        <label>TAHUN PENELITIAN</label>
                        <input type="text" class="form-control" name="years_name" value="<?php echo $years_name;?>">
                    </div>
                    <div class="col-md-12">
                        <div class="navbar-right">
                            <input type="submit" name="save" class="btn btn-info" value="Save">
                            <?php if ($status == 'new') {?>
                                <input type="reset" value="Reset" class="btn btn-danger">
                            <?php } ?>
                            <?php if ($status == 'old'){?>
                                <input type="reset" name="cancel" class="btn btn-danger" value="Cancel" onclick="history.back();">
                            <?php }?>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
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
                <?php if ($ses_level != 'Pengunjung') { ?>
                <div class="nav" style="margin-bottom: 10px">
                    <div class="pull-right">
                        <a href="<?php echo site_url('years/export_print');?>" target="_blank">
                            <button class="btn btn-success">
                                <span class="fa fa-print"></span> Print
                            </button>
                        </a>
                        <a href="<?php echo site_url('years/export_pdf');?>">
                            <button class="btn btn-danger">
                                <span class="fa fa-file-pdf-o"></span> Pdf
                            </button>
                        </a>
                        <a href="<?php echo site_url('years/export_excel');?>">
                            <button class="btn btn-primary">
                                <span class="fa fa-file-excel-o"></span> Excel
                            </button>
                        </a>
                    </div>
                </div>
                <?php } ?>
                <table id="table" class="table table-bordered table-striped" width="100%">
                    <thead>
                    <tr>
                        <th width="7%">#</th>
                        <th class="text-center">TAHUN PENELITIAN</th>
                        <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
                        <th class="text-center">Opsi</th>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
                        <th></th>
                        <?php } ?>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $no = 0; foreach ($data_years as $data){ $no++
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td class="text-center"><?php echo $data['years_name']?></td>
                            <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
                            <td class="text-center">
                                <a href="<?php echo base_url()?>years/edit_years/<?php echo $data['code_years'];?>"><span class="fa fa-edit ukuran" style="font-size: 16pt"></span></a>
                                <a href="<?php echo site_url('years/delete_years/');?><?php echo $data['code_years'];?>"><span class="glyphicon glyphicon-trash" style="font-size: 13pt"></span></a>
                            </td>
                            <?php } ?>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>