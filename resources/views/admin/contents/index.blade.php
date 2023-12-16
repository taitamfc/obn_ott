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
                    <div class="blog_card_date col-4 mt-3 ml-3">
                        <img src="{{ asset('assets/images/grades.PNG') }}" alt="grades">
                    </div>
                    <div class="blog_card_description col-8">
                        <div class="blog_data">
                            <h3>There are many variations of passages of Lorem</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standardbook.</p>
                        </div>
                    </div>
                </div>
                <div class="rt_post_data col-12">
                    <div class="blog_card_date col-4 mt-3 ml-3">
                        <img src="{{ asset('assets/images/grades.PNG') }}" alt="grades">
                    </div>
                    <div class="blog_card_description col-8">
                        <div class="blog_data">
                            <h3>There are many variations of passages of Lorem</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standardbook.</p>
                        </div>
                    </div>
                </div>
                <div class="rt_post_data col-12">
                    <div class="blog_card_date col-4 mt-3 ml-3">
                        <img src="{{ asset('assets/images/grades.PNG') }}" alt="grades">
                    </div>
                    <div class="blog_card_description col-8">
                        <div class="blog_data">
                            <h3>There are many variations of passages of Lorem</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standardbook.</p>
                        </div>
                    </div>
                </div>
                <div class="rt_post_data col-12">
                    <div class="blog_card_date col-4 mt-3 ml-3">
                        <img src="{{ asset('assets/images/grades.PNG') }}" alt="grades">
                    </div>
                    <div class="blog_card_description col-8">
                        <div class="blog_data">
                            <h3>There are many variations of passages of Lorem</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standardbook.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection