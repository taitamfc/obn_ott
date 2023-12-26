@extends('adminsystems.layouts.master')
@section('title')
{{ __('admin-sidebar.sites') }}
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">Reports</h5>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-xl-6 stretched_card mt-mob-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title">Line Chart</h4>
                        <div class="chart_container">
                            <canvas id="line_chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 stretched_card mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title">Doughnut Chart</h4>
                        <div class="chart_container">
                            <canvas id="doughnut_chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Progress Table end -->
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
var items = {!!$items!!};
// data of chart 
function createDataLine(items) {
    var data = [];
    for (let i = 0; i < items.length; i++) {
        let item = items[i];
        data[i] = {
            x: 'Time :' + item.time,
            y: item.view_count
        };
    }
    results = {
        data: data,
        Y: 'View lesson'
    }
    return results;
}
// end chart
</script>
<script src="{{ asset('assets/vendors/charts/charts-bundle/Chart.bundle.js') }}"></script>
<script src="{{ asset('assets/js/init/chart-js.js') }}"></script>
@endsection