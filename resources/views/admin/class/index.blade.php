@extends('admin.layouts.master')
@section('header')
<style>
select.form-control:not([size]):not([multiple]) {
    height: auto;
}
</style>
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-class.my-class')}}</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-class.ott')}}</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-class.my-class')}}</p>
                        </div>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <div id="class">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="filer-class">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <form action="{{ route('admin.classes.students') }}" method='get'
                                                class='d-flex justify-content-center align-items-center'>
                                                <input class="form-control mr-3" type="text" name="searchName"
                                                    placeholder="{{__('admin-class.search-student')}}">
                                                <button type='submit'><i class="ti-search"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-sm-4 text-center">
                                            <div class="form-group">
                                                <form action="{{ route('admin.classes.students') }}" method='get'>
                                                    <input type="hidden" name="viewAll" value='viewAll'>
                                                    <button class="btn btn-primary">{{__('admin-class.view-all')}}</button>
                                                </form>
                                            </div>
                                        </div>
                                        <form class="col-sm-4" action="" method="get">
                                            <select class="form-control" onchange="this.form.submit()" name='course'
                                                id='course'>
                                                <option>{{__('admin-class.select-course')}}</option>
                                                @foreach($courses as $course)
                                                <option value='{{ $course->id }}'>{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <div class="card classes-table-results">
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
    var indexUrl = "{{ route('admin.classes.index') }}";
    var positionUrl = "";
    var params = <?= json_encode(request()->query()); ?>;
    var wrapperResults = '.classes-table-results';

    // Get all items
    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
});
</script>
@endsection