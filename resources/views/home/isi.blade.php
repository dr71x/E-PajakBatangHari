@foreach ($notification as $item)
<li class="active dz-chat-user">
    <div class="d-flex bd-highlight">
        <div class="img_cont">
            <i class="fa-solid fa-circle-check" style="color: green"></i>
        </div>
        <div class="user_info">
            <span>{{ $item->donor_name }} - {{ $item->donor_email }}</span>
            <p>{{ Str::substr($item->amount, 0, -3) }}</p>
        </div>
    </div>
</li>
@endforeach