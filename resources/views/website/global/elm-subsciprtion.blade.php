<div class="gridarea__wraper">
    <div class="gridarea__img">
        <a href="{{ route('website.subscriptions.show',['id'=> $subscription->id,'site_name'=> $site_name]) }}">
            <img src="{{ asset($subscription->image_url)}}" alt="grid">
        </a>
        <div class="gridarea__small__button">
            <div class="grid__badge">{{ $subscription->duration->name }}</div>
        </div>
    </div>
    <div class="gridarea__content">
        <div class="gridarea__heading">
            <h3>
                <a
                    href="{{ route('website.subscriptions.show',['id'=> $subscription->id,'site_name'=> $site_name]) }}">{{ $subscription->name }}</a>
            </h3>
        </div>
        <div class="gridarea__price">
            {{ $subscription->price_fm}}
        </div>
        <div class="course__summery__button">
            <a href="{{ route('website.orders.create',['site_name'=> $site_name, 'item_id' => $subscription->id,'type'=>'subscription']) }}"
                class="default__button">Purchase</a>
        </div>
    </div>
</div>