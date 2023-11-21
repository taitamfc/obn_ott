@extends('layouts.master')

@section('header')
<style>
#lesson .lesson-content li {
    font-size: 16px;
    margin-bottom: 10px;
    float: left;
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
                        <h5 class="mr-4 mb-0 font-weight-bold">Upload Lesson</h5>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ route('lessons.index') }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form id="createLesson" action="{{ route('lessons.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row vertical_tabs">
                                <div class="col-lg-3 nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">

                                    <a class="nav-link active" id="v-lesson-setting-tab" data-toggle="pill"
                                        href="#v-lesson-setting" role="tab" aria-controls="v-lesson-setting"
                                        aria-selected="true"><i class="fa fa-cog mr-1"></i> Lesson Setting </a>

                                    <a class="nav-link" id="v-video-setting-tab" data-toggle="pill"
                                        href="#v-video-setting" role="tab" aria-controls="v-video-setting"
                                        aria-selected="false"><i class="fa fa-youtube-play"></i> Video Setting</a>

                                    <a class="nav-link" id="v-image-setting-tab" data-toggle="pill"
                                        href="#v-image-setting" role="tab" aria-controls="v-image-setting"
                                        aria-selected="false"><i class="fa fa-picture-o"></i> Image Setting</a>
                                </div>
                                <div class="tab-content col-lg-9" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-lesson-setting" role="tabpanel"
                                        aria-labelledby="v-lesson-setting-tab">
                                        @include('lessons.tabs.lesson-setting')
                                    </div>
                                    <div class="tab-pane fade" id="v-video-setting" role="tabpanel"
                                        aria-labelledby="v-video-setting-tab">
                                        @include('lessons.tabs.video-setting')
                                    </div>

                                    <div class="tab-pane fade" id="v-image-setting" role="tabpanel"
                                        aria-labelledby="v-image-setting-tab">
                                        @include('lessons.tabs.image-setting')
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class='btn btn-primary add-item float-right'>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
jQuery(document).ready(function() {
    // Handle Add
    jQuery('body').on('click', ".add-item", function(e) {
        e.preventDefault();
        let formCreate = jQuery(this).closest('#createLesson');
        formCreate.find('.input-error').empty();
        var url = formCreate.prop('action');
        let formData = new FormData($('#createLesson')[0]);
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
        }).done(function(res) {
            if (res.has_errors) {
                for (const key in res.errors) {
                    showAlertError(res.errors[key][0]);
                }
            }
            if (res.redirect) {
                showAlertSuccess(res.message);
                setTimeout(() => {
                    window.location.href = res.redirect;
                }, 1000);
            }
        });
    });
});
</script>
@endsection