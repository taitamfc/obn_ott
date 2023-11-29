@extends('admin.layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Group</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Group</p>
                        </div>
                    </div>
                    <div class="buttons">
                        <button data-toggle="modal" data-target="#modalCreate" class="btn  btn-primary float-right">
                            {{ __('sys.add_new') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12 mt-4">
                <div class="card groups-table-results">
                    <div class="text-center pt-5 pb-5">{{ __('sys.loading_data') }}</div>
                </div>
            </div>
            <!-- Progress Table end -->
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
jQuery(document).ready(function() {
    preventEnter();
    var indexUrl = "{{ route('groups.index') }}";
    var positionUrl = "{{ route('groups.position') }}";
    var params = <?= json_encode(request()->query()); ?>;
    var wrapperResults = '.groups-table-results';

    // Get all items
    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);

    // Handle Delete
    jQuery('body').on('click', ".delete-item", function(e) {
        e.preventDefault();
        var ele = $(this);
        let action = ele.data('action');
        if (confirm("Are you sure?")) {
            handleDelete(action, ele);
            // getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
        }
    });

    // Handle create new group
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
                        console.log(key);
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

    // Handle update
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

    // Handle form edit 
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
                    if (formData.role_ids) {
                        for (const role_id of formData.role_ids) {
                            jQuery('#e-role-' + role_id).prop('checked', true);
                        }
                    }
                    formUpdate.prop('action', action);
                    formUpdate.find('.input-id').val(formData.id);
                    formUpdate.find('.input-name input').val(formData.name);

                }
            }
        });
    })
});
</script>

@endsection