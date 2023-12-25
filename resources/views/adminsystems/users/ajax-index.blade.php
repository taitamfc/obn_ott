@if( count($users) )
<!-- User -->
{{-- <div class="row mb-4">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                <h5 class="mr-4 mb-0 font-weight-bold">Users</h5>
            </div>
            <div class="buttons">
                <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
</div>
</div>
</div>
</div> --}}
{{-- <div class="row"> --}}
<!-- Progress Table start -->
{{-- <div class="col-12 mt-4"> --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover progress-table text-left ">
                <thead class="text-uppercase">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">{{__('admin-account.name')}}</th>
                        <th scope="col">{{__('admin-account.email')}}</th>
                        <th scope="col">{{__('admin-account.created_at')}}</th>
                        <th scope="col">{{__('admin-account.information')}}</th>
                        <th scope="col">{{__('admin-account.plan_type')}}</th>
                        <th scope="col">{{__('admin-account.status')}}</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="item">
                    @foreach($users as $user)
                    <tr class="item plan-item draggable" id='item-{{ $user->id}}'>
                        <th scope="row">{{ $user->id }}</th>
                        <td><img class="avatar-md img-thumbnail mr-2" src="{{ asset($user->image_url_fm) }} "
                                alt="AVT">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td class="plan_name">
                            @if($user->activePlan)
                            {{ $user->activePlan->plan->name }}</br>Expired : {{ date('d-m-Y',strtotime($user->activePlan->expiration_date)) }}
                            @endif
                        </td>
                        <td>
                            <select data-user_id="{{ $user->id }}" class="form-control select_plan" onchange=" return confirm('Are you sure?')">
                                <option value="">No Plan</option>
                                @foreach($plans as $plan)
                                <option @selected(@$user->activePlan->plan_id == $plan->id) value="{{$plan->id}}">{{$plan->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="status">
                                <option @selected($user->status == \App\Models\User::ACTIVE) value="{{ \App\Models\User::ACTIVE }}">Active</option>
                                <option @selected($user->status == \App\Models\User::INACTIVE) value="{{ \App\Models\User::INACTIVE }}">InActive</option>
                            </select>
                        </td>
                        <td>
                            <a href="javascript:;" class="btn btn-danger delete-item" data-id="{{ $user->id }}"
                                data-action="{{ route('adminsystem.users.destroy',$user->id) }}">
                                <i class="ti-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class=" card-footer">
        {{ $users->appends(request()->query())->links() }}
    </div>
</div>
{{-- </div> --}}
{{-- </div> --}}
@else
<div class="text-center pt-5 pb-5">{{ __('sys.no_data') }}</div>
@endif