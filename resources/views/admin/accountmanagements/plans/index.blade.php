@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.plan') }}
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-account.plan')}}</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-themes.ott')}}</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-account.plan')}}</p>
                        </div>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <div id="plan">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card plans-table-results">
                            <div class="text-center pt-5 pb-5">{{ __('sys.loading_data') }}</div>
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
    var indexUrl = "{{ route('admin.users.plans') }}";
    var positionUrl = "";
    var params = <?= json_encode(request()->query()); ?>;
    var wrapperResults = '.plans-table-results';

    // Get all items
    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
});
</script>
@endsection