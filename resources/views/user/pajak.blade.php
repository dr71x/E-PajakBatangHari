@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('pajaktambah') }}" class="btn btn-primary btn-sm">Tambah</a>
                <h4 class="card-title">Data Pajak</h4>
            </div>
            <div class="card-body">
                <div>
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>NOP</th>
                                <th>Nama</th>
                                <th>Letak Objek Pajak</th>
                                <th>
                                    Tanggal Jatuh Tempo
                                </th>
                                <th>Luas Bumi</th>
                                <th>Luas Bangunan</th>
                                <th>Tunggakan</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pajak as $item)
                                <tr>
                                    <td width="200px">
                                        {{ $item->NOP }}
                                    </td>
                                    <td>
                                        {{ $item->nama->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->letak ?? '-' }}
                                    </td>
                                    <td>
                                        @if ($item->tanggal != NULL)
                                        {{ \Carbon\Carbon::parse($item->tanggal )->format('d-m-Y') }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->luas_bumi }}
                                    </td>
                                    <td>
                                        {{ $item->luas_bangunan }}
                                    </td>
                                    <td>
                                        {{ $item->tunggakan }}
                                    </td>
                                    <td><img src="data:image/{{ $item->type }};base64,{{ $item->gambar }}" width="60px" alt=""></td>
                                    <td><a href="{{ route('editpajak',['id' => $item->NOP]) }}" class="btn btn-info btn-sm">Edit</a></td>
                                    <td><a data-link="{{ route('hapuspajak',['id' => $item->NOP]) }}" class="hapus btn btn-danger btn-sm">Hapus</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NOP</th>
                                <th>Nama</th>
                                <th>Letak Objek Pajak</th>
                                <th>
                                    Tanggal Jatuh Tempo
                                </th>
                                <th>Luas Bumi</th>
                                <th>Luas Bangunan</th>
                                <th>Tunggakan</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('.hapus').click(function(){
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = $(this).attr('data-link');
            }
            })
    })
</script>
@endsection