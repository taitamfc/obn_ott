@extends('layouts.master')
@section('content')


<div class="main-content page-content">
    <!--==================================*
                   Main Section
        *====================================-->
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
                        <div class="row p-3">
                        <div class="col-sm-4 line">
                        <div class="lesson-header">
                            <h2 class="btn btn-primary">Upload Lesson</h2>
                        </div>
                        <div class="lesson-content">
                            <ul class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <li><i class="fa fa-cog"></i><a id="v-pills-video-tab" data-toggle="pill" href="#v-pills-video" role="tab" aria-controls="v-pills-video"> Video
                                        Setting</a></li>
                                <li><i class="fa fa-youtube-play"></i><a id="v-pills-media-tab" data-toggle="pill" href="#v-pills-media" role="tab" aria-controls="v-pills-media"> Add media
                                    </a></li>
                                <li><i class="fa fa-picture-o"></i><a id="v-pills-thumbs-tab" data-toggle="pill" href="#v-pills-thumbs" role="tab" aria-controls="v-pills-thumbs"> Thumbs
                                    </a></li>
                            </ul>
                            <div class="button">
                                <p class="">Cancel</p>
                                <p class="">Upload</p>
                            </div>
                            

                        </div>
                    </div>
                            <div class="col-sm-8">

                                <form id="single-upload-dropzone" action="" method="post" enctype="multipart/form-data">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-video" role="tabpanel"
                                            aria-labelledby="v-pills-video-tab">
                                            <div class="lesson-header">
                                                <h2 class="btn btn-primary">Lesson Setting</h2>
                                            </div>
                                            <div class="row" id="media">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Name <span>*</span></label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Subject
                                                            <span>*</span></label>
                                                        <select name="" id="" class="form-control">
                                                            <option value="">Subject 1</option>
                                                            <option value="">Subject 1</option>
                                                            <option value="">Subject 1</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Couse
                                                            <span>*</span></label>
                                                        <select name="" id="" class="form-control">
                                                            <option value="">Couse 1</option>
                                                            <option value="">Couse 1</option>
                                                            <option value="">Couse 1</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Grade
                                                            <span>*</span></label>
                                                        <select name="" id="" class="form-control">
                                                            <option value="">Grade 1</option>
                                                            <option value="">Grade 1</option>
                                                            <option value="">Grade 1</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Grade
                                                            <span>*</span></label>
                                                        <textarea name="" id="" cols="30" rows="5"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-media" role="tabpanel"
                                            aria-labelledby="v-pills-media-tab">
                                            <div class="lesson-header">
                                                <h2>Video Information</h2>
                                                <label>
                                                    <input id="input" type="checkbox">
                                                    <span class="check"></span>
                                                </label>
                                            </div>
                                            <div class="dropzone dropzone-light dz-clickable dz-started dz-max-files-reached"
                                                id="">
                                                <div class="dz-default dz-message">
                                                    <span><i class="ti-image"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-thumbs" role="tabpanel"
                                            aria-labelledby="v-pills-thumbs-tab">
                                            <div class="lesson-header">
                                                <h2>Thumb Information</h2>
                                                <label>
                                                    <input id="input" type="checkbox">
                                                    <span class="check"></span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Thumb Image</label>
                                                <input type="file" class="form-control">
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
<!--==================================*
                   End Main Section
        *====================================-->
</div>
@endsection