@extends('page.layouts.master')
@section('title')
Plan Page
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach ($plans as $plan)
                        <div class="col-lg-4 mb-5">
                            <div class="card-deck mb-3 text-center">
                                <div class="card mb-4 box-shadow">
                                    <div class="card-header">
                                        <h4 class="my-0 font-weight-normal">{{ $plan->name }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">
                                        $ {{$plan->price}} <small class="text-muted">/mo</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li class="d-block">{{ $plan->number_course }} courses sell</li>
                                            <li class="d-block">{{ @$plan->number_admin ?? 0 }} admin accounts</li>
                                        </ul>
                                        <a href="{{ route('planpage.addPlan',$plan->id) }}" class="btn btn-lg btn-block btn-outline-primary">
                                            Buy Plan    
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
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