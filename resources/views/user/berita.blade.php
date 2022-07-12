@extends('layout.main')
@section('content')
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Berita</h6>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" id="tambah" data-target=".bd-example-modal-lg">Tambah</button>
                        <button id="batal" class="btn btn-primary mb-2" style="display: none;">Batal</button>
                        <div id="cavas" style="display: none;"></div>
                        <div class="table-responsive" id="tabel">
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
                                    @foreach ($berita as $item)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td  width="200px">
                                                {{ $item->judul }}
                                            </td>
                                            <td width="350px">
                                                {{ substr($item->isi, 0, 100) }}
                                            </td>
                                            <td>
                                                <img src="data:image/{{ $item->type }};base64,{{ $item->gambar }}" alt="" width="50px">
                                            </td>
                                            <td>
                                                <button id="hapus" class="btn btn-danger btn-sm hapus" data-id="{{ $item->id }}" style="font-size: 14px"> Hapus </button>
                                                <a href="{{ route('editberita',$item->id) }}" class="btn btn-info btn-sm" style="font-size: 14px">Edit</a>
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
                    <h5 class="modal-title">Tambah Berita</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="{{ url('/berita/simpan') }}" method="POST" enctype="multipart/form-data">
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
        $(document).ready(function(){
            $('.edit').click(function(){
                var id = $(this).data('id');
                $('#tabel').slideUp('fast');
                $('#tambah').hide();
                $('#batal').show();
                $('#cavas').slideDown('fast');
                $.ajax({
                    url: "{{ url('/edit/berita') }}/"+id,
                    type: 'GET',
                    success: function(data){
                        $('#canvas').html(data);
                    }
                });
            });
            $("#batal").click(function(){
                $('#tabel').slideDown('fast');
                $('#tambah').show();
                $('#batal').hide();
                $('#cavas').slideUp('fast');
            });
        });

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
                    window.location = "{{ url('/berita/hapus') }}/"+id;
                }
            })
        })
    </script>
@endsection