<div class="container">
    <nav class="navbar navbar-expand-md navbar-light">
        {{-- <a class="navbar-brand"  href="{{ route('home') }}">
        </a> --}}
        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link"><img src="{{ asset('home') }}/assets/img/batanghari.png" width="20px" alt=""> E-PAJAK</a>
                </li>
                <li class="nav-item"> 
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tentangkami') }}" class="nav-link">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('baca') }}" class="nav-link">Berita</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengumumanhome') }}" class="nav-link">Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('aluresppt') }}" class="nav-link">Alur PBB</a>
                </li>
            </ul>
            <div class="other-option">
                <a class="default-btn" href="{{ route('login') }}">Login<span></span></a>
                <a class="default-btn" href="{{ route('register') }}">Register<span></span></a>
            </div>
        </div>
    </nav>
</div>