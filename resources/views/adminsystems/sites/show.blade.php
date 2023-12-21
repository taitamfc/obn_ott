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
                            <h5 class="mr-4 mb-0 font-weight-bold">Show Site</h5>
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
                    <div class="card subject-table-results">
                        <div class="text-center pt-5 pb-5">
                            <div style="
                            justify-content: center;
                            align-content: center;
                            align-items: center;
                            display: flex;
                        " class="card-body">
                                <div class="col-lg-6">
                                    <form action="{{route('adminsystem.site.updateSitePlan')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                          <label style="display:flex;" for="name">Site Name</label>
                                          <input type="hidden" class="form-control" name="site_id" id="site_id" value="{{$SiteResource->id}}" readonly>
                                          <input type="text" class="form-control" name="name" id="name" value="{{$SiteResource->name}}" readonly>
                                        </div>
                                        <div class="form-group">
                                          <label style="display:flex;" for="slug">Slug</label>
                                          <input type="text" class="form-control" name="slug" id="slug" value="{{$SiteResource->slug}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label style="display:flex;" for="user">User</label>
                                            <input type="text" class="form-control" name="user" id="user" value="{{$SiteResource->user->name}}" readonly>
                                            <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{$SiteResource->user->id}}">
                                        </div>
                                        <div class="form-group">
                                            <label style="display:flex;" for="status">Status</label>
                                            <select class="form-control" name="status" id="">
                                                <option @selected($SiteResource->status == 1)  value="1"><span class="badge badge-success">Active</span></option>
                                                <option @selected($SiteResource->status == 0) value="0"><span class="badge badge-danger">InActive</span></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="display:flex;" for="plan">Plans</label>
                                            <select class="form-control" name="plan_id" id="">
                                                @foreach ($planName as $plan )
                                                    <option @selected($current_Plan == $plan['id']) value="{{$plan['id']}}">{{$plan['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- Progress Table end -->
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection
@section('footer')
<script>
var indexUrl = "{{ route('adminsystem.sites.index') }}";
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
                    formUpdate.find('.input-slug input').val(formData.slug);
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
    })
});
</script>
@endsection