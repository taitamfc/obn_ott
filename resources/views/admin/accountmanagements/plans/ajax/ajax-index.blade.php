<div class="card">
    <div class="card-body">
        <h4 class="card_title">{{__('admin-account.plan')}}</h4>
        <div id="mt_pricing">
            <div class="container">
                <div class="row">
                    @foreach($items as $item)
                    @if(!empty($current_plan) && $item->id == $current_plan->plan_id)
                    <div class="col-lg-4">
                        <div class='form-control text-center' style='color:black'>
                        {{__('admin-account.expiration')}} : {{ $current_plan->expiration_date }}
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
                                    <span class="currency">${{ $item->price}}</span>
                                </span>
                                <span class="per_month">/{{ $item->duration }}</span>
                            </div>
                            <div class="price_listing">
                                <ul>
                                    <li>{{__('admin-account.latin-words-consectetur')}}</li>
                                    <li>{{__('admin-account.all-the-lorem-ipsum')}}</li>
                                    <li>{{__('admin-account.it-has-survived-not-only')}}</li>
                                    <li>{{__('admin-account.labore-et-dolore-magna-ali')}}</li>
                                    <li>{{__('admin-account.nor-again-is-there-anyone')}}</li>
                                </ul>
                            </div>
                            <div class="choose_plan_btn">
                                <a href='javascript:;' class='btn btn-light'>{{__('admin-account.current-plan')}}</a>
                            </div>
                        </div>
                    </div>
                    @elseif(!empty($next_plan_data) && array_search($item->id, $next_plan_data))
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
                                    <span class="currency">${{ $item->price}}</span>
                                </span>
                                <span class="per_month">/{{ $item->duration }}</span>
                            </div>
                            <div class="price_listing">
                                <ul>
                                    <li>{{__('admin-account.latin-words-consectetur')}}</li>
                                    <li>{{__('admin-account.all-the-lorem-ipsum')}}</li>
                                    <li>{{__('admin-account.it-has-survived-not-only')}}</li>
                                    <li>{{__('admin-account.labore-et-dolore-magna-ali')}}</li>
                                    <li>{{__('admin-account.nor-again-is-there-anyone')}}</li>
                                </ul>
                            </div>
                            <div class="choose_plan_btn">
                                <a href="javascript:;" class='btn btn-secondary'>{{__('admin-account.new-plan-will-start-on')}} {{ $item->getKeyByValue($next_plan_data,$item->id)->format('Y-m-d') }}
                                </a>
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
                                    <span class="currency">${{ $item->price }}</span>
                                </span>
                                <span class="per_month">/{{ $item->duration }}</span>
                            </div>
                            <div class="price_listing">
                                <ul>
                                    <li>{{__('admin-account.latin-words-consectetur')}}</li>
                                    <li>{{__('admin-account.all-the-lorem-ipsum')}}</li>
                                    <li>{{__('admin-account.it-has-survived-not-only')}}</li>
                                    <li>{{__('admin-account.labore-et-dolore-magna-ali')}}</li>
                                    <li>{{__('admin-account.nor-again-is-there-anyone')}}</li>
                                </ul>
                            </div>
                            <div class="choose_plan_btn">
                                <a href="{{ route('admin.users.addPlans',$item->id) }}" class='btn btn-primary'>{{__('admin-account.choose-plan')}}</a>
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