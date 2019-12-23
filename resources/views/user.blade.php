@extends('layouts/app')

@section('title_page')
    User - 
@endsection

@section('title')
    User
@endsection

@section('breadcrumb')
@parent
    <li>User</li>
@endsection

@section('content') 

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">User </h3>
            </div>
            <div class="box-body">
                <form method="post" id="form-produk">
                    {{ csrf_field() }}
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="20"><input type="checkbox" value="1" id="select-all"></th>
                        <th width="20">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th width="100">Aksi</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                </form>
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