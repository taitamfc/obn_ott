<div class="card">
    <div class="card-body">
        <h4 class="card_title">Plan</h4>
        <div id="mt_pricing">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-4">
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
                                @if($current_plan)
                                <div class='form-control text-center bg-secondary' style='color:white;border:none'>
                                    New plan will start on : {{ $current_plan }}
                                </div>
                                @endif
                                <a href='javascript:;' class='btn btn-light add-item'
                                    data-id="{{ $item->id }}">Confirm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>