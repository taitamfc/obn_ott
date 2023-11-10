@extends('layouts.master')
@section('header')
<style>
select.form-control:not([size]):not([multiple]) {
    height: auto;
}
</style>
@endsection
@section('content')
{{  
    dd($items);
}}
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Class</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Class</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <div id="class">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="filer-class">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <form action="{{ route('classes.students') }}" method='get'
                                                class='d-flex justify-content-center align-items-center'>
                                                <input class="form-control mr-3" type="text" name="searchName"
                                                    placeholder="Search student">
                                                <button type='submit'><i class="ti-search"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-sm-4 text-center">
                                            <div class="form-group">
                                                <form action="{{ route('classes.students') }}" method='get'>
                                                    <input type="hidden" name="viewAll" value='viewAll'>
                                                    <button class="btn btn-primary">View All</button>
                                                </form>
                                            </div>
                                        </div>
                                        <form class="col-sm-4" action="" method="get">
                                            <select class="form-control" onchange="this.form.submit()" name='course'
                                                id='course'>
                                                <option>Select course</option>
                                                @foreach($courses as $course)
                                                <option value='{{ $course->id }}'>{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-left ">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Course view count</th>
                                                    <th scope="col">Last view</th>
                                                </tr>
                                            </thead>
                                            <tbody>

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
@endsection