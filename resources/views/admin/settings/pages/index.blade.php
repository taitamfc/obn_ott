@extends('admin.layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">Pages</h5>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
                        <a class="btn btn-primary mr-1" href="{{ route('pages.create') }}">{{ __('sys.add_new') }}</a>
                    </div>
                </div>
            </div>
            <div class="row w-100">
                <!-- Progress Table start -->
                <div class="col-12">
                    <div class="card pages-table-results">
                        {{ __('sys.loading_data') }}
                    </div>
                </div>
                <!-- Progress Table end -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
var indexUrl = "{{ route('pages.index') }}";
var positionUrl = "";
var params = <?= json_encode(request()->query()); ?>;
var wrapperResults = '.pages-table-results';
jQuery(document).ready(function() {
    // Get all items
    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);

    // Handle Delete
    jQuery('body').on('click', ".delete-item", function(e) {
        e.preventDefault();
        var ele = $(this);
        let action = ele.data('action');
        if (confirm("Are you sure?")) {
            handleDelete(action, ele);
        }
        getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
    });


});
</script>
@endsection