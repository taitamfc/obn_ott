@extends('website.layouts.master')
@section('content')

<!-- dashboardarea__area__start  -->
<div class="dashboardarea sp_bottom_100">
    @include('website.dashboards.dashboard-wraper')
    <div class="dashboard">
        <div class="container-fluid full__width__padding">
            <div class="row">
                @include('website.dashboards.dashboard-inner')
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="dashboard__content__wraper">
                        <div class="dashboard__section__title">
                            <h4>{{__('account.composer')}}</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <form method="POST"
                                    action="{{ route('website.q-a.store',['site_name' => $site_name]) }}">
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    @csrf
                                    <div class="row">

                                        <div class="col-xl-12">
                                            <div class="dashboard__form__wraper">
                                                <div class="dashboard__form__input">
                                                    <label>{{__('account.title')}}</label>
                                                    <input type="text" name="title" id="title" value="{{ old('title') }}">
                                                    @if ($errors->any())
                                                    <p style="color:red">{{ $errors->first('title') }}
                                                    </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="dashboard__form__wraper">
                                                <div class="dashboard__form__input">
                                                    <label>{{__('account.question')}}</label>
                                                    <textarea type="text" name="question" id="question">{{ old('question') }}</textarea>
                                                    @if ($errors->any())
                                                    <p style="color:red">{{ $errors->first('question') }}
                                                    </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                                        <script>
                                        CKEDITOR.replace('question');
                                        </script>

                                        <div class="col-xl-12">
                                            <div class="dashboard__form__button">
                                                <a href="{{ route('website.q-a',['site_name' => $site_name]) }}"
                                                    class="btn btn-secondary" style="margin: 30px auto 0;">{{__('account.cancel')}}</a>
                                                <button type="submit" class="btn btn-primary"
                                                    style="margin: 30px auto 0;">{{__('account.save')}}</button>
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
</div>

</div>
<!-- dashboardarea__area__end   -->

@endsection