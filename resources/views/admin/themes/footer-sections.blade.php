@extends('admin.layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">Footer Sections</h5>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ route('admin.home') }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="modal-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('admin.settings.updateFooter') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="about">About us</label>
                        <textarea class="form-control" id="about" name="about">{{$footer_settings['footer_about']}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="copyright">Copyright</label>
                        <input type="text" class="form-control" id="copyright" name="copyright" value="{{$footer_settings['footer_copyright']}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Footer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection