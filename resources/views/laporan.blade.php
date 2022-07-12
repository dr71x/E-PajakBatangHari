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
    <div class="container">
        <table>
            <tr>
                <td width="100px" align="right" rowspan="2">
                    <img src="{{ asset('baru') }}/images/batanghari.png" alt="" width="50px">
                </td>
                <td width="400px" align="center">
                    <h4>Laporan Keseluruhan Data Pajak Bumi dan Bangunan Desa Pasar Terusan <br> {{ date('Y') }} </h4>
                </td>
            </tr>
        </table>
        <hr color="black">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><span
                            class="text-muted">#</span>
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        <span class="text-muted">Transaction ID</span>
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        email</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Biaya</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($donasi as $item)
                <tr>
                    <td class="align-middle text-center">
                        {{ $loop->iteration }}
                    </td>
                    <td width="150px">
                        {{ $item->transaction_id }}
                    </td>
                    <td>
                        {{ $item->user->name }}
                    </td>
                    <td>
                        {{ $item->user->email }}
                    </td>
                    <td width="350px">
                        Rp. {{ $item->amount }}
                    </td>
                    <td class="align-middle text-center text-sm">
                            <span class="btn btn-outline-success">{{ $item->status }}</span>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="7" align="center">
                            Data Tidak Ada
                        </td>
                    </tr>
                @endforelse 
            </tbody>
        </table>
        <table style="margin-top: 250px">
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