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
                            <th width="20%">Id Skema</th>
                            <th width="3%">:</th>
                            <th><?php if ($id_skema != null){echo $id_skema;}else {echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Skema</th>
                            <th>:</th>
                            <th><?php if ($skema != null ){ echo $skema; } else {echo '-';}?></th>
                        </tr>
                        <tr>
                            <th>Luaran</th>
                            <th>:</th>
                            <th><?php if ($luaran != null ){ echo $luaran; } else {echo '-';}?></th>
                        </tr>
                    </table>
                    <button class="btn btn-warning" onclick="history.back()"> KEMBALI</button>
                </div>
            </div>
        </div>
    </div>
</div>
