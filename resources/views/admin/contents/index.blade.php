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
                            <h4 class="">Grade</h4>
                            <hr>
                            <p class="card-text">Note: You can add, delete, or change the name grade levels and orders at any time to accommodate changes in your content or audience. if you want to add/delete or edit please click here (jump to grade section) or click grade on left top side of the menu.</p>
                            <a href="{{ route('admin.grades.index') }}" class="btn btn-light">
                                Learn More
                            </a>
                        </div>
                    </div>
                    <div class="card text-white bg-card-secondary mt-3">
                        <div class="card-body">
                            <h4 class="">Subject</h4>
                            <hr>
                            <p class="card-text">Note: You can add, delete, or change the name grade levels and orders at any time to accommodate changes in your content or audience. if you want to add/delete or edit please click here (jump to grade section) or click grade on left top side of the menu.</p>
                            <a href="{{ route('admin.subjects.index') }}" class="btn btn-light">
                                Learn More
                            </a>
                        </div>
                    </div>
                    <div class="card text-white bg-card-primary mt-3">
                        <div class="card-body">
                            <h4 class="">Course</h4>
                            <hr>
                            <p class="card-text">Note: You can add, delete, or change the name grade levels and orders at any time to accommodate changes in your content or audience. if you want to add/delete or edit please click here (jump to grade section) or click grade on left top side of the menu.</p>
                            <a href="{{ route('admin.courses.index') }}" class="btn btn-light">
                                Learn More
                            </a>
                        </div>
                    </div>
                    <div class="card text-white bg-card-secondary mt-3">
                        <div class="card-body">
                            <h4 class="">Lesson</h4>
                            <hr>
                            <p class="card-text">Note: You can add, delete, or change the name grade levels and orders at any time to accommodate changes in your content or audience. if you want to add/delete or edit please click here (jump to grade section) or click grade on left top side of the menu.</p>
                            <a href="{{ route('admin.lessons.index') }}" class="btn btn-light">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection