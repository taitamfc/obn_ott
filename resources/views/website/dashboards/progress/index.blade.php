@extends('website.layouts.master')
@section('title')
{{__('account.progress')}}
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
                            <h4>{{__('account.progress')}}</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="dashboard__table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Course</th>
                                                <th>Result</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach( $courses as $course )
                                            <tr>
                                                <th>
                                                    <p>{{ date('d/m/Y',strtotime($course['course']->course->created_at)) }}</p>
                                                    <span>{{ $course['course']->course->name }}</span>
                                                </th>
                                                <td>
                                                    <span class="dashboard__td dashboard__td--cancel">
                                                        {{ $course['complete'] }} / {{ $course['total'] }}
                                                    </span>
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

</div>
<!-- dashboardarea__area__end   -->

@endsection