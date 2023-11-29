@extends('admin.layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner">
        <div class="row">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card_title mb-0">Page Detail</h5>
                        </div>
                        <div class="card-block">
                            <div class="view-info">
                                <div class="general-info">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Title</th>
                                                            <td>{{ $item->title }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Slug</th>
                                                            <td>{{ $item->slug }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Status</th>
                                                            <td>{!! $item->status_fm !!}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text mb-0">Description</h5>
                                </div>
                                <div class="card-block user-desc">
                                    <div class="view-desc">
                                        {!! $item->description !!}
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