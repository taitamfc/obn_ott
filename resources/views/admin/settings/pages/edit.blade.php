@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.pages') }}
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-setting.update-page')}}</h5>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ route('admin.pages.index') }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form id="formUpdate" action="{{ route('admin.pages.update',$item->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group input-title-update">
                                <label for="title" class="col-form-label">{{__('admin-setting.title')}}</label>
                                <input class="form-control" type="text" id="title" name='title'
                                    value="{{ old('title') ? old('title') : $item->title }}">
                                <div class="input-error text-danger">@error('title') {{ $message }} @enderror</div>
                            </div>
                            <div class="form-group input-description-update">
                                <label for="description" class="col-form-label">{{__('admin-setting.description')}}</label>
                                <textarea class="form-control" type="text" id="description"
                                    name='description'>{!! old('description') ? old('description') : $item->description !!}</textarea>
                                <div class="input-error text-danger">@error('description') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="form-group input-status-update">
                                <label for="status" class="col-form-label">{{__('admin-setting.status')}}</label>
                                <div style="display: flex">
                                    <div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
                                        <input type="radio" checked id="e-active" name="status"
                                            class="custom-control-input input-active" value='1'>
                                        <label class="custom-control-label" for="e-active">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
                                        <input type="radio" id="e-inactive" name="status"
                                            class="custom-control-input input-inactive" value='0'>
                                        <label class="custom-control-label" for="e-inactive">Inactive</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class='btn btn-primary update-item float-right'>{{__('admin-setting.save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('description');
jQuery(document).ready(function() {
    // Handle Update
    jQuery('body').on('click', ".update-item", function(e) {
        e.preventDefault();
        let formUpdate = jQuery(this).closest('#formUpdate');
        formUpdate.find('.input-error').empty();
        var url = formUpdate.prop('action');
        let formData = new FormData($('#formUpdate')[0]);
        var desc = CKEDITOR.instances.description.getData();
        formData.append('description', desc);
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
                    window.location.href = "{{ route('admin.pages.index') }}";
                }

            }
        });
    });
});
</script>
@endsection