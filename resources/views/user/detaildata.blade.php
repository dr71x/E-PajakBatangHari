<table class="table">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">OBJEK PAJAK</th>
      <th scope="col">JENIS PAJAK</th>
      <th scope="col">LUAS </th>
      <th scope="col">NJOP(NILAI JUAL OBJEK PAJAK)</th>
      <th scope="col">TOTAL NJOP</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $item)
    <tr>
        <td>
            {{ $loop->iteration }}
        </td>
        <td>
            {{ $item->jenis }}
        </td>
        <td>
            @if($item->jenis == "Pajak Bangunan")
            RUMAH
            @else
            TANAH
            @endif
        </td>
        <td>
            {{ $item->luas }} M
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