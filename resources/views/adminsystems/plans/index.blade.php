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
                        <h5 class="mr-4 mb-0 font-weight-bold">Plans</h5>
                    </div>
                    <div class="buttons d-flex">
                        <button data-toggle="modal" data-target="#modalCreate" class="btn btn-primary">
                            {{ __('sys.add_new') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12">

                <div class="card subject-table-results">
                    <div class="text-center pt-5 pb-5">{{ __('sys.loading_data') }}</div>
                </div>


            </div>
            <!-- Progress Table end -->
        </div>
    </div>
</div>
@include('adminsystems.plans.edit')
@include('adminsystems.plans.create')
@endsection

@section('footer')
<script>
var indexUrl = "{{ route('plans.index') }}";
var positionUrl = "";
var params = <?= json_encode(request()->query()); ?>;
var wrapperResults = '.subject-table-results';
jQuery(document).ready(function() {
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

    // Xu ly them moi
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
                    showAlertError('Has Problems, Please Try Again!');
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

    // Xu ly cap nhat
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
                    showAlertError('Has Problems, Please Try Again!');
                }
                if (res.success) {
                    showAlertSuccess(res.message);
                    // Disable modal
                    jQuery('#modalUpdate').modal('hide');
                    // Recall items
                    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
                }

            }
        });
    });

    // Xu ly form edit
    jQuery('body').on('click', ".show-form-edit", function(e) {
        // Hien thi modal
        jQuery('#modalUpdate').modal('show');

        let formUpdate = jQuery('#formUpdate');


        // Lấy dữ liệu
        let id = jQuery(this).data('id');
        let action = jQuery(this).data('action');

        jQuery.ajax({
            url: action,
            type: "GET",
            dataType: 'json',
            success: function(res) {
                if (res.success) {
                    let formData = res.data;
                    formUpdate.prop('action', action);
                    formUpdate.find('.input-name input').val(formData.name);
                    formUpdate.find('.input-price input').val(formData.price);
                    formUpdate.find('.input-number_course input').val(formData
                        .number_course);
                    formUpdate.find('.input-number_admin input').val(formData.number_admin);
                    formUpdate.find('.input-description textarea').val(formData
                    .description);
                    if (formData.is_contact == 1) {
                        formUpdate.find('#e-active').prop('checked', true);
                        formUpdate.find('#e-inactive').prop('checked', false);
                    } else {
                        formUpdate.find('#e-active').prop('checked', false);
                        formUpdate.find('#e-inactive').prop('checked', true);
                    }
                    // formUpdate.find('.input-number_days input').val(formData.number_days);
                    // formUpdate.find('.input-duration input').val(formData.duration);
                    // formUpdate.find('.input-number_grade input').val(formData.number_grade);
                    // formUpdate.find('.input-number_subject input').val(formData.number_subject);
                    // formUpdate.find('.input-number_lesson input').val(formData.number_lesson);

                }
            }
        });
    })
});
</script>
@endsection