@extends('admin.layouts.master')
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
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    @include("stores.subscriptions.$form")
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
                                                    class="text-primary">
                                                    <i class="ti-pencil mr-1 btn btn-success"></i>
                                                </a>
                                                <a href="javascript:;" class="text-danger delete-item"
                                                    data-id="{{ $item->id }}"
                                                    data-action="{{ route('subscriptions.destroy',$item->id) }}">
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
    // Handle delete
    jQuery(".delete-item").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        let action = ele.data('action');
        if (confirm("Are you sure?")) {
            handleDelete(action, ele);
        }
    });

    // Handle add item
    jQuery("body").on("click", ".add-item", function(e) {
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
                        jQuery('.input-' + key).find('.input-error').html(res.errors[key][
                            0
                        ]);
                    }
                    showAlertError('Has Problems, Please Try Again')
                }
                if (res.success) {
                    showAlertSuccess(res.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1200);
                }
            }
        });
    });

    // Handle Update
    jQuery("body").on("click", ".edit-item", function(e) {
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
                    showAlertError('Has Problems, Please Try Again')
                }
                if (res.success) {
                    showAlertSuccess(res.message);
                    setTimeout(() => {
                        window.location.href = res.redirect;
                    }, 1200);
                }

            }
        });
    });
});
</script>
@endsection