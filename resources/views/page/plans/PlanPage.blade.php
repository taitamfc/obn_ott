@extends('page.layouts.master')
@section('title')
    Plan Page
@endsection
@section('content')
    <div class="main-content page-content">
        <div class="main-content-inner" style="max-width: 100% !important;">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between flex-wrap">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card lesson-table-results">
                        <div class="text-center pt-5 pb-5">
                            <div style="
                                            margin-left: 20px;
                                            margin-right: 20px;
                                        " class="row">
                                @foreach ($plans as $plan => $value)
                                <div class="col-lg-4">
                                        <div style="
                                        margin-top: 20px;
                                        margin-bottom: 20px;
                                        background-color: #F7F7F7;
                                        border-radius: 8px;
                                        " class="wrapper">
                                            <div class="main_pricing_conatiner wow fadeInLeftBig" data-wow-delay="0.3">
                                                <div class="price">
                                                    <h2>
                                                        <span class="price_icon">
                                                            <i class="fa fa-money"></i>
                                                        </span>
                                                        {{$value->name}}
                                                    </h2>
                                                    <span class="price_tag">
                                                        <span class="currency">{{$value->price}}</span>
                                                    </span>
                                                    <span class="per_month">/{{$value->duration}}</span>
                                                </div>
                                                <div class="price_listing">
                                                    <span>{{$value->number_days}}</span>
                                                </div>
                                                <div class="headerarea__button">
                                                    <a href="{{ route('planpage.addPlan',$value->id) }}" class="btn btn-secondary">
                                                        Buy Plan
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                @endforeach
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
        jQuery(function() {
            var indexUrl = "{{ route('admin.lessons.index') }}";
            var positionUrl = "{{ route('admin.lessons.position') }}";
            var params = <?= json_encode(request()->query()) ?>;
            var wrapperResults = '.lesson-table-results';

            // Get all items
            getAjaxTable(indexUrl, wrapperResults, positionUrl, params);

            // Handle pagination
            jQuery('body').on('click', ".page-link", function(e) {
                e.preventDefault();
                let url = jQuery(this).attr('href');
                getAjaxTable(url, wrapperResults, positionUrl);
            });

            // Handle Delete
            jQuery('body').on('click', ".delete-item", function(e) {
                e.preventDefault();
                var ele = $(this);
                let action = ele.data('action');
                if (confirm("Are you sure?")) {
                    handleDelete(action, ele);
                }
            });

            // Handle filter
            jQuery('body').on('change', '.f-filter', function() {
                let filterData = jQuery('#form-search').serialize();
                getAjaxTable(indexUrl, wrapperResults, positionUrl, filterData);
            });
            jQuery('body').on('keyup', '.f-filter-text', function() {
                setTimeout(() => {
                    let filterData = jQuery('#form-search').serialize();
                    getAjaxTable(indexUrl, wrapperResults, positionUrl, filterData);
                }, 1000);
            });
        });
    </script>
@endsection
