@extends('website.layouts.master')
@section('title')
Q&A
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
                            <h4>{{__('account.qas')}}</h4>
                            <a href="{{ route('website.q-a.create', ['site_name' => $site_name]) }}"
                                class="btn btn-primary">{{__('account.composer')}}</a>
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
                                                <th>{{__('account.author')}}</th>
                                                <th>{{__('account.date')}}</th>
                                                <th>{{__('account.view')}}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($items))
                                            @foreach($items as $key => $item)
                                            <tr>
                                                <td>
                                                    <p>{{ $key +1 }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $item->title }}</p>
                                                </td>
                                                <td>
                                                    <p>{{  $item->student->name  }}</p>
                                                </td>

                                                <td>
                                                    <p>{{ $item->created_at->format('d/m/Y h:i a') }}</p>
                                                </td>
                                                <td>
                                                    <p>0</p>
                                                </td>

                                                <td>
                                                    @if($item->answer)
                                                    <a
                                                        href="{{ route('website.q-a.show', ['site_name' => $site_name, 'id' => $item->id]) }}">
                                                        <i class="icofont-eye" title="Show Details"></i>
                                                    </a>
                                                    @endif
                                                </td>
                                                </td>
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