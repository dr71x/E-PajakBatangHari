@extends('home.home')
@section('content')
<div class="home-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="main-banner-content">
                            <h1>E-Pajak BatangHari</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="banner-image">
                            <img src="{{ asset('home') }}/assets/img/home-font.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="creative-shape">
        <img src="{{ asset('home') }}/assets/img/home-bottom-shape.png" alt="svg shape">
    </div>
</div>
@endsection