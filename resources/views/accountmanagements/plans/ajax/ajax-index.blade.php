<div class="card">
    <div class="card-body">
        <h4 class="card_title">Plan</h4>
        <div id="mt_pricing">
            <div class="container">
                <div class="row">
                    @foreach($items as $item)
                        @if(!empty($current_plan) && $item->id == $current_plan->plan_id)
                        <div class="col-lg-4">
                            <div class='form-control text-center' style='color:black'>
                                Expiration : {{ $current_plan->expiration_date }}
                            </div>
                            <div class="main_pricing_conatiner highlight_pricing wow fadeInUpBig" data-wow-delay="0.6s">
                                <div class="price">
                                    <h2>
                                        <span class="price_icon">
                                            <i class="fa fa-money"></i>
                                        </span>
                                        {{ $item->name }}
                                    </h2>
                                    <span class="price_tag">
                                        <span class="currency">$</span>{{ round($item->price/$item->duration) }}
                                    </span>
                                    <span class="per_month">/Month</span>
                                </div>
                                <div class="price_listing">
                                    <ul>
                                        <li>Latin words, consectetur.</li>
                                        <li>All the Lorem Ipsum.</li>
                                        <li>It has survived not only</li>
                                        <li>Labore et dolore magna ali.</li>
                                        <li>Nor again is there anyone.</li>
                                    </ul>
                                </div>
                                <div class="choose_plan_btn">
                                    <a href='javascript:;' class='btn btn-light'>Current
                                        Plan</a>
                                </div>
                            </div>
                        </div>
                        @elseif(!empty($next_plan) && $item->id == $next_plan->plan_id)
                        <div class="col-lg-4">
                            <div class="main_pricing_conatiner wow fadeInLeftBig" data-wow-delay="0.3">
                                <div class="price">
                                    <h2>
                                        <span class="price_icon">
                                            <i class="fa fa-money"></i>
                                        </span>
                                        {{ $item->name }}
                                    </h2>
                                    <span class="price_tag">
                                        <span class="currency">$</span>{{ round($item->price/$item->duration) }}
                                    </span>
                                    <span class="per_month">/Month</span>
                                </div>
                                <div class="price_listing">
                                    <ul>
                                        <li>Latin words, consectetur.</li>
                                        <li>All the Lorem Ipsum.</li>
                                        <li>It has survived not only</li>
                                        <li>Labore et dolore magna ali.</li>
                                        <li>Nor again is there anyone.</li>
                                    </ul>
                                </div>
                                <div class="choose_plan_btn">
                                    <a href="javascript:;" class='btn btn-secondary'>Will be start
                                        on
                                        {{ $next_plan->created_at->format('Y-m-d') }}</a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-lg-4">
                            <div class="main_pricing_conatiner wow fadeInLeftBig" data-wow-delay="0.3">
                                <div class="price">
                                    <h2>
                                        <span class="price_icon">
                                            <i class="fa fa-money"></i>
                                        </span>
                                        {{ $item->name }}
                                    </h2>
                                    <span class="price_tag">
                                        <span class="currency">$</span>{{ round($item->price/$item->duration) }}
                                    </span>
                                    <span class="per_month">/Month</span>
                                </div>
                                <div class="price_listing">
                                    <ul>
                                        <li>Latin words, consectetur.</li>
                                        <li>All the Lorem Ipsum.</li>
                                        <li>It has survived not only</li>
                                        <li>Labore et dolore magna ali.</li>
                                        <li>Nor again is there anyone.</li>
                                    </ul>
                                </div>
                                <div class="choose_plan_btn">
                                    <a href="{{ route('users.addPlans',$item->id) }}" class='btn btn-primary'>CHOOSE
                                        PLAN</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                <div class="pagination" style="float:right">
                    {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>