@extends('home.home')
@section('content')
<div class="home-area">
    <section class="services-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h6 style="font-size: 33px">Register Page</h6>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="card card-body rounded" style="padding: 80px">
                        <form action="{{ url('/register/simpan') }}" method="POST">
                            @csrf
                            <h6>
                                *Silahkan lakukan Register
                            </h6>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6>
                                            NOP
                                        </h6>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="NOP" class="form-control" placeholder="NOP" required value="{{ old('NOP') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6>
                                            Nama
                                        </h6>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" placeholder="ketikkan nama anda" value="{{ old('name') }}">
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6>
                                            Alamat
                                        </h6>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="alamat" class="form-control" placeholder="ketikkan alamat anda" value="{{ old('alamat') }}">
                                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6>
                                            Nomor HP
                                        </h6>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="nohp" class="form-control" placeholder="ketikkan nomor hp anda" value="{{ old('nohp') }}">
                                        <span class="text-danger">{{ $errors->first('nohp') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6>
                                            E-mail
                                        </h6>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control" placeholder="ketikkan email anda" value="{{ old('email') }}">
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6>
                                            Password
                                        </h6>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" name="password" class="form-control" placeholder="Ketikkan Password anda">
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6>
                                            Konfirmasi Password
                                        </h6>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="ketikkan kembali password anda">
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block rounded">Daftar</button>
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
            title: 'Maaf Register Gagal!!',
            text: '{{ session('gagal') }}',
            })
    @endif
</script>
@endsection
