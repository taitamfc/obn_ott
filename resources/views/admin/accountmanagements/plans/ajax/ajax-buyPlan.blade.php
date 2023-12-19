<div class="card">
    <div class="card-body">
        <h4 class="card_title">{{__('admin-account.plan')}}</h4>
        <div id="mt_pricing">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group input-name">
                                        <label for="name" class="col-form-label">{{__('admin-account.name')}}</label>
                                        <input class="form-control" type="text" name="name" value="{{ $item->name }}"
                                            id="name" disabled>
                                    </div>
                                    <div class="form-group input-price">
                                        <label for="name" class="col-form-label">{{__('admin-account.price')}}</label>
                                        <input class="form-control" type="text" name="price"
                                            value="${{  $item->price }}" id="price" disabled>
                                    </div>
                                    <div class="form-group input-duration">
                                        <label for="name" class="col-form-label">{{__('admin-account.duration')}}</label>
                                        <input class="form-control" type="text" name="duration"
                                            value="{{ $item->duration }}" id="duration" disabled>
                                    </div>
                                    <div class="form-group input-date">
                                        <label for="name" class="col-form-label">{{__('admin-account.expiration-date')}}</label>
                                        <input class="form-control" type="text" name="date"
                                            value="{{ $date->format('d-m-y') }}" id="date" disabled>
                                    </div>
                                    <div class="form-group input-pay">
                                        <label for="pay" class="col-form-label">{{__('admin-account.pay-method')}}</label>
                                        <div class="form-inline">
                                            <input class="form-check-input mr-2" type="radio" name="pay" value="paypal"
                                                id="pay-01">
                                            <label class="form-check-label" for="pay-01">{{__('admin-account.paypal')}}</label>
                                        </div>
                                        <div class="input-error text-danger">@error('pay') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="main_pricing_conatiner highlight_pricing wow fadeInUpBig rounded"
                            data-wow-delay="0.6s">
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
                                @if($current_plan)
                                <div class='form-control text-center bg-secondary' style='color:white;border:none'>
                                {{__('admin-account.new-plan-will-start-on')}} : {{ $current_plan }}
                                </div>
                                @endif
                                <a href='javascript:;' class='btn btn-light add-item' data-id="{{ $item->id }}"
                                    data-action="{{ route('admin.users.storePlans') }}"
                                    data-price="{{ $item->price }}">{{__('admin-account.confirm')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>