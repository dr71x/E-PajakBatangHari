@extends('home.home')
@section('content')
<div class="home-area">
    <section class="services-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h6 style="font-size: 33px">Login Page</h6>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="card card-body rounded">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('baru') }}/images/batanghari.png" class="mb-4" width="60px" alt="">
                            </div>
                            <div class="col-md-6 mt-3">
                                <h4>E-Pajak BatangHari</h4>
                            </div>
                        </div>
                        <form action="{{ route('proseslogin') }}" method="POST" autocomplete="off">
                            @csrf
                            <h6 class="mb-4">Silahkan Lakukan Login</h6>
                            <div class="form-group mb-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="email">Masukkan Email</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control" placeholder="ketikkan email anda di sini">
                                    </div>
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="password">Masukkan Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" name="password" class="form-control" placeholder="Ketikkan Password Anda">
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary rounded btn-block mt-5">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if (session('gagal'))
                Swal.fire({
            icon: 'error',
            title: 'Maaf Login Gagal!!',
            text: 'Periksan lagi Email dan Password Anda',
            })
    @endif
    @if (session('success'))
                Swal.fire({
            icon: 'success',
            title: 'Berhasil!!',
            text: '{{ session('success') }}',
            })
    @endif
</script>
@endsection