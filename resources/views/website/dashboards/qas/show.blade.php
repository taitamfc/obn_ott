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
                            <h4>{{$item->title}}</h4>
                            <a href="{{ route('website.q-a', ['site_name' => $site_name]) }}"
                                class="btn btn-primary">{{__('account.back')}}</a>
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

                                        <h5><strong>{{__('account.question')}}</strong></h5>
                                        <p>{!! $item->question !!}</p>
                                        
                                        @if($item->answer)
                                        <h5><strong>{{__('account.answer')}}</strong></h5>
                                        <p>{!! $item->answer !!}</p>
                                        @else
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <p>{{__('sys.no_item_found')}}</p>
                                            </td>
                                        </tr>
                                        @endif

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