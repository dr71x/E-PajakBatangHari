@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-body">
            <form action="{{ route('editpengumumansimpan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $pengumuman->id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-md-6">
                                <input type="text" name="judul" class="form-control input-default" value="{{ $pengumuman->judul }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Isi</label>
                            <div class="col-md-6">
                                <textarea name="isi" class="form-control input-default" cols="30" rows="10">{{ $pengumuman->isi }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>
                                    gambar :
                                </h5>
                            </div>
                            <div class="col-md-8">
                                <img src="data:image/{{ $pengumuman->type }};base64,{{ $pengumuman->gambar }}" width="100px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Gambar</label>
                            <div class="col-md-6">
                                <input type="file" name="gambar" class="form-control input-default">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('pengumuman') }}" class="btn btn-danger light btn-sm">Close</a>
                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                </div>
            </form> 
        </div>
    </div>
</div>
@endsection