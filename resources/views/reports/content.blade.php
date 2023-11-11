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
                        <h5 class="mr-4 mb-0 font-weight-bold">Report content</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">Report content</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <style>
            #report_user .card-header {
                display: flex;
                justify-content: space-between
            }

            #report_user .card-footer a {
                margin: 0 10px;
            }
            </style>
            <div id="report_user">
                <div class="card">
                    <div class="card-header">
                        <h2>Contents</h2>
                        <a href="#">Export to Excel</a>
                    </div>
                    <!-- <div class="card-body">
                        <div class="chart_container">
                            <canvas id="bar_chart"></canvas>
                        </div>
                    </div> -->
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <form action="" method='get' class='mr-2'>
                                <input type="hidden" name="daily" value='Daily'>
                                <button class="btn btn-primary">Daily</button>
                            </form>
                            <form action="" method='get' class='mr-2'>
                                <input type="hidden" name="weekly" value='Weekly'>
                                <button class="btn btn-primary">Weekly</button>
                            </form>
                            <form action="" method='get' class='mr-2'>
                                <input type="hidden" name="monthly" value='Monthly'>
                                <button class="btn btn-primary">Monthly</button>
                            </form>
                            <form class="input-group input-daterange w-50" method='get' action=''>
                                <input type="date" class="form-control bg-primary w-25" name="fromDate">
                                <div class="input-group-addon btn btn-primary">to</div>
                                <input type="date" class="form-control bg-primary w-25" name="toDate">
                                <button type='submit' class='btn btn-primary'><i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table id="dataTable" class="datatable-primary text-center dataTable no-footer "
                            style="width: 70%;">
                            <thead class=" text-capitalize">
                                <tr>
                                    <th>Time</th>
                                    <th>Lesson</th>
                                    <th>Course</th>
                                    <th>View Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->time }}</td>
                                    <td>{{ $item->lessonName }}</td>
                                    <td>{{ $item->courseName }}</td>
                                    <td>{{ $item->view_count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination" style="float:right">
                            {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================*
                   End Main Section
        *====================================-->
</div>
@endsection

@section('footer')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
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
@endsection