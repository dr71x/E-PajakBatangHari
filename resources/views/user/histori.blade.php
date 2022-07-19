@extends('layout.main')
@section('content')
<div class="row">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="ambildata"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data History</h4>
            </div>
            <div class="card-body">
                <div>
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