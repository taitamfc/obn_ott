@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.setting') }}
@endsection
@section('header')
<style>
.blog_card_date {
    overflow: hidden;
}

.blog_card_date img {
    width: 100%;
    height: auto;
    object-fit: cover;
}
</style>
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-content.contents-manager-home')}}</h5>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
                        <!-- <button data-toggle="modal" data-target="#modalCreate" class="btn btn-primary">
                            {{ __('sys.add_new') }}
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card_with_image m-5">
                <div class="rt_post_data col-12">
                    <div class="card text-white bg-card-primary">
                        <div class="card-body">
                            <h4 class="">{{__('admin-content.grade')}}</h4>
                            <hr>
                            <p class="card-text">{{__('admin-content.text_grade')}}</p>
                            <a href="{{ route('admin.grades.index') }}" class="btn btn-light">
                                {{__('admin-content.learn-more')}}
                            </a>
                        </div>
                    </div>
                    <div class="card text-white bg-card-secondary mt-3">
                        <div class="card-body">
                            <h4 class="">{{__('admin-content.subject')}}</h4>
                            <hr>
                            <p class="card-text">{{__('admin-content.text_subject')}}</p>
                            <a href="{{ route('admin.subjects.index') }}" class="btn btn-light">
                                {{__('admin-content.learn-more')}}
                            </a>
                        </div>
                    </div>
                    <div class="card text-white bg-card-primary mt-3">
                        <div class="card-body">
                            <h4 class="">{{__('admin-content.course')}}</h4>
                            <hr>
                            <p class="card-text">{{__('admin-content.text_course')}}</p>
                            <a href="{{ route('admin.courses.index') }}" class="btn btn-light">
                                {{__('admin-content.learn-more')}}
                            </a>
                        </div>
                    </div>
                    <div class="card text-white bg-card-secondary mt-3">
                        <div class="card-body">
                            <h4 class="">{{__('admin-content.lesson')}}</h4>
                            <hr>
                            <p class="card-text">{{__('admin-content.text_lesson')}}</p>
                            <a href="{{ route('admin.lessons.index') }}" class="btn btn-light">
                                {{__('admin-content.learn-more')}}
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection