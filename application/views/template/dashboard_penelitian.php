<?php
$ses_id = $this->session->userdata('ses_id');
$ses_nama = $this->session->userdata('ses_nama');
$ses_email = $this->session->userdata('ses_email');
$ses_foto = $this->session->userdata('ses_foto');
$ses_level = $this->session->userdata('ses_level');
?>
<div class="page-header">
    <h2>Dashboard Penelitian</h2>
</div>

<div class="col-md-12">
    <div class="col-md-12">
        <div class="col-lg-4 col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <div class="huge"> <?php echo $total_years; ?><sup>Tahun</sup></div>
                            <div>Total Tahun Penelitian</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo site_url('years')?>">
                    <div class="panel-footer">
                        <span class="pull-left">More Info...</span><br>
                    <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-8">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                        <div class="huge"><?php echo $total_penelitian; ?><sup>Penelitian</sup></div>
                            <div> Total Penelitian</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">More Info...</span><br>
                    <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-8">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                        <div class="huge"><?php echo $total_aktif; ?><sup>Penelitian</sup></div>
                            <div> Total Penelitian Aktif</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">More Info...</span><br>
                    <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>          
    </div>
</div>



    
<hr>
<h2>Statistik Penelitian</h2>
<hr>
<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>


<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.paddingRight = 20;

// Add data
chart.data = [
<?php
//$kunjungan = $this->dasbor_model->kunjungan();
$hitung_penelitian = $this->model->hitung_Penelitian();
foreach($hitung_penelitian as $hitung) {
?>
{
  "year": "<?php echo $hitung->years_name; ?>",
  "value": <?php echo $hitung->total; ?>
},
<?php } ?>
];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.renderer.minGridDistance = 50;
categoryAxis.renderer.grid.template.location = 0.5;
categoryAxis.startLocation = 0.5;
categoryAxis.endLocation = 0.5;

// Pre zoom
chart.events.on("datavalidated", function () {
  categoryAxis.zoomToIndexes(Math.round(chart.data.length * 0.4), Math.round(chart.data.length * 0.55));
});

// Create value axis
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.baseValue = 0;

// Create series
var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "value";
series.dataFields.categoryX = "year";
series.strokeWidth = 2;
series.tensionX = 0.77;

var range = valueAxis.createSeriesRange(series);
range.value = 0;
range.endValue = 1000;
range.contents.stroke = am4core.color("#FF0000");
range.contents.fill = range.contents.stroke;

// Add scrollbar
var scrollbarX = new am4charts.XYChartScrollbar();
scrollbarX.series.push(series);
chart.scrollbarX = scrollbarX;

chart.cursor = new am4charts.XYCursor();

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>


 

<!-- /.row -->


