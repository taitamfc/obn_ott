@extends('website.layouts.master')
@section('title')
Notice
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
                            <h4>{{__('account.notice')}}</h4>
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
                                                <th>{{__('account.title')}}</th>
                                                <th>{{__('account.date')}}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $key => $item)
                                            <tr>
                                                <td>
                                                    <p>{{ $key +1 }}</p>
                                                </td>

                                                <td>
                                                    @if(!$item->is_read)
                                                    <strong>{{ $item->title }}</strong>
                                                    @else
                                                    <p>{{ $item->title }}</p>
                                                    @endif
                                                </td>

                                                <td>
                                                    <p>{{ $item->created_at->format('d/m/Y') }}</p>
                                                </td>

                                                <td>
                                                    <a
                                                        href="{{ route('website.notices.show', ['site_name' => $site_name, 'id' => $item->id]) }}">
                                                        <i class="icofont-eye" title="Show Details"></i>
                                                    </a>
                                                </td>
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

</div>
<!-- dashboardarea__area__end   -->

@endsection