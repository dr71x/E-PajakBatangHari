@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-body" style="box-shadow: 0 10px 15px rgba(0,0,0,0.6)">
            <h5>Total Transaksi success</h5>
            <h2 align="right">
                {{ $success }}
            </h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-body" style="box-shadow: 0 10px 15px rgba(0,0,0,0.6)">
            <h5>Total Pembayaran Pajak</h5>
            <h2 align="right">
                {{ $total_semua }}
            </h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-body" style="box-shadow: 0 10px 15px rgba(0,0,0,0.6)">
            <h5>Total Pembayaran Pending</h5>
            <h2 align="right">
                {{ $pending }}
            </h2>
        </div>
    </div>
    <div class="col-md-12" style="box-shadow: 0 10px 15px rgba(0,0,0,0.6)">
        <div class="card card-body">
            <div id="chart"></div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chart', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Grafik Pembayaran Pajak'
    },
    xAxis: {
        categories: {!! json_encode($bulan) !!},
    },
    yAxis: {
        title: {
            text: 'Total'
        },
        labels: {
            formatter: function () {
                return  'Rp. ' + this.value;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Bulan',
        marker: {
            symbol: 'square'
        },
        data: {!! json_encode($total) !!},
    }]
});
</script>
@endsection