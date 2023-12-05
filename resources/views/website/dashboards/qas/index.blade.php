@extends('website.layouts.master')
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
                            <h4>Q&A</h4>
                            <a href="{{ route('website.q-a.create', ['site_name' => $site_name]) }}"
                                class="btn btn-primary">Composer</a>
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
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Date</th>
                                                <th>View</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                            <tr>
                                                <td>
                                                    <p>{{ $item->id }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $item->title }}</p>
                                                </td>
                                                <td>
                                                    <p>{{  $item->student->name  }}</p>
                                                </td>

                                                <td>
                                                    <p>{{ $item->created_at->format('d/m/Y') }}</p>
                                                </td>
                                                <td>
                                                    <p>0</p>
                                                </td>
                                             
                                                <td>
                                                    @if($item->answer)
                                                        <a href="{{ route('website.q-a.show', ['site_name' => $site_name, 'id' => $item->id]) }}">
                                                            <i class="icofont-eye" title="Show Details"></i>
                                                        </a>
                                                    @endif
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