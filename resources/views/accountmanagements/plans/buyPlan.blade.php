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
                        <h5 class="mr-4 mb-0 font-weight-bold">Plan</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">Plan</p>
                        </div>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ route('users.plans') }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <div id="plan">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card buyPlans-table-results">
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
var url = window.location.href;
var id = url.split("/").pop();
var indexUrl = "{{url('/')}}" + "/users/addPlans/" + id;
var positionUrl = "";
var params = <?= json_encode(request()->query()); ?>;
var wrapperResults = '.buyPlans-table-results';
jQuery(document).ready(function() {
    // Get all items
    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);

    //Handle add plans 
    jQuery('body').on("click", ".add-item", function(e) {
        e.preventDefault();
        var ele = $(this);
        var id = ele.data("id");
        var action = ele.data("action");
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: action,
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                data: id
            },
            success: function(res) {
                if (res.error) {
                    showAlertError(res.error);
                }
                if (res.redirect) {
                    showAlertSuccess(res.message);
                    setTimeout(() => {
                        window.location.href = res.redirect;
                    }, 1200);
                }
            }
        });
    });
});
</script>
@endsection