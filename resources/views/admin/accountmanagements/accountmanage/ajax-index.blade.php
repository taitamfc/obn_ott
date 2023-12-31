<div class="row">
    <div class="col-lg-12">
        <div class="cover-profile">
            <div class="profile-bg-img">
                <div class="card-block user-info">
                    <div class="col-md-12">
                        <div class="media-left">
                            <a href="#" class="profile-image">
                                <img class="user-img img-radius" src="{{ asset(Auth::user()->image_url) }}"
                                    alt="user-img">
                            </a>
                        </div>
                        <div class="media-body row">
                            <div class="col-lg-12">
                                <div class="user-title">
                                    <h2>{{ Auth::user()->name }}</h2>
                                    <span class="text-white">{{ Auth::user()->group_names }}</span>
                                </div>
                            </div>
                            <div>
                                <div class="pull-right cover-btn">
                                    <a class="btn btn-light show-form-edit-avatar"
                                        data-action="{{ route('admin.users.avatar') }}">
                                        <i class="icofont icofont-ui-messaging"></i> {{__('admin-account.avatar')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <!-- Account Information -->
    <div class="card-header d-flex justify">
        <div class="col-sm-6">
            <h4>{{__('admin-account.current-account-information')}}</h4>
        </div>
        <div class="col-sm-6 text-right" style="float:right">
            <a href="javascript:;" data-id="{{ $item->id }}" data-action="{{ route('admin.users.update',$item->id) }}"
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
                            {{__('admin-account.name')}}
                            </th>
                            <th class="col-sm-4">
                            {{__('admin-account.email-address')}}
                            </th>
                            <th class="col-sm-4">
                            {{__('admin-account.phone-number')}}
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
    <!-- Current Plan -->
    <div class="card-header d-flex justify">
        <div class="col-sm-6">
            <h4> {{__('admin-account.current-plan')}}</h4>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('admin.users.plans') }}"><i class="fa fa-edit"></i></a>
        </div>
    </div>
    <div class="card-body ml-4">
        <div class="billing_info">
            @if(!empty($current_plan))
            <div class="row">
                <table class="table table-hover progress-table text-left ">
                    <thead class="text-uppercase">
                        <tr>
                            <th class='col-sm-3'>
                            {{__('admin-account.name')}}
                            </th>
                            <th class='col-sm-3'>
                            {{__('admin-account.price')}}
                            </th>
                            <th class='col-sm-3'>
                            {{__('admin-account.start-date')}}
                            </th>
                            <th class='col-sm-3'>
                            {{__('admin-account.expiration-date')}}
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
            @endif
        </div>
    </div>
    <!-- Billing Information -->
    <div class="card-header d-flex justify">
        <div class="col-sm-6">
            <h4>{{__('admin-account.current-account-information')}}</h4>
        </div>
        <div class="col-sm-6 text-right" style="float:right">
            <a href="{{ route('admin.userbank.index') }}"><i class="fa fa-edit"></i></a>
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
                            {{__('admin-account.name')}}
                            </th>
                            <th class='col-sm-3'>
                            {{__('admin-account.bank')}}
                            </th>
                            <th class='col-sm-3'>
                            {{__('admin-account.bank-number')}}
                            </th>
                            <th class='col-sm-3'>
                            {{__('admin-account.address')}}
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
            <div class="row" onclick="window.location.href='{{ route('admin.userbank.index') }}'">
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
@include('admin.accountmanagements.accountmanage.edit-avatar')
@include('admin.accountmanagements.accountmanage.edit')