@if( count($users) )
<!-- User -->
<div class="row mb-4">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                <h5 class="mr-4 mb-0 font-weight-bold">My Admin</h5>
                <div class="d-flex align-items-baseline dashboard-breadcrumb">
                    <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                    <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                    <p class="text-muted mb-0 mr-1 hover-cursor">My Admin</p>
                </div>
            </div>
            <div class="buttons">
                <button data-toggle="modal" data-target="#modalCreateUser"
                    class="btn  btn-primary float-right">{{ __('sys.add_new') }}</button>
                <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Progress Table start -->
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-left ">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Account Type</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="sortable-table ">
                            @foreach($users as $user)
                            <tr class="item draggable" id='item-{{ $user->id}}'>
                                <th scope="row">{{ $user->id }}</th>
                                <td><img class="avatar-md img-thumbnail mr-2" src="{{ asset($user->image_url_fm) }} "
                                        alt="AVT">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->group_names }}</td>
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3">
                                            <a href="javascript:;" data-id="{{ $user->id }}"
                                                data-action="{{ route('admin.users.update',$user->id) }}"
                                                class="btn btn-primary show-form-edit-user">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" class="btn btn-danger delete-user"
                                                data-action="{{ route('admin.users.destroy',$user->id) }}">
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
@else
<div class="text-center pt-5 pb-5">{{ __('sys.no_data') }}</div>
@endif
@if( count($groups) )
<!-- Group -->
<div class="row mb-4 mt-4">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                <h5 class="mr-4 mb-0 font-weight-bold">My Role</h5>
                <div class="d-flex align-items-baseline dashboard-breadcrumb">
                    <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                    <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                    <p class="text-muted mb-0 mr-1 hover-cursor">My Role</p>
                </div>
            </div>
            <div class="buttons">
                <button data-toggle="modal" data-target="#modalCreate" class="btn  btn-primary float-right">
                    {{ __('sys.add_new') }}</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Progress Table start -->
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-left ">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="sortable-table ">
                            @foreach($groups as $group)
                            <tr class="item draggable" id='item-{{ $group->id}}'>
                                <td>{{ $group->name }}</td>
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3">
                                            <a href="javascript:;" data-id="{{ $group->id }}"
                                                data-action="{{ route('admin.groups.update',$group->id) }}"
                                                class="btn btn-primary show-form-edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" class="btn btn-danger delete-item"
                                                data-id="{{ $group->id }}"
                                                data-action="{{ route('admin.groups.destroy',$group->id) }}">
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
@else
<div class="text-center pt-5 pb-5">{{ __('sys.no_data') }}</div>
@endif
@include('admin.accountmanagements.users.groups.create')
@include('admin.accountmanagements.users.groups.edit')