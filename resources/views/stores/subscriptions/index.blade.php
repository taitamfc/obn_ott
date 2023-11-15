@extends('layouts.master')
@section('content')
<div class="main-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Subscriptions</h5>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ route('home') }}">{{ __('sys.back') }}</a>
                        <!-- <button data-toggle="modal" data-target="#modalCreate" class="btn btn-primary">
							{{ __('sys.add_new') }}
						</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <form id="formCreate" action="{{ route('subscriptions.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group input-name">
                                        <label for="name" class="col-form-label">Name</label>
                                        <input class="form-control" type="text" name="name" value="" id="name">
                                        <div class="input-error text-danger">@error('name') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group input-price">
                                        <label for="price" class="col-form-label">Price</label>
                                        <input class="form-control" type="text" name="price" value="" id="price">
                                        <div class="input-error text-danger">@error('price') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="duration" class="col-form-label">Duration</label>
                                        <select name="duration" id="duration" class="form-control">
                                            <option value="Month">Month</option>
                                            <option value="Year">Year</option>
                                        </select>
                                        <div class="input-error text-danger">@error('duration') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="course" class="col-form-label">Course</label>
                                        <select name="course[]" id="course" class="form-control" multiple>
                                            <option value="">Select Course</option>
                                            @foreach ($courses as $id => $courseName)
                                            <option value="{{ $id }}">{{ $courseName }}</option>
                                            @endforeach
                                        </select>
                                        <span class="btn btn-primary mt-4">Add more Courses</span>
                                    </div>
                                </div>

                                <button class="btn btn-primary add-item" type='button'>Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title">Current subscriptions</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">NAME</th>
                                            <th scope="col">PRICE</th>
                                            <th scope="col">DURATION</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                        <tr class="item" id='item-{{ $item->id}}'>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->duration }}</td>
                                            <td>
                                                <a href="{{ route('subscriptions.edit', $item->id) }}"
                                                    data-id="{{ $item->id }}" class="text-primary show-form-edit">
                                                    <i class="ti-pencil mr-1 btn btn-success"></i>
                                                </a>


                                                <a href="javascript:;" class="text-danger delete-item"
                                                    data-id="{{ $item->id }}">
                                                    <i class="ti-trash btn btn-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hoverable Rows Table end -->
    </div>
</div>
@endsection

@section('footer')
<script>
jQuery(document).ready(function() {
    // Xu ly xoa
    jQuery(".delete-item").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        let action = ele.data('action');
        if (confirm("Are you sure?")) {
            handleDelete(action,ele);
        }
    });

    // Xu ly them moi
    jQuery(".add-item").click(function(e) {
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
                }
                if (res.success) {
                    window.location.reload();
                }

            }
        });
    });


    // Xu ly form edit
    // jQuery('.show-form-edit').click(function() {
    //     jQuery('#modalUpdate').modal('show');
    //     let formUpdate = jQuery('#formUpdate');
    //     let id = jQuery(this).data('id');
    //     let action = jQuery(this).data('action');
    //     var url = 'subscriptions/' + id;
    //     jQuery.ajax({
    //         url: url,
    //         type: "GET",
    //         dataType: 'json',
    //         success: function(res) {
    //             if (res.success) {
    //                 let formData = res.data;
    //                 formUpdate.prop('action', action);
    //                 formUpdate.find('.input-id').val(formData.id);
    //                 formUpdate.find('.input-name input').val(formData.name);
    //                 formUpdate.find('.input-price input').val(formData.price);
    //                 formUpdate.find('.input-duration input').val(formData.duration);
    //                 formUpdate.find('.input-status input').prop('checked', false);
    //                 if (formData.status) {
    //                     formUpdate.find('.input-status .input-active').prop('checked',
    //                         true);
    //                 } else {
    //                     formUpdate.find('.input-status .input-inactive').prop('checked',
    //                         true);
    //                 }
    //             }
    //         }
    //     });
    // })
});
</script>
@endsection