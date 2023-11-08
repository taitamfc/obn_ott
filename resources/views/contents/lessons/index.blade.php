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
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Lesson</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Lesson</p>
                        </div>
                    </div>
                    <div class="buttons">
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <div id="lesson">
                <div class="card">
                    <div class="card-body">
                        <form id="createLesson" action="{{ route('lessons.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row p-3">
                                <div class="col-sm-4 line border-right">
                                    <div class="lesson-header">
                                        <h2 class="btn btn-primary">Upload Lesson</h2>
                                    </div>
                                    <div class="lesson-content">
                                        <ul class="nav nav-pill mb-2" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <li><i class="fa fa-cog"></i><a id="v-pills-video-tab" data-toggle="pill"
                                                    href="#v-pills-video" role="tab" aria-controls="v-pills-video">
                                                    Video
                                                    Setting</a></li>
                                            <li><i class="fa fa-youtube-play"></i><a id="v-pills-media-tab"
                                                    data-toggle="pill" href="#v-pills-media" role="tab"
                                                    aria-controls="v-pills-media"> Add media
                                                </a></li>
                                            <li><i class="fa fa-picture-o"></i><a id="v-pills-thumbs-tab"
                                                    data-toggle="pill" href="#v-pills-thumbs" role="tab"
                                                    aria-controls="v-pills-thumbs"> Thumbs
                                                </a></li>
                                        </ul>
                                        <div class="button">
                                            <a href="{{ route('lesson.index') }}"
                                                class="btn btn-secondary w-100 mb-2">Cancel</a>
                                            <button type="button" class='btn btn-primary w-100 add-item'>Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-video" role="tabpanel"
                                            aria-labelledby="v-pills-video-tab">
                                            <div class="lesson-header">
                                                <h2 class="btn btn-primary">Lesson Setting</h2>
                                            </div>
                                            <div class="row" id="media">
                                                <div class="col-sm-6">
                                                    <div class="form-group input-name">
                                                        <label for="" class="col-form-label">Name <span>*</span></label>
                                                        <input type="text" class="form-control" name='name' id="name">
                                                        <div class="input-error text-danger">@error('name')
                                                            {{ $message }} @enderror</div>
                                                    </div>
                                                    <div class="form-group input-subject_id">
                                                        <label for="" class="col-form-label">Subject
                                                            <span>*</span></label>
                                                        <div class="form-floating">
                                                            <select name="subject_id" id="subject_id"
                                                                class="form-control">
                                                                <option selected>Open this select subject</option>
                                                                @foreach($subjects as $subject)
                                                                <option value='{{ $subject->id }}'>{{ $subject->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-error text-danger">@error('subject_id')
                                                                {{ $message }} @enderror</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group input-subject_id">
                                                        <label for="" class="col-form-label">Couse
                                                            <span>*</span></label>
                                                        <div class="form-floating">
                                                            <select name="course_id" id="course_id"
                                                                class="form-control">
                                                                <option selected>Open this select course</option>
                                                                @foreach($courses as $course)
                                                                <option value='{{ $course->id }}'>{{ $course->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-error text-danger">@error('course_id')
                                                                {{ $message }} @enderror</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Grade
                                                            <span>*</span></label>
                                                        <div class="form-floating input-grade_id">
                                                            <select name="grade_id" id="grade_id" class="form-control">
                                                                <option selected>Open this select grade</option>
                                                                @foreach($grades as $grade)
                                                                <option value='{{ $grade->id }}'>{{ $grade->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-error text-danger">@error('grade_id')
                                                                {{ $message }} @enderror</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Description
                                                            <span>*</span></label>
                                                        <textarea name="description" id="description" cols="30" rows="5"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-media" role="tabpanel"
                                            aria-labelledby="v-pills-media-tab">
                                            <div class="lesson-header">
                                                <h2>Video Information</h2>
                                            </div>
                                            <div class="dropzone dropzone-light dz-clickable dz-started dz-max-files-reached input-video"
                                                id="">
                                                <div class="dz-default dz-message">
                                                    <span>
                                                        <input type="file" class='form-control' name='video'>
                                                    </span>
                                                </div>
                                                <div class="input-error text-danger">@error('video')
                                                    {{ $message }} @enderror</div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-thumbs" role="tabpanel"
                                            aria-labelledby="v-pills-thumbs-tab">
                                            <div class="lesson-header">
                                                <h2>Thumb Information</h2>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Thumb Image</label>
                                                <input type="file" class="form-control" name='image' id='image'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection

@section('footer')
<script>
jQuery(document).ready(function() {
    jQuery(".add-item").click(function(e) {
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
                    console.log(key);
                    jQuery('.input-' + key).find('.input-error').html(res.errors[key][0]);
                }
            }
            if (res.success) {
                window.location.reload();
            }
        });
    });
});
</script>
@endsection