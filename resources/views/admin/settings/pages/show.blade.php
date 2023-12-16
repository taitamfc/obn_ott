@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.pages') }}
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner">
        <div class="row justify-content-end">
            <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
        </div>
        <div class="row">
            <div class="tab-content w-100">
                <div class="tab-pane active">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card_title mb-0">{{__('admin-setting.page-detail')}}</h5>
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
                                                            <th scope="row">{{__('admin-setting.title')}}</th>
                                                            <td>{{ $item->title }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">{{__('admin-setting.slug')}}</th>
                                                            <td>{{ $item->slug }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">{{__('admin-setting.status')}}</th>
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
                                    <h5 class="card-header-text mb-0">{{__('admin-setting.description')}}</h5>
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