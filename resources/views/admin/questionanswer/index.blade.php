@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.question') }}
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-question.question-answer')}}</h5>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}">
            {{ session('message') }}
        </div>
        @endif
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12">
                <div class="card question-table-results">
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
var indexUrl = "{{ route('admin.questionanswer.index') }}";
var positionUrl = "";
var params = <?= json_encode(request()->query()); ?>;
var wrapperResults = '.question-table-results';
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
    // jQuery('body').on('click', ".delete-item", function(e) {
    //     e.preventDefault();
    //     var ele = $(this);
    //     let action = ele.data('action');
    //     if (confirm("Are you sure?")) {
    //         handleDelete(action, ele);
    //     }
    // });

    // Xu ly them moi
    // jQuery('body').on('click', ".add-item", function(e) {
    //     let formCreate = jQuery(this).closest('#formCreate');
    //     formCreate.find('.input-error').empty();
    //     var url = formCreate.prop('action');
    //     let formData = new FormData($('#formCreate')[0]);
    //     jQuery.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: url,
    //         type: "POST",
    //         processData: false,
    //         contentType: false,
    //         data: formData,
    //         success: function(res) {
    //             if (res.has_errors) {
    //                 for (const key in res.errors) {
    //                     console.log(key);
    //                     jQuery('.input-' + key + '-create').find('.input-error').html(res
    //                         .errors[key][
    //                             0
    //                         ]);
    //                 }
    //                 showAlertError('Has Problems, Please Try Again!');
    //             }
    //             if (res.success) {
    //                 // Delete all values
    //                 $('#formCreate')[0].reset();

    //                 showAlertSuccess(res.message);
    //                 // Disable modal
    //                 jQuery('#modalCreate').modal('hide');
    //                 // Recall items
    //                 getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
    //             }

    //         }
    //     });
    // });

    // Xu ly cap nhat
    jQuery('body').on('click', ".edit-item", function(e) {
        let formUpdate = jQuery(this).closest('#formUpdate');
        formUpdate.find('.input-error').empty();
        var url = formUpdate.prop('action');
        let formData = new FormData($('#formUpdate')[0]);
        var desc = CKEDITOR.instances.answer.getData();
        formData.append('answer', desc);
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
                        jQuery('.input-' + key + '-update').find('.input-error').html(res
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
                    console.log(formData);
                    formUpdate.prop('action', action);
                    formUpdate.find('.input-id').val(formData.id);
                    // Loại bỏ thẻ HTML từ formData.question và đặt giá trị
                    let questionInput = formUpdate.find('.input-question-update input');
                    let tempDiv = document.createElement("div");
                    tempDiv.innerHTML = formData.question;
                    let textContent = tempDiv.textContent || tempDiv.innerText;
                    questionInput.val(textContent);
                }
            }
        });
    })
});
</script>
@endsection