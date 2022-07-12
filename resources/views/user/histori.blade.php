@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data History</h4>
            </div>
            <div class="card-body">
                <div >
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                            <th>Transaktion ID</th>
                                <th>NOP</th>
                                <th>Letak Objek Pajak</th>
                                <th>Total Pembayaran</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data">

                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Transaktion ID</th>
                                <th>NOP</th>
                                <th>Letak Objek Pajak</th>
                                <th>Total Pembayaran</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        getTable();
        tableintervalreload();
    });

    function tableintervalreload(){
        setTimeout(function(){
            getTable();
            tableintervalreload();
        }, 2000);
    }

    function getTable(){
        $.ajax({
            url: '{{ route('historitable') }}',
            type: 'GET',
            success: function(data){
                $('#data').html(data);
            }
        })
    }
</script>
@endsection