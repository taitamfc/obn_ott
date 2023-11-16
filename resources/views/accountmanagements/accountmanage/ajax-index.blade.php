<div class="card">
    <div class="card-header d-flex justify">
        <div class="col-sm-6">
            <h4>Current Account Information</h4>
        </div>
        <div class="col-sm-6 text-right" style="float:right">
            <a href="javascript:;" data-id="{{ $item->id }}" data-action="{{ route('users.update',$item->id) }}"
                class="text-primary show-form-edit">
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
                        <img src="https://ott.rrtech247.com/public/assets/studio/images/Paypal-logo.png" alt="">
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@include('accountmanagements.accountmanage.edit')
<script>
jQuery(function() {
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
                displayMessage("Update Successfully");
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