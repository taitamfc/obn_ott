@extends('page.layouts.master')
@section('title')
Send Emai
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
                        <div class="text_big">
                            <p><strong>You have successfully created an account with email: {{$order->email}}</strong></p>
                        </div>
                        <div class="text_small">
                            <p>Please check your email to get your password! </p>
                        </div>
                        <div class="headerarea__button">
                            <a href="{{route('planpage.index')}}">Get Plan -></a>
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
    var params = <?= json_encode(request()->query()); ?>;
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