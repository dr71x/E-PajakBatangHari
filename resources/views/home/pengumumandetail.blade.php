<div class="row">
    <div class="col-md-12">
    <div class="card mb-3">
        <img class="card-img-top" src="data:image/{{ $pengumuman->type }};base64,{{ $pengumuman->gambar }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $pengumuman->judul }}</h5>
            <p class="card-text">{!! $pengumuman->isi !!}</p>
            <p class="card-text"><small class="text-muted">{{ $pengumuman->created_at->diffForHumans() }}</small></p>
            <footer>
                <a href="{{ route('pengumumanhome') }}" class="btn btn-success">Kembali</a>
            </footer>
        </div>
    </div>
    </div>
</div>