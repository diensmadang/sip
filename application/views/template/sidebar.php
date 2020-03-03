<?php
$ses_id = $this->session->userdata('ses_id');
$ses_nama = $this->session->userdata('ses_nama');
$ses_email = $this->session->userdata('ses_email');
$ses_foto = $this->session->userdata('ses_foto');
$ses_level = $this->session->userdata('ses_level');
?>
<nav class="navbar navbar-default navbir" role="navigation" style="margin-bottom: 0px;border-radius: 0;background: #737373;border: 0">
    <div class="navbar-header">
        <a class="navbar-brand " href="index.html" style="color: white">Selamat Datang :  <?php echo $ses_nama ?> (<?php echo $ses_level ?>)</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
</nav>
<div class="nav" style="margin-bottom: 10px">
    <?php if ($ses_level != 'Pengunjung'){?>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
              <!--  <li>
                    <a href="<?php echo site_url('dashboard_penelitian')?>"><i class="fa fa-briefcase fa-fw"></i> Modul Penelitian<span class="fa arrow"></span></a>
                </li>-->
                <li>
                    <a href="<?php echo site_url('dtlp');?>"><i class="fa fa-briefcase fa-fw"></i> Data Laporan Penelitian<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('dashboard_penelitian')?>">Dashboard Penelitian</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('skema')?>">Skema Penelitian</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('usulan_penelitian')?>">Usulan Penelitian</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('laporan_akhir')?>">Olah Data Laporan Akhir</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('riwayat_penelitian')?>">Riwayat Penelitian & Usulan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('dtlp');?>"><i class="fa fa-briefcase fa-fw"></i> Data Laporan Pengabdian<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Unggulan</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Reguler</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Mandiri</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('dtlp');?>"><i class="fa fa-briefcase fa-fw"></i> Data Laporan Publikasi<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Jurnal</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Prosiding</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Buku</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('dtlp');?>"><i class="fa fa-briefcase fa-fw"></i> Data Laporan HKI<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">HKI</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Paten</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Paten Sederhana</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('years')?>"><i class="fa fa-calendar fa-fw"></i> Data Tahun Penelitian</a>
                </li>
                <li>
                    <a href="<?php echo site_url('pendanaan')?>"><i class="fa fa-suitcase fa-fw"></i> Data Pendanaan</a>
                </li>
                <li>
                    <a href="<?php echo site_url('user');?>"><i class="fa fa-user-md fa-fw"></i> Data User</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Account<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('user/detail_data/'.$this->session->userdata('ses_id'))?>">Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('user/ganti_password/'.$this->session->userdata('ses_id'))?>">Ganti Password</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('login/sign_out');?>" onclick="return confirm('Apakah anda ingin keluar dari program')">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
                        <?php } ?>
    <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Super Admin' ){?>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo site_url('dtlpunggulan');?>"><i class="fa fa-briefcase fa-fw"></i> Data Laporan Penelitian<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('dtlpunggulan')?>">Penelitian Unggulan</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Reguler</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Mandiri</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('dtlp');?>"><i class="fa fa-briefcase fa-fw"></i> Data Laporan Pengabdian<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Unggulan</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Reguler</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Mandiri</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('dtlp');?>"><i class="fa fa-briefcase fa-fw"></i> Data Laporan Publikasi<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Jurnal</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Prosiding</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Buku</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('dtlp');?>"><i class="fa fa-briefcase fa-fw"></i> Data Laporan HKI<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">HKI</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Paten</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('#'.$this->session->userdata('ses_id'))?>">Paten Sederhana</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Account<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('user/detail_data/'.$this->session->userdata('ses_id'))?>">Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('user/ganti_password/'.$this->session->userdata('ses_id'))?>">Ganti Password</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('login/sign_out');?>" onclick="return confirm('Apakah anda ingin keluar dari program')">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
                        <?php } ?>
                    </div>

    </div>
