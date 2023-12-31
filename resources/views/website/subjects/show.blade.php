@extends('website.layouts.master')
@section('title')
Subject
@endsection
@section('content')
@include('website.includes.header.breadcrumb',[
'page_title' => $item->name
])

<div class="coursearea sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <!-- <div class="col-xl-12">
                <div class="course__text__wraper aos-init aos-animate" data-aos="fade-up">
                    <div class="course__text">
                        <p>Showing 1–12 of 54 Results</p>
                    </div>
                    <div class="course__icon">
                        <ul class="nav property__team__tap" id="myTab" role="tablist">
                            <li class="short__by__new">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected=""> Short by New</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </li>

                        </ul>
                    </div>
                </div>
            </div> -->
            <div class="col-xl-12">
                 @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
				<div class="row">
                @if(count($item->lessons))
                    @foreach( $item->lessons as $lesson )
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 aos-init aos-animate"
						data-aos="fade-up">
						@include('website.global.elm-lesson')
					</div>
                    @endforeach
                    @else
                        <p class="text-center">{{__('sys.no_item_found')}}</p>
                    @endif
				</div>
            </div>
            <!-- <div class="main__pagination__wrapper aos-init aos-animate" data-aos="fade-up">
                <ul class="main__page__pagination">
                    <li><a class="disable" href="#"><i class="icofont-double-left"></i></a></li>
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="icofont-double-right"></i></a></li>
                </ul>
            </div> -->
        </div>
    </div>
</div>
@endsection