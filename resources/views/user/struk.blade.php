<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Laporan Pajak</title>
    <style>
      body{
        background-image: url('data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/baru/images/batanghari.png'))) }}');
        background-position: center;
        background-repeat: no-repeat;
        background-size: 100% auto;
        opacity: 0.2;
      }
      .isi{
        font-size: 12px;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
      <table style="width: 100%;">
        <tr>
          <td align="center">
            <h5>Struk Pembayaran Pajak</h5>
          </td>
        </tr>
        <tr>
          <td align="center">{{ date('D-M-Y H:i:s') }}</td>
        </tr>
      </table>
      <table style="margin-top:120px;">
        <tr>
          <td width="150px" class="isi">
            NAMA WP :
          </td>
          <td class="isi">
            {{ $data->user->name }}
          </td>
        </tr>
        <tr>
          <td width="150px" class="isi">
            Letak Object Pajak :
          </td>
          <td class="isi">
            {{ $data->pajak->letak }}
          </td>
        </tr>
        <tr>
          <td class="isi">
            NOP :
          </td>
          <td class="isi"> 
            {{ $data->NOP }}
          </td>
        </tr>
        <tr>
          <td width="150px" class="isi">
            Diterima Tanggal :
          </td>
          <td class="isi">
            {{ date('d-m-Y') }}
          </td>
        </tr>
      </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>