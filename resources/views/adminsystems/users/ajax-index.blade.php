@if( count($users) )
<!-- User -->
<div class="row mb-4">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-account.my-admin')}}</h5>
                <div class="d-flex align-items-baseline dashboard-breadcrumb">
                    <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-themes.ott')}}</p>
                    <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                    <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-account.my-admin')}}</p>
                </div>
            </div>
            <div class="buttons">
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
                                <th scope="col">{{__('admin-account.name')}}</th>
                                <th scope="col">{{__('admin-account.email')}}</th>
                            </tr>
                        </thead>
                        <tbody class="sortable-table ">
                            @foreach($users as $user)
                            <tr class="item draggable" id='item-{{ $user->id}}'>
                                <th scope="row">{{ $user->id }}</th>
                                <td><img class="avatar-md img-thumbnail mr-2" src="{{ asset($user->image_url_fm) }} "
                                        alt="AVT">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
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
