<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laporan Pajak</title>
  </head>
  <body>
    <div class="container" style="margin-top: 20px">
        <table>
            <tr>
                <td width="100px" align="right" rowspan="2">
                    <img src="{{ asset('baru') }}/images/batanghari.png" alt="" width="50px">
                </td>
                <td width="300px" align="center">
                    <h3>Struck Pembayaran</h3>
                </td>
            </tr>
        </table>
        <hr color="black">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        Nama Dan Alamat Wajib Pajak
                    </td>
                </tr>
                <tr>
                    <td>
                        Nama :{{ $pajak->user->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat : {{ \App\Models\userdetail::where('user_id',$pajak->userid)->first()->alamat ?? '' }}
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>
                        Object Pajak
                    </td>
                    <td>
                        Luas (m2)
                    </td>
                    <td>
                        NJOP (Nilai Jual Object Pajak)
                    </td>
                    <td>
                        Total NJOP
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $item)
                    <tr>
                        <td>
                            {{ $item->jenis }}
                        </td>
                        <td>
                            {{ $item->luas }}
                        </td>
                        <td>
                            {{ $item->nilai }}
                        </td>
                        <td>
                            {{ $item->njop }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table>
            <tr>
                <td width="600px">
                    TOTAL NJOP
                </td>
                <td>
                    {{ $pajak->totalnjop }}
                </td>
            </tr>
            <tr>
                <td width="600px">
                    NJOP TKP
                </td>
                <td>
                    {{ $pajak->tkp }}
                </td>
            </tr>
            <tr>
                <td width="600px">
                    NJOP PBB
                </td>
                <td>
                    {{ $pajak->pbb }}
                </td>
            </tr>
            <tr>
                <td>
                    NJKP
                </td>
                <td>
                    {{ $pajak->njkp }}
                </td>
            </tr>
            <tr>
                <td>
                    TOTAL PBB YANG HARUS DIBAYARKAN
                </td>
                <td>
                    {{ $pajak->amount }}
                </td>
            </tr>
        </table>
        <table style="margin-top: 250px;">
            <tr>
                <td width="500px">

                </td>
                <td>
                    Mengetahui
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    Kepala Desa
                </td>
            </tr>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            window.print();
        });
    </script>
    </body>
</html>