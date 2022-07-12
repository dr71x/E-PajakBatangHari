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
                {{ $total }}
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
</div>
@endsection