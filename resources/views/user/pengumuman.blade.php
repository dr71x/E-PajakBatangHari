@extends('layout.main')
@section('content')
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Pengumuman</h6>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah</button>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">isi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengumuman as $item)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td width="200px">
                                                {{ $item->judul }}
                                            </td>
                                            <td width="350px">
                                                {{ substr($item->isi, 0, 100) }}
                                            </td>
                                            <td>
                                                <img src="data:images/{{ $item->type }};base64,{{ $item->gambar }}" width="50px" alt="">
                                            </td>
                                            <td>
                                                <div class="button-group">
                                                    <button id="hapus" class="btn btn-danger btn-sm hapus" data-id="{{ $item->id }}" style="font-size: 14px"> Hapus </button>
                                                <a href="{{ route('editpengumuman',$item->id) }}" class="btn btn-info btn-sm" style="font-size: 14px">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="{{ url('/pengumuman/simpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-md-6">
                                    <input type="text" name="judul" class="form-control input-default" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Isi</label>
                                <div class="col-md-6">
                                    <textarea name="isi" class="form-control input-default" cols="30" rows="10" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-md-6">
                                    <input type="file" name="gambar" class="form-control input-default" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div>
                </form>     
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(".hapus").click(function(){
            var id = $(this).attr("data-id");
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
                    window.location = "{{ url('/pengumuman/hapus') }}/"+id;
                }
            })
        })
    </script>
@endsection