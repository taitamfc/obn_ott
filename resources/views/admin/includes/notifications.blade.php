<li class="dropdown">
    <i class="feather ft-bell dropdown-toggle" data-toggle="dropdown">
        <span class="badge bg-danger rounded-pill">{{ count($cr_notifications) }}</span>
    </i>
    <div class="dropdown-menu bell-notify-box notify-box">
        <span class="notify-title">You have {{ count($cr_notifications) }} new items </span>
        <div class="nofity-list">
            @foreach($cr_notifications as $notification)
                <a href="{{ $notification->item_link }}" class="notify-item">
                    <div class="notify-thumb">
                        {!! $notification->item_icon !!}
                    </div>
                    <div class="notify-text">
                        <h3>{{ $notification->item_name }}</h3>
                        <span>{{ $notification->created_at->diffForHumans() }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</li>
