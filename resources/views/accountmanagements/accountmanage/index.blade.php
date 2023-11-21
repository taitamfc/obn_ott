@extends('layouts.master')
@section('header')
<style>
.table td,
.table th {
    border: 1 px solid;
}

.card-header {
    border: none;
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
                        <h5 class="mr-4 mb-0 font-weight-bold">Account Management</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">Account Management</p>
                        </div>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ route('home') }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="information-table-results">
            <div class="text-center">{{ __('sys.loading_data') }}</div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
jQuery(function() {
    var indexUrl = "{{ route('account.index') }}";
    var positionUrl = "";
    var params = <?= json_encode(request()->query()); ?>;
    var wrapperResults = '.information-table-results';

    // Get all items
    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
    
    // Update account
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
                }
                showAlertSuccess(res.message);
                if (res.success) {
                    window.location.reload();
                }
            }
        });
    });

    // show form edit with value default
    jQuery('body').on('click', ".show-form-edit", function(r) {
        // alert(123)
        // Hien thi modal
        jQuery('#modalUpdate').modal('show');
        let formUpdate = jQuery('#formUpdate');
        // Lấy dữ liệu
        let id = jQuery(this).data('id');
        let action = jQuery(this).data('action');
        var url = 'users/' + id;
        jQuery.ajax({
            url: url,
            type: "GET",
            dataType: 'json',
            success: function(res) {
                if (res.success) {
                    let formData = res.data;
                    formUpdate.prop('action', action);
                    formUpdate.find('.input-id').val(formData.id);
                    formUpdate.find('.input-name input').val(formData.name);
                    formUpdate.find('.input-email input').val(formData.email);
                    formUpdate.find('.input-phone input').val(formData.phone);
                    formUpdate.find('.input-password input').val(formData.password);

                }
            }
        });
    });
});
</script>
@endsection