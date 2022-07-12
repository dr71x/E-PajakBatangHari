<div class="row">
    <div class="col-md-12">
    <div class="card mb-3">
        <img class="card-img-top" src="data:image/{{ $berita->type }};base64,{{ $berita->gambar }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $berita->judul }}</h5>
            <p class="card-text">{!! $berita->isi !!}</p>
            <p class="card-text"><small class="text-muted">{{ $berita->created_at->diffForHumans() }}</small></p>
            <footer>
                <a href="{{ route('baca') }}" class="btn btn-success">Kembali</a>
            </footer>
        </div>
    </div>
    </div>
</div>