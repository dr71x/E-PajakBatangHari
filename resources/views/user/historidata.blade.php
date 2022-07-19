    @foreach ($histori as $item)
        <tr>
            <td>
                {{ $item->transaction_id }}
            </td>
            <td>
                {{ $item->user->NOP }}
            </td>
            <td>
                {{ $item->detail->letak ?? '' }}
            </td>
            <td>
                {{ $item->amount }}
            </td>
            <td>
                @if ($item->status == 'pending')
                    <span class="badge badge-warning">{{ $item->status }}</span>
                @elseif ($item->status == 'success')
                <span class="badge badge-success rounded">{{ $item->status }}</span>
                @else
                <span class="badge badge-danger rounded">{{ $item->status }}</span>
                @endif
            </td>
            <td>
                {{ \Carbon\carbon::parse($item->updated_at)->translatedFormat('d M Y') }}
            </td>
            <td>
            <button type="button" data-id="{{ $item->transaction_id }}" class="ambil btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                Detail
            </button>
            @if (\Auth::user()->level == 'kades' || \Auth::user()->level == 'admin')
                @if ($item->status == 'success')
                <a href="{{ route('cetakUser',['id' => $item->transaction_id]) }}" class="btn btn-success btn-sm">Struck</a>
                @endif
            @endif
            @if (\Auth::user()->level == 'user')
                @if ($item->status == 'success')
                    <a href="{{ route('struct',['id' => $item->transaction_id]) }}" class="btn btn-success btn-sm">Struck</a>
                @endif
            @endif
            </td>
        </tr>
    @endforeach
    <script>
        $('.ambil').click(function(){
            var id = $(this).attr("data-id");
            $.ajax({
                url: "{{ url('/ambil/data') }}/" + id,
                type: "GET",
                success:function(data){
                    $('#ambildata').html(data);
                }
            });
        });     
    </script>
