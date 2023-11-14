@extends('layouts.master')
@section('content')
<div class="main-content page-content bg-light">
    <div class="main-content-inner">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Product Management</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Product Management</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 mt-4">
            <div class="card product-table-results">
                <div class="text-center pt-5 pb-5">{{ __('sys.loading_data') }}</div>
            </div>
        </div>
        @include('stores.productmanagement.edit')
    </div>
</div>
@endsection

@section('footer')
<script>
var indexUrl = "{{ route('courses.products') }}";
var positionUrl = "";
var wrapperResults = '.product-table-results';
var params = <?= json_encode(request()->query()); ?>;
jQuery(document).ready(function() {
    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
    jQuery('body').on('click', ".page-link", function(e) {
        e.preventDefault();
        let url = jQuery(this).attr('href');
        getAjaxTable(url, wrapperResults, positionUrl);
    });
});
</script>
@endsection