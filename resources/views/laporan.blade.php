@extends('layouts/app')

@section('title_page')
    Laporan - 
@endsection

@section('title')
    Laporan
@endsection

@section('breadcrumb')
@parent
    <li>Laporan</li>
@endsection

@section('content') 

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Laporan 06-11-2019 s/d 02-02-2020</h3>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="salesChart" style="height: 250px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
{{-- <script type="text/javascript">
(function () {
var salesChartCanvas = ("#salesChart").get(0).getContext("2d");
var salesChart = new Chart(salesChartCanvas);

var salesChartData = {
    labels: {{ json_encode($data_tanggal) }},
    datasets: [
    {
        label: "Electronics",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgb(210, 214, 222)",
        pointColor: "rgb(210, 214, 222)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgb(220,220,220)",
        data: {{ json_encode($data_pendapatan) }}
    }
    ]
};

var salesChartOptions = {
    pointDot: false,
    responsive: true
};

//Create the line chart
salesChart.Line(salesChartData, salesChartOptions);
});
</script> --}}
@endsection