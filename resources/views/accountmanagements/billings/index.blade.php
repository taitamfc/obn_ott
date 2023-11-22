@extends('layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">Account Management</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">Account Management</p>
                        </div>
                    </div>
                    <div class="buttons">

                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <style>
            #billing_imfomation {}
            </style>
            <div id="billing_imfomation">
                <div class="card mt-4">
                    <div class="card-header d-flex justify">
                        <div class="col-sm-6">
                            <h4>SELECT A NEW BILLING METHOD</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="billing_info">
                            <div class="row">
                                <div class=" col-sm-6">
                                    <div class="col-sm-4">
                                        <a href="" data-toggle="modal" data-target="#modalCreate">
                                            <img src="https://image.vietstock.vn/2018/08/08/visa-mastercard-amex-discover-icon.png"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class=" col-sm-6">
                                    <div class="col-sm-4">
                                        <form action="" method="post">
                                            @csrf
                                            <button type='submit'>
                                                <img src="https://ott.rrtech247.com/public/assets/studio/images/Paypal-logo.png"
                                                    alt="">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="billing_imfomation">
                <div class="userbank-table-results">
                    <div class="text-center pt-5 pb-5">{{ __('sys.loading_data') }}</div>
                </div>
            </div>
        </div>
        @include('accountmanagements.billings.create')
        @include('accountmanagements.billings.edit')
    </div>
</div>
@endsection

@section('footer')
<script>
jQuery(document).ready(function() {
    var indexUrl = "{{ route('userbank.index') }}";
    var positionUrl = "";
    var params = <?= json_encode(request()->query()); ?>;
    var wrapperResults = '.userbank-table-results';

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

    // Handle Add
    jQuery('body').on('click', ".add-item", function(e) {
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
                        jQuery('.input-' + key).find('.input-error').html(res.errors[key][
                            0
                        ]);
                    }
                    showAlertError('Has problems, Please try again!');
                }
                if (res.success) {
                    // Delete all values
                    $('#formCreate')[0].reset();

                    showAlertSuccess(res.message);
                    // Disable modal
                    jQuery('#modalCreate').modal('hide');
                    // Recall items
                    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
                }
            }
        });
    });

    // Handle Update
    jQuery('body').on('click', ".edit-item", function(e) {
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
                        jQuery('.input-' + key).find('.input-error').html(res.errors[key][
                            0
                        ]);
                    }
                    showAlertError('Has problems, please try again!');
                }
                if (res.success) {
                    showAlertSuccess('Update Success');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1200);
                }

            }
        });
    });

    // Handle Form Edit
    jQuery('body').on('click', ".show-form-edit", function(e) {
        // Hien thi modal
        jQuery('#modalUpdate').modal('show');
        let formUpdate = jQuery('#formUpdate');
        // Lấy dữ liệu
        let id = jQuery(this).data('id');
        let action = jQuery(this).data('action');
        var url = indexUrl + '/' + id;
        jQuery.ajax({
            url: url,
            type: "GET",
            dataType: 'json',
            success: function(res) {
                if (res.success) {
                    console.log(res.data);
                    let formData = res.data;
                    formUpdate.prop('action', action);
                    formUpdate.find('.input-bank_number input').val(formData.bank_number);
                    formUpdate.find('.input-bank_owner input').val(formData.bank_owner);
                    formUpdate.find('.input-bank_name input').val(formData.bank_name);
                    formUpdate.find('.input-address input').val(formData.address);
                }
            }
        });
    })
});
</script>
@endsection