@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.sale') }}
@endsection
@section('header')
<link rel="stylesheet" href="{{ asset('assets/vendors/charts/morris-bundle/morris.css') }}">
<style>
#report_user .card-header {
    display: flex;
    justify-content: space-between
}

#report_user .card-footer a {
    margin: 0 10px;
}
</style>
@endsection
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
                        <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-report.report-sales')}}</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-themes.ott')}}</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-report.report-sales')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <div id="report_user">
                <div class="card">
                    <div class="card-header">
                        <h2>{{__('admin-report.sales')}}</h2>
                        <a href="#">{{__('admin-report.export-to-excel')}}</a>
                    </div>
                    <div class="card-body">
                        <!-- <h4 class="card_title">Bar Chart</h4> -->
                        <div id="morris_bar"></div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <form action="" method='get' class='mr-2'>
                                <input type="hidden" name="daily" value='Daily'>
                                <button class="btn btn-primary">{{__('admin-report.daily')}}</button>
                            </form>
                            <form action="" method='get' class='mr-2'>
                                <input type="hidden" name="weekly" value='Weekly'>
                                <button class="btn btn-primary">{{__('admin-report.weekly')}}</button>
                            </form>
                            <form action="" method='get' class='mr-2'>
                                <input type="hidden" name="monthly" value='Monthly'>
                                <button class="btn btn-primary">{{__('admin-report.monthly')}}</button>
                            </form>
                            <form class="input-group input-daterange w-50" method='get' action=''>
                                <input type="date" class="form-control bg-primary w-25" name="fromDate">
                                <div class="input-group-addon btn btn-primary">{{__('admin-report.monthly')}}</div>
                                <input type="date" class="form-control bg-primary w-25" name="toDate">
                                <button type='submit' class='btn btn-primary'><i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table id="dataTable" class="datatable-primary text-center dataTable no-footer "
                            style="width: 40%;">
                            <thead class=" text-capitalize">
                                <tr>
                                    <th>{{__('admin-report.time')}}</th>
                                    <th>{{__('admin-report.course')}}</th>
                                    <th>{{__('admin-report.sold')}}</th>
                                    <th>{{__('admin-report.price')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- converse json encode to decode display -->
                                @foreach(json_decode($items) as $item)
                                <tr>
                                    <td>{{ $item->time }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->sold }}</td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                                <!-- end display -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
var items = {!!$items!!};

// data of chart 
function createData(items) {
    var data = [];
    for (let i = 0; i < items.length; i++) {
        let item = items[i];
        data[i] = {
            x: 'Time : ' + item.time,
            y: item.sold,
        };
    }
    results = {
        data : data,
        Y : 'Sold '
    }
    return results;
}
// end chart
$(document).ready(function() {
    $('#dataTable').DataTable({
        paging: false,
        searching: false,
        info: false
    });
    $('.input-daterange input').each(function() {
        $(this).datepicker('clearDates');
    });
    jQuery("#toDate").on("change", function(e) {
        let formSearch = jQuery(this).closest('#searchDate');
        var url = formSearch.prop('action');
        let formData = new FormData($('#searchDate')[0]);
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "get",
            processData: false,
            contentType: false,
            data: formData,
        })
    });
});
</script>
<script src="{{ asset('assets/vendors/charts/morris-bundle/raphael.min.js') }}"></script>
<script src="{{ asset('assets/vendors/charts/morris-bundle/morris.js') }}"></script>
<script src="{{ asset('assets/js/init/morris-js.js') }}"></script>
@endsection