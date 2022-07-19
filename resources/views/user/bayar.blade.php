@extends('layout.main')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h6>Form Bayar Pajak</h6>
            </div>
            <div class="card-body">
                <form action="#" id="pajak_form" method="POST">
                    <input type="text" name="userid" hidden value="{{ \Auth::user()->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Nama Wajib Pajak
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ \Auth::user()->name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                NOP
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="nop" id="NOP" value="{{ \Auth::user()->NOP }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Tanggal Jatuh Tempo
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="tanggal" value="{{ \Carbon\carbon::parse(\App\Models\pajak::where('NOP',\Auth::user()->NOP)->first()->tanggal)->translatedFormat('d-M-Y') }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Jenis Pajak</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="jenis[]" value="Pajak Bumi" class="form-control" readonly id="jenis">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="luas1">Luas</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="luas[]" class="form-control" readonly value="{{ $pajak->luas_bumi }}" id="luas1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="nilai">Nilai Jual</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="nilai[]" id="nilai" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="njop">Total NJOP</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="njop[]" id="njop" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Jenis Pajak</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="jenis[]" value="Pajak Bangunan" class="form-control" readonly id="jenis">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="luas2">Luas</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="luas[]" class="form-control" readonly value="{{ $pajak->luas_bangunan }}" id="luas2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="nilai1">Nilai Jual</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="nilai[]" id="nilai1" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="njop1">Total NJOP</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="njop[]" id="njop1" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="totalnjop">Total NJOP <br> (Nilai Jual Objek Pajak)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="totalnjop" id="totalnjop" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pbb">NJOP TKP <br> (Nilai Jual Object Pajak Tidak Kena Pajak)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="tkp" id="tkp" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pbb">NJOP PBB <br> (Nilai Jual Objek PBB)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="pbb" id="pbb" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="njkp">NJKP <br> (Nilai Jual Kena Pajak)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="njkp" id="njkp" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="bayarpajak">Total Dibayar</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="bayarpajak" id="bayarpajak" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <button type="submit" class="btn bg-gradient-danger btn-primary mr-3"><i class="fa-brands fa-paypal"></i> Bayar</button>
                            <a data-link="data:image/{{ $pajak->type }};base64,{{ $pajak->gambar }}" id="download" class="btn btn-primary"><i class="fa-solid fa-download"></i> Download</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="loading" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
              <div class="text-center">
                  <img src="{{ asset('baru') }}/load.gif" class="" alt="">
                  <h6>Tunggu Sebentar Ya</h6>
              </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENTKEY') }}">
</script>
<script>
    $(document).ready(function(){
        $('#download').click(function(){
            var link = $(this).data('link');
            var a = document.createElement('a');
            a.href = link;
            a.download = 'Pajak'.{{ $pajak->type }};
            a.click();
        });
    });
    $('#pajak_form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{ url('/api/donasi') }}",
            type: "POST",
            data: $('#pajak_form').serialize(),
            success: function(data,status){
                console.log(data);
                window.snap.pay(data.snap_token, {
                    // Optional
                    onSuccess: function(result) {
                        console.log(JSON.stringify(result, null, 2));
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })
                            Toast.fire({
                            icon: 'success',
                            title: 'Pembayaran Berhasil Dilakukan, Status Pembayaran : Success'
                            });
                            location.replace('/bayar/pajak');
                    },
                    // Optional
                    onPending: function(result) {
                        console.log(JSON.stringify(result, null, 2));
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })

                            Toast.fire({
                            icon: 'success',
                            title: 'Pembayaran Di Berhasil Dilakukan, Status Pembayaran : Pending'
                            });
                            location.replace('/bayar/pajak');
                    },
                    // Optional
                    onError: function(result) {
                        console.log(JSON.stringify(result, null, 2));
                        location.replace('/bayar/pajak');
                    }
                });
                return false;
            }
        });
    })
    if ($('#luas2').val() != '')  {
        $('#nilai1').val('505000');
        var luas = $('#luas2').val();
        var nilai = $('#nilai1').val();
        var total = luas * nilai;
        $('#njop1').val(total);
    }
    if ($('#luas1').val() != '') {
        $('#nilai').val('3500');
        var luas = $('#luas1').val();
        var nilai = $('#nilai').val();
        var total = luas * nilai;
        $('#njop').val(total);
    }

    if ($('#luas').val() !='' && $('#luas1').val() !='') {
        var luas = $('#njop').val();
        var luas1 = $('#njop1').val();
        var total1 = parseInt(luas) + parseInt(luas1) 
        $('#totalnjop').val(total1);

        if ($('#totalnjop').val() >= 1000000000) {
            $('#tkp').val('12000000');
        }else{
            $('#tkp').val('10000000');
        }

        var totalnjop = $('#totalnjop').val();
        var tkp = $('#tkp').val();
        var total2 = parseInt(totalnjop) - parseInt(tkp);
        $('#pbb').val(total2);

        var pbb = $('#pbb').val();
        var total3 = parseInt(pbb) * 0.001;
        $('#njkp').val(total3);

        $('#bayarpajak').val(total3);
    }
</script>

@endsection