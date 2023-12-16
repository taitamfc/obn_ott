@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.lesson-list') }}
@endsection
@section('header')
<link rel="stylesheet" href="{{ asset('assets/vendors/dropzone/css/dropzone.css') }}">

@endsection

@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-lesson.edit-lesson')}}: {{ $item->name }}</h5>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form id="updateLesson" action="{{ route('admin.lessons.update',$item->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="row vertical_tabs">
                                <div class="col-lg-3 nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">

                                    <a class="nav-link active" id="v-lesson-setting-tab" data-toggle="pill"
                                        href="#v-lesson-setting" role="tab" aria-controls="v-lesson-setting"
                                        aria-selected="true"><i class="fa fa-cog mr-1"></i> {{__('admin-lesson.lesson-setting')}}</a>

                                    <a class="nav-link" id="v-video-setting-tab" data-toggle="pill"
                                        href="#v-video-setting" role="tab" aria-controls="v-video-setting"
                                        aria-selected="false"><i class="fa fa-youtube-play"></i> {{__('admin-lesson.video-setting')}}</a>

                                    <a class="nav-link" id="v-image-setting-tab" data-toggle="pill"
                                        href="#v-image-setting" role="tab" aria-controls="v-image-setting"
                                        aria-selected="false"><i class="fa fa-picture-o"></i> {{__('admin-lesson.thumbnail')}}</a>
                                </div>
                                <div class="tab-content col-lg-9" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-lesson-setting" role="tabpanel"
                                        aria-labelledby="v-lesson-setting-tab">
                                        @include('admin.lessons.tabs.lesson-setting')
                                    </div>
                                    <div class="tab-pane fade" id="v-video-setting" role="tabpanel"
                                        aria-labelledby="v-video-setting-tab">
                                        @include('admin.lessons.tabs.video-setting')
                                    </div>

                                    <div class="tab-pane fade" id="v-image-setting" role="tabpanel"
                                        aria-labelledby="v-image-setting-tab">
                                        @include('admin.lessons.tabs.image-setting')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="saveLesson" type="button" class='btn btn-primary update-item float-right'>{{__('sys.save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="{{ asset('assets/vendors/dropzone/js/dropzone.js') }}"></script>
<script>
jQuery(document).ready(function() {
    jQuery('body').on('click', ".update-item", function(e) {
        e.preventDefault();
        let formUpdate = jQuery(this).closest('#updateLesson');
        formUpdate.find('.input-error').empty();
        var url = formUpdate.prop('action');
        let formData = new FormData($('#updateLesson')[0]);
        var desc = CKEDITOR.instances.description.getData();
        formData.append('description', desc);
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
                    jQuery('.input-' + key).find('.input-error').html(res.errors[key][0]);
                    showAlertError(res.errors[key][0]);
                }
            }
            if (res.success) {
                showAlertSuccess(res.message);
                window.location.href = res.redirect;
            }
        });
    });

    // Handle upload file
    $('#file-validation').dropzone({
        url: "{{ route('admin.lessons.storeVideo') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        maxFiles: 1,
        maxFilesize: 1024,
        timeout: 1800000,
        acceptedFiles:".mp4,.mkv,.avi",
        uploadprogress: function(file, progress) {
            $('#video_preview').text('File progress: ' + progress);
        },
        sending: function(file, xhr, formData) {
            console.log('file:', file);
            console.log('formData:', formData);
            console.log('xhr:', formData);
            $('#saveLesson').prop('disabled',true);
        },
        success: function(file, response) {
            if(response.success){
                $('#video_url').val(response.video_url);
                $('#video_preview').text(response.video_url);
                $('#video_preview').attr('href','/'+response.video_url);
            }
            $('#saveLesson').prop('disabled',false);
        },
        error: function(file, response) {
            showAlertError('Video uploaded error');
            $('#saveLesson').prop('disabled',false);
        }
    });
    $('#file-validation').addClass('dropzone');
});
</script>
@endsection