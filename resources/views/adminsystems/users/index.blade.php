@extends('adminsystems.layouts.master')
@section('title')
{{ __('admin-sidebar.user') }}
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">Users</h5>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Progress Table start -->

            <div class="col-12">

                <div class="admin-table-results">
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
var indexUrl = "{{ route('adminsystem.users.index') }}";
var positionUrl = "";
var params = <?= json_encode(request()->query()); ?>;
var wrapperResults = '.admin-table-results';
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

    // Handle add
    jQuery('body').on('click', ".add-user", function(e) {
        let formCreate = jQuery(this).closest('#formCreateUser');
        formCreate.find('.input-error').empty();
        var url = formCreate.prop('action');
        let formData = new FormData($('#formCreateUser')[0]);
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
                console.log(res);
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
                    $('#formCreateUser')[0].reset();
                    showAlertSuccess(res.message);
                    // Disable modal
                    jQuery('#modalCreateUser').modal('hide');
                    // Recall items
                    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
                }

            }
        });
    });

    // Handle update
    jQuery('body').on('click', ".edit-user", function(e) {
        let formUpdate = jQuery(this).closest('#formUpdateUser');
        formUpdate.find('.input-error').empty();
        var url = formUpdate.prop('action');
        let formData = new FormData($('#formUpdateUser')[0]);
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
                    jQuery('#modalUpdateUser').modal('hide');
                    // Recall items
                    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
                }

            }
        });
    });

    // Handle form edit
    jQuery('body').on('click', ".show-form-edit-user", function(e) {
        // Hien thi modal
        jQuery('#modalUpdateUser').modal('show');
        let formUpdate = jQuery('#formUpdateUser');

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

                    formUpdate.find('.input-id').val(formData.id);
                    formUpdate.find('.input-name input').val(formData.name);
                    formUpdate.find('.input-email input').val(formData.email);
                    formUpdate.find('.input-password input').val(formData.password);
                    formUpdate.find('.input-group_id select').val(formData.group_id);
                    formUpdate.find('.input-parent_id input').val(formData.parent_id);
                }
            }
        });
    })

    //Handle switch plan
    jQuery('body').on('change', ".select_status", function(e) {
        var user_id = jQuery(this).data('user_id');
        var status = jQuery(this).val();
        jQuery.ajax({
            url: "{{ route('adminsystem.users.changeStatus')}}",
            type: "GET",
            data: {
                user_id: user_id,
                status: status,
            },
            success: function(res) {
                var plansite = res.data;
                if (plansite !== '') {
                    planNameElement.find('.plan_name').html(plansite['plan_name'] +
                        "<br>Expired: " + plansite['plan_expiration']);
                } else {
                    planNameElement.find('.plan_name').html("");
                }
            }
        });
    });
    jQuery('body').on('change', ".select_plan", function(e) {
        var plan_id = jQuery(this).val();
        var user_id = jQuery(this).data('user_id');
        var planNameElement = jQuery(this).closest('.plan-item');
        var data = {
            plan_id: plan_id,
            user_id: user_id
        };
        jQuery.ajax({
            url: "{{ route('adminsystem.users.getPlanSite')}}",
            type: "GET",
            data: data,
            success: function(res) {
                var plansite = res.data;
                if (plansite !== '') {
                    planNameElement.find('.plan_name').html(plansite['plan_name'] +
                        "<br>Expired: " + plansite['plan_expiration']);
                } else {
                    planNameElement.find('.plan_name').html("");
                }
            }
        });
    });
});
</script>
@endsection