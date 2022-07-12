@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Nomor Pajak</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('updatepajak') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NOP</label>
                                <input type="text" name="NOP" class="form-control" placeholder="NOP" value="{{ $pajak->NOP }}">
                            </div>
                            <div class="form-group">
                                <label for="">Luas Bumi</label>
                                <input type="text" name="luas_bumi" class="form-control" placeholder="Luas Bumi" value="{{ $pajak->luas_bumi }}">
                            </div>
                            <div class="form-group">
                                <label for="">Letak Objeck Pajak</label>
                                <input type="text" name="letak" class="form-control" placeholder="Letak Objek Pajak" value="{{ $pajak->letak }}">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Jatuh Tempo</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ $pajak->tanggal }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Luas Bangunan</label>
                                <input type="text" name="luas_bangunan" class="form-control" placeholder="Luas Bangunan" value="{{ $pajak->luas_bangunan }}">
                            </div>
                            <div class="form-group">
                                <label for="">Tunggakan</label>
                                <input type="text" name="tunggakan" class="form-control" placeholder="Tunggakan" value="{{ $pajak->tunggakan }}">
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