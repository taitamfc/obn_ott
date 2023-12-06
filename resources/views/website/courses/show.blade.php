@extends('website.layouts.master')
@section('content')
@include('website.includes.header.breadcrumb',[
'page_title' => $item->name
])

<div class="coursearea sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
				<div class="row">
                    @foreach( $items as $lesson )
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 aos-init aos-animate"
						data-aos="fade-up">
						@include('website.global.elm-lesson')
					</div>
                    @endforeach
				</div>
            </div>
        </div>
    </div>
</div>
@endsection