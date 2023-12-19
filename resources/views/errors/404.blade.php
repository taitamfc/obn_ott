@extends('website.layouts.auth')

@section('title')
404
@endsection

@section('content')
<div class="errorarea sp_top_100 sp_bottom_100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-sm-12 col-12 m-auto">
                        <div class="errorarea__inner aos-init aos-animate" data-aos="fade-up">
                            <div class="error__text">
                                <h3>{{__('sys.404_title')}}</h3>
                                <p>{{__('sys.404_sub_title')}}</p>
                            </div>
                            <!-- <div class="error__button">
                                <a class="default__button" href="#">Back To Home
                                <i class="icofont-simple-right"></i>
                            </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

