@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.question') }}
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-question.question-answer')}}</h5>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12">
                <form id="" action="{{ route('admin.questionanswer.update', ['questionanswer' => $item->id]) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="input-id">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{__('admin-question.question')}}</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group input-question-update">
                                <label for="price" class="col-form-label">{{__('admin-question.title')}}</label>
                                <div>{{ $item->title }}</div>
                            </div>
                            <div class="form-group input-question-update">
                                <label for="price" class="col-form-label">{{__('admin-question.question')}}</label>
                                <div>{{ strip_tags($item->question) }}</div>
                            </div>
                            <div class="form-group input-answer-update">
                                <label for="answer" class="col-form-label">{{ __('admin-question.answer') }}</label>
                                <textarea class="form-control" name="answer"
                                    id="answer">{!! $item->answer !!}</textarea>
                                <div class="input-error text-danger">@error('answer') {{ $message }} @enderror</div>
                                <img src="" class="input-img-update" alt="" style="display:none;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary edit-item" type='submit'>{{ __('sys.save-changes') }}</button>
                        </div>
                    </div>
                </form>
                <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                <script>
                CKEDITOR.replace('answer');
                </script>
            </div>
            <!-- Progress Table end -->
        </div>

    </div>
</div>
@endsection