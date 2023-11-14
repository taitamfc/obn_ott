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
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <style>
            #billing_imfomation {}
            </style>
            <div id="billing_imfomation">
                <div class="card">
                    <div class="card-header d-flex justify">
                        <div class="col-sm-6">
                            <h4>Current Account Information</h4>
                        </div>
                        <div class="col-sm-6 text-right" style="float:right">
                            <a href="javascript:;" data-id="{{ $item->id }}"
                                data-action="{{ route('users.update',$item->id) }}" class="text-primary show-form-edit">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body ml-4">
                        <div class="billing_info">
                            <div class="row">
                                <table class="table table-hover progress-table text-left ">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th class="col-sm-4">
                                                Name
                                            </th>
                                            <th class="col-sm-4">
                                                Email Address
                                            </th>
                                            <th class="col-sm-4">
                                                Phone Number
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header d-flex justify">
                        <div class="col-sm-6">
                            <h4>Current Plan</h4>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{ route('users.plans') }}"><i class="fa fa-edit"></i></a>
                        </div>
                    </div>
                    <div class="card-body ml-4">
                        <div class="billing_info">
                            <div class="row">
                                <table class="table table-hover progress-table text-left ">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th class='col-sm-3'>
                                                Name
                                            </th>
                                            <th class='col-sm-3'>
                                                Price
                                            </th>
                                            <th class='col-sm-3'>
                                                Start date
                                            </th>
                                            <th class='col-sm-3'>
                                                Expiration date
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $current_plan->plan->name }}</td>
                                            <td>{{ $current_plan->plan->price }}</td>
                                            <td>{{ $current_plan->created_at }}</td>
                                            <td>{{ $current_plan->expiration_date }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header d-flex justify">
                        <div class="col-sm-6">
                            <h4>Current Account Information</h4>
                        </div>
                        <div class="col-sm-6 text-right" style="float:right">
                            <a href="{{ route('userbank.index') }}"><i class="fa fa-edit"></i></a>
                        </div>
                    </div>
                    <div class="card-body ml-4">
                        <div class="billing_info">
                            @if(!empty($bankOwner))
                            <div class="row">
                                <table class="table table-hover progress-table text-left ">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th class='col-sm-3'>
                                                Name
                                            </th>
                                            <th class='col-sm-3'>
                                                Bank
                                            </th>
                                            <th class='col-sm-3'>
                                                Bank Number
                                            </th>
                                            <th class='col-sm-3'>
                                                Address
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $bankOwner->bank_owner }}</td>
                                            <td>{{ $bankOwner->bank_name }}</td>
                                            <td>{{ $bankOwner->bank_number }}</td>
                                            <td>{{ $bankOwner->address }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="row" onclick="window.location.href='{{ route('userbank.index') }}'">
                                <div class=" col-sm-6">
                                    <div class="col-sm-4">
                                        <a href="" data-toggle="modal" data-target="#modalCreate">
                                            <img src="https://image.vietstock.vn/2018/08/08/visa-mastercard-amex-discover-icon.png"
                                                alt="">
                                        </a>
                                    </div>

                                </div>
                                <div class=" col-sm-6">
                                    <div class="col-sm-4">
                                        <img src="https://ott.rrtech247.com/public/assets/studio/images/Paypal-logo.png"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            @endif
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
    jQuery(".sortable-table").sortable({
        update: function(event, ui) {
            var data = $(this).sortable('serialize');
            // POST to server using $.post or $.ajax
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                type: 'POST',
                url: ""
            })
        }
    });


    // Delete item
    jQuery(".delete-item").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        var id = ele.data("id");
        if (confirm("Are you sure?")) {
            var url = 'users/' + id;
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: "POST",
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    ele.closest('.item').remove(); // Xóa phần tử khỏi DOM
                }
            });
        }
    });

    // Add new account
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

    // Update account
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

    // show form edit with value default
    jQuery('.show-form-edit').click(function() {
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
    })
});
</script>
@endsection