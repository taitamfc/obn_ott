@extends('website.layouts.master')
@section('title')
{{__('account.history')}}
@endsection
@section('content')
<!-- dashboardarea__area__start  -->
<div class="dashboardarea sp_bottom_100">
    @include('website.dashboards.dashboard-wraper')
    <div class="dashboard">
        <div class="container-fluid full__width__padding">
            <div class="row">
                @include('website.dashboards.dashboard-inner')
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="dashboard__content__wraper">
                        <div class="dashboard__section__title">
                            <h4>{{__('account.history')}}</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <div class="dashboard__table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>{{__('account.name')}}</th>
                                                <th>{{__('account.price')}}</th>
                                                <th>{{__('account.payment-method')}}</th>
                                                <th>{{__('account.type')}}</th>
                                                <th>{{__('account.date')}}</th>
                                                <th>{{__('account.status')}}</th>
                                            </tr>
                                        </thead>
                                        @if(count($orders))
                                        
                                        <tbody>
                                            @foreach($orders as $key => $order)
                                            <tr>
                                                <td>{{ $key +1 }}</td>
                                                <td>{{ getItemName($order->type, $order->item_id) }}</td>
                                                <td>${{ number_format($order->price) }}</td>
                                                <td>{{ $order->payment_method }}</td>
                                                <td>{{ $order->type }}</td>
                                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                                <td>{{ $order->status }}</td>
                                            </tr>
                                      @endforeach
                                      @else
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <p>{{__('sys.no_item_found')}}</p>
                                                    </td>
                                                </tr>
                                            @endif
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

</div>
<!-- dashboardarea__area__end   -->

@endsection
@php
function getItemName($type, $item_id) {
switch ($type) {
case 'course':
return \App\Models\Course::find($item_id)->name;
case 'subscription':
return \App\Models\Subscription::find($item_id)->name;
// Add cases for other types if needed
default:
return $item_id;
}
}
@endphp