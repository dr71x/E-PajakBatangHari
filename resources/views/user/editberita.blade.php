@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-body">
            <form action="{{ route('editberitasimpan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $berita->id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-md-6">
                                <input type="text" name="judul" class="form-control input-default" value="{{ $berita->judul }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Isi</label>
                            <div class="col-md-6">
                                <textarea name="isi" class="form-control input-default" cols="30" rows="10">{{ $berita->isi }}</textarea>
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
                                <img src="data:image/{{ $berita->type }};base64,{{ $berita->gambar }}" width="300px" alt="">
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
                    <a href="{{ route('berita') }}" class="btn btn-danger light btn-sm">Close</a>
                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                </div>
            </form> 
        </div>
    </div>
</div>
@endsection