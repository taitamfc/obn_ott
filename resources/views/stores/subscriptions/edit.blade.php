@extends('layouts.master')
@section('content')
<div class="main-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">Edit Subscription</h5>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ route('subscriptions.index') }}">{{ __('sys.back') }}</a>
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
                        <form id="formUpdate" action="{{ route('subscriptions.update', $item->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group input-name">
                                        <label for="name" class="col-form-label">Name</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ old('name', $item->name) }}" id="name">
                                        <div class="input-error text-danger">@error('name') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group input-price">
                                        <label for="price" class="col-form-label">Price</label>
                                        <input class="form-control" type="text" name="price"
                                            value="{{ old('price', $item->price) }}" id="price">
                                        <div class="input-error text-danger">@error('price') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="duration" class="col-form-label">Duration</label>
                                        <select name="duration" id="duration" class="form-control">
                                            <option value="Month"
                                                {{ (old('duration', $item->duration) == 'Month') ? 'selected' : '' }}>
                                                Month</option>
                                            <option value="Year"
                                                {{ (old('duration', $item->duration) == 'Year') ? 'selected' : '' }}>
                                                Year</option>
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
                                            @foreach ($courses as $course)
                                            <option @selected( in_array($course->id,$selected_courses) )
                                                value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="btn btn-primary mt-4">Add more Courses</span>
                                    </div>
                                </div>

                                <button class="btn btn-primary edit-item" type='button'>Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title">Current Active</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">SUBSCRIPTION NAME</th>
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
													data-action="{{ route('subscriptions.destroy', $item->id) }}"
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


    // Xu ly sua
    jQuery(".edit-item").click(function(e) {
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
                if (res.success) {
                    window.location.reload();
                }

            }
        });
    });
});
</script>
@endsection