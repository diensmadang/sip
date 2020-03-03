<?php
$ses_id = $this->session->userdata('ses_id');
$ses_nama = $this->session->userdata('ses_nama');
$ses_email = $this->session->userdata('ses_email');
$ses_foto = $this->session->userdata('ses_foto');
$ses_level = $this->session->userdata('ses_level');
?>
<div class="page-header">
    <h2>Dashboard</h2>
</div>
<div class="col-md-12">
    <div class="col-md-12">
        <div class="col-lg-6 col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <div class="huge">26</div>
                            <div> Penelitian</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo site_url('dtlp');?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details Penelitian Unggulan</span><br>
                    <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details Penelitian Reguler</span><br>
                    <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details Penelitian Mandiri</span>
                        <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-8">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <div class="huge">26</div>
                            <div> Pengabdian Kepada Masyarakat</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details Pengabmas Unggulan</span><br>
                    <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details Pengabmas Reguler</span><br>
                    <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details Pengabmas Mandiri</span>
                        <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-8">
            <div class="panel panel-orange">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <div class="huge">26</div>
                            <div> Publikasi Ilmiah</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Jurnal</span><br>
                    <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Prosiding</span><br>
                    <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Buku</span>
                        <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-8">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <div class="huge">26</div>
                            <div> HKI</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">HKI</span><br>
                    <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Paten</span><br>
                    <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Paten Sederhana</span>
                        <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-8">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-calendar fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <div class="huge"><?php echo $total_years;?></div>
                            <div> Tahun Penelitian</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-suitcase fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <div class="huge"><?php echo $total_pendanaan;?></div>
                            <div> Pendanaan</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-8">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-user-md fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <div class="huge">13</div>
                            <div> User</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>