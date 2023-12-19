<div class="header__cart">
    <a href="#"> <i class="icofont-notification"></i></a>
    <p class="badge bg-danger rounded-pill">{{ count($cr_notifications) }}</p>
    <div class="header__right__dropdown__wrapper">
        <div class="header__right__dropdown__inner">
        @foreach($cr_notifications as $notification)
            <div class="single__header__right__dropdown">
                <div class="header__right__dropdown__content">
                    <a href="{{ $notification->item_link }}">{{ $notification->item_name }}</a>
                    <p>{{ $notification->created_at->diffForHumans() }}</p>
                </div>
                <div class="header__right__dropdown__close">
                    <a href="#"><i class="icofont-close-line"></i></a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>