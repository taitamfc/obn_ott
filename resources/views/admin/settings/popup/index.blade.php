@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.popup') }}
@endsection
@section('header')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
@endsection

@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-setting.popup')}}</h5>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12">
                <div class="popup-table-results">
                    {{ __('sys.loading_data') }}
                </div>
            </div>
            <!-- Progress Table end -->
        </div>
        @include('admin.settings.popup.edit')
    </div>
</div>
@endsection

@section('footer')
<script>
CKEDITOR.replace('popup');
</script>
<script>
var indexUrl = "{{ route('admin.settings.popup') }}";
var positionUrl = "";
var params = <?= json_encode(request()->query()); ?>;
var wrapperResults = '.popup-table-results';
jQuery(document).ready(function() {
    // Get all items
    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);

    // Handle Add Item
    jQuery('body').on('click', ".add-item", function(e) {
        let formCreate = jQuery(this).closest('#formCreate');
        formCreate.find('.input-error').empty();
        var url = formCreate.prop('action');
        let formData = new FormData($('#formCreate')[0]);
        var desc = CKEDITOR.instances.popup.getData();
        formData.append('popup', desc);
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
                        jQuery('.input-' + key + '-create').find('.input-error').html(
                            res
                            .errors[key][
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

    // Handle Update Item
    jQuery('body').on('click', ".edit-item", function(e) {
        let formUpdate = jQuery(this).closest('#formUpdate');
        formUpdate.find('.input-error').empty();
        var url = formUpdate.prop('action');
        let formData = new FormData($('#formUpdate')[0]);
        var desc = CKEDITOR.instances.popup.getData();
        formData.append('popup', desc);
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
                        jQuery('.input-' + key + '-update').find('.input-error').html(
                            res
                            .errors[key][
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
        jQuery('#modalUpdate').modal('show');
        let formUpdate = jQuery('#formUpdate');
        let action = jQuery(this).data('action');
        jQuery.ajax({
            url: action,
            type: "GET",
            dataType: 'json',
            success: function(res) {
                if (res.success) {
                    let formData = res.data;
                    console.log(formData.setting_value);
                    // document.querySelector("#popup").value = formData.setting_value;
                    formUpdate.find('.input-popup-update textarea').val(formData
                        .setting_value);
                }
            }
        });
    })
});
</script>
@endsection