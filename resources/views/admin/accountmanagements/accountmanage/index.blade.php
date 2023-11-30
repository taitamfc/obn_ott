@extends('admin.layouts.master')
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
        <div class="card information-table-results">
            <div class="text-center">{{ __('sys.loading_data') }}</div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
jQuery(document).ready(function() {
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
                    showAlertError('Has Problems, Please Try Again!');
                }
                if (res.success) {
                    showAlertSuccess('Update success');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1200);
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

    // show form edit with value default
    jQuery('body').on('click', ".show-form-edit-avatar", function(r) {
        jQuery('#modalUpdateAvatar').modal('show');
        let formUpdate = jQuery('#formUpdateAvatar');
        let action = jQuery(this).data('action');
        formUpdate.prop('action', action);
    });

    // Update account
    jQuery('body').on('click', ".edit-avatar", function(e) {
        let formUpdateAvatar = jQuery(this).closest('#formUpdateAvatar');
        formUpdateAvatar.find('.input-error').empty();
        var url = formUpdateAvatar.prop('action');
        let formData = new FormData($('#formUpdateAvatar')[0]);
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
                        jQuery('.input-' + key).find('.input-error').html(res.errors[key][
                            0
                        ]);
                    }
                    showAlertError('Has Problems, Please Try Again!');
                }
                if (res.success) {
                    showAlertSuccess('Update success');
                    window.location.reload();
                }
            }
        });
    });
});
</script>
@endsection