@extends('layouts.master')
@section('content')
<div class="main-content page-content">
    <!--==================================*
                   Main Section
        *====================================-->
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">Plan</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">Plan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <div id="plan">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card_title">Plan</h4>
                                <div id="mt_pricing">
                                    <div class="container">
                                        <div class="row d-flex justify-content-center align-items-center">
                                            <div class="col-lg-4">
                                                <div class="main_pricing_conatiner highlight_pricing wow fadeInUpBig"
                                                    data-wow-delay="0.6s">
                                                    <div class="price">
                                                        <h2>
                                                            <span class="price_icon">
                                                                <i class="fa fa-money"></i>
                                                            </span>
                                                            {{ $item->name }}
                                                        </h2>
                                                        <span class="price_tag">
                                                            <span
                                                                class="currency">$</span>{{ round($item->price/$item->duration) }}
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
                                                        <div class='form-control text-center bg-secondary'
                                                            style='color:white;border:none'>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
jQuery(document).ready(function() {
    jQuery(".add-item").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        var id = ele.data("id");
        var url = '/users/storePlans/';
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                data: id
            },
            success: function(res) {
                console.log(res);
                if (res.redirect) {
                    window.location.href = res.redirect;
                }
            }
        });
    });
});
</script>
@endsection