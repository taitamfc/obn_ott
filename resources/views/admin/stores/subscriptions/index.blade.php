@extends('admin.layouts.master')
@section('header')
<link rel="stylesheet" href="{{ asset('assets/css/select2.css')}}">
@endsection
@section('content')
<div class="main-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Subscriptions</h5>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    @include("admin.stores.subscriptions.$form")
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card subscriptions-table-results">
                    <div class="text-center pt-5 pb-5">{{ __('sys.loading_data') }}</div>
                </div>
            </div>
        </div>
        <!-- Hoverable Rows Table end -->
    </div>
</div>
@endsection

@section('footer')
<script src="{{ asset('assets/js/select2.min.js')}}"></script>
<script>
var indexUrl = "{{ route('admin.subscriptions.index') }}";
var positionUrl = "";
var wrapperResults = '.subscriptions-table-results';
var params = <?= json_encode(request()->query()); ?>;
jQuery(document).ready(function() {
    preventEnter();
    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
    // Handle delete
    jQuery("body").on("click", ".delete-item", function(e) {
        e.preventDefault();
        var ele = $(this);
        let action = ele.data('action');
        if (confirm("Are you sure?")) {
            handleDelete(action, ele);
        }
    });

    // Handle add item
    jQuery("body").on("click", ".add-item", function(e) {
        let formCreate = jQuery(this).closest('#formCreate');
        formCreate.find('.input-error').empty();
        var url = formCreate.prop('action');
        let formData = new FormData($('#formCreate')[0]);
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: function(res) {
                if (res.has_errors) {
                    for (const key in res.errors) {
                        jQuery('.input-' + key).find('.input-error').html(res.errors[
                            key][
                            0
                        ]);
                    }
                    showAlertError('Has Problems, Please Try Again')
                }
                if (res.success) {
                    $('#formCreate')[0].reset();
                    $('#course').val([]).trigger('change');
                    showAlertSuccess(res.message);
                    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
                    // setTimeout(() => {
                    //     window.location.reload();
                    // }, 1200);
                }
            }
        });
    });

    // Handle Update
    jQuery("body").on("click", ".edit-item", function(e) {
        let formUpdate = jQuery(this).closest('#formUpdate');
        formUpdate.find('.input-error').empty();
        var url = formUpdate.prop('action');
        let formData = new FormData($('#formUpdate')[0]);
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: function(res) {
                if (res.has_errors) {
                    for (const key in res.errors) {
                        jQuery('.input-' + key).find('.input-error').html(res.errors[
                            key][
                            0
                        ]);
                    }
                    showAlertError('Has Problems, Please Try Again')
                }
                if (res.success) {
                    showAlertSuccess(res.message);
                    window.location.href = indexUrl;
                }

            }
        });
    });

    $('#course').select2();
});
</script>
@endsection