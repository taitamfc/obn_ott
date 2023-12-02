@extends('admin.layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
			<div class="col-md-12">
				<div class="d-flex justify-content-between flex-wrap">
					<div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
						<h5 class="mr-4 mb-0 font-weight-bold">Video AD</h5>
					</div>
					<div class="buttons d-flex">
						<a class="btn btn-dark mr-1" href="{{ route('admin.home') }}">{{ __('sys.back') }}</a>
						<!-- <button data-toggle="modal" data-target="#modalCreate" class="btn btn-primary">
							{{ __('sys.add_new') }}
						</button> -->
					</div>
				</div>
			</div>
		</div>

        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12">
                <div class="card course-table-results">
                    Data show here
                </div>
            </div>
            <!-- Progress Table end -->
        </div>
    </div>
</div>
@endsection