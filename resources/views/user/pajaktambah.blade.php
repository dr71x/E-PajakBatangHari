@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Tambah Data Pajak</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('pajaksimpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NOP</label>
                                <input type="text" name="NOP" class="form-control" placeholder="NOP">
                            </div>
                            <div class="form-group">
                                <label for="">Luas Bumi</label>
                                <input type="text" name="luas_bumi" id="luas_bumi" class="form-control" placeholder="Luas Bumi">
                            </div>
                            <div class="form-group">
                                <label for="">Letak Objeck Pajak</label>
                                <input type="text" name="letak" class="form-control" placeholder="Letak Objek Pajak">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Jatuh Tempo</label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Luas Bangunan</label>
                                <input type="text" name="luas_bangunan" id="luas_bangunan" class="form-control" placeholder="Luas Bangunan">
                            </div>
                            <div class="form-group">
                                <label for="">Tunggakan</label>
                                <input type="text" name="tunggakan" id="tunggakan" class="form-control" placeholder="Tunggakan">
                            </div>
                            <div class="form-group">
                                <label for="">Gambar :</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success btn-sm">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#luas_bangunan').keyup(function() {
           var bumi = 3500;
           var bangunan = 505000;

           var totalBumi = bumi * $('#luas_bumi').val();
           var totalBangunan = bangunan * $('#luas_bangunan').val();
           var totalNjop = totalBumi + totalBangunan;

           if (totalNjop >= 1000000000) {
                var tkp =  12000000;
           }else{
             var tkp = 10000000;
           }

           var pbb = totalNjop - tkp;

           var tunggakan = 0.01 * 0.2 * pbb;

           $('#tunggakan').val(tunggakan);

        });
    });
</script>
@endsection