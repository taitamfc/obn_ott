@extends('layouts.master')
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
                    <div class="buttons">

                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <style>
            #billing_imfomation {}
            </style>
            <div id="billing_imfomation">
                <div class="card mt-4">
                    <div class="card-header d-flex justify">
                        <div class="col-sm-6">
                            <h4>SELECT A NEW BILLING METHOD</h4>
                        </div>
                        <!-- <div class="col-sm-6 text-right" style="float:right">
                            <a href="">Edit</a>
                        </div> -->
                    </div>
                    <div class="card-body">
                        <div class="billing_info">
                            <div class="row">
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
                        </div>
                    </div>
                </div>
            </div>

            <div id="billing_imfomation">
                <div class="card mt-4">
                    <div class="card-header d-flex justify">
                        <div class="col-sm-6">
                            <h4>CREDIT CARD INFO</h4>
                        </div>
                        <div class="col-sm-6 text-right" style="float:right">
                            <a href="">Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover progress-table text-left ">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Bank Nam</th>
                                        <th scope="col">Bank Number</th>
                                        <th scope="col">Bank Owner</th>
                                        <th scope="col">STREET ADDRESS</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="sortable-table ">
                                    @foreach($items as $item)
                                    <tr class="item draggable" id='item-{{ $item->id}}'>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->bank_name }}</td>
                                        <td>{{ $item->bank_number}}</td>
                                        <td>{{ $item->bank_owner }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3">
                                                    <a href="javascript:;" data-id="{{ $item->id }}"
                                                        data-action="{{ route('grades.update',$item->id) }}"
                                                        class="btn btn-primary show-form-edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" class="btn btn-danger delete-item"
                                                        data-id="{{ $item->id }}"
                                                        data-action="{{ route('grades.destroy',$item->id) }}">
                                                        <i class="ti-trash"></i>
                                                    </a>
                                                </li>
                                            </ul>
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
        @include('accountmanagements.billings.create')
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


    // Xu ly xoa
    jQuery(".delete-item").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        var id = ele.data("id");
        if (confirm("Are you sure?")) {
            var url = 'userbank/' + id;
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

    // Xu ly them moi
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

    // Xu ly form edit
    jQuery('.show-form-edit').click(function() {
        // alert(123)
        // Hien thi modal
        jQuery('#modalUpdate').modal('show');
        let formUpdate = jQuery('#formUpdate');
        // Lấy dữ liệu
        let id = jQuery(this).data('id');
        let action = jQuery(this).data('action');
        var url = 'userbank/' + id;
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