@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.banner') }}
@endsection
@section('header')
<style>
#theme_setting .btn-close {
    right: 10%;
    top: 10%;
    font-size: 25px;
    color: red;
    border: 1px solid red;
    border-radius: 50%;
    padding: 5px;

}

#theme_setting .button-control i {
    color: #fff
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
                        <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-themes.my-plan')}}</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-themes.ott')}}</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-themes.my-plan')}}</p>
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="buttons d-flex">
                            <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
                            <button data-toggle="modal" data-target="#modalCreate" class="btn btn-primary">
                                {{ __('sys.add_new') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="theme_setting">
            <div class="banners-table-results">
                <div class="text-center pt-5 pb-5">{{ __('sys.loading_data') }}</div>
            </div>
            @include('admin.themes.settings.edit')
        </div>
        @include('admin.themes.banners.create')
        @include('admin.themes.banners.edit')
    </div>
</div>
@endsection

@section('footer')
<script>
var indexUrl = "{{ route('admin.banners.index') }}";
var positionUrl = "";
var params = <?= json_encode(request()->query()); ?>;
var wrapperResults = '.banners-table-results';
jQuery(document).ready(function() {
    // Get All Item
    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);

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
                        jQuery('.input-' + key).find('.input-error').html(res.errors[
                            key][
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
                        jQuery('.input-' + key).find('.input-error').html(res.errors[
                            key][
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

    // Handle Form Edit
    jQuery('body').on('click', ".show-form-edit", function(e) {
        // Hien thi modal
        jQuery('#modalUpdate').modal('show');
        let formUpdate = jQuery('#formUpdate');
        // Lấy dữ liệu
        let id = jQuery(this).data('id');
        let action = jQuery(this).data('action');

        jQuery.ajax({
            url: '/admin/banners/' + id,
            type: "GET",
            dataType: 'json',
            success: function(res) {
                if (res.success) {
                    let formData = res.data;
                    formUpdate.prop('action', action);
                    formUpdate.find('.input-id').val(formData.id);
                    formUpdate.find('.input-name input').val(formData.name);
                    formUpdate.find('.textarea-description textarea').val(formData
                        .description);
                    formUpdate.find('.input-link input').val(formData.link);
                    formUpdate.find('.input-status input').prop('checked', false);
                    if (formData.status) {
                        formUpdate.find('.input-status .input-active').prop('checked',
                            true);
                    } else {
                        formUpdate.find('.input-status .input-inactive').prop('checked',
                            true);
                    }
                }
            }
        });
    });
});
</script>
@endsection