@extends('website.layouts.master')

@section('content')
    @include('website.includes.header.breadcrumb', ['page_title' => $item->title])

    <div class="coursearea sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 aos-init aos-animate" data-aos="fade-up">
                            <h2>{{ $item->title }}</h2>
                            <p>{!! $item->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
