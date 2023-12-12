@extends('website.layouts.master')
@section('title')
{{__('account.my_page')}}
@endsection
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
							<h4>{{__('account.my_page')}}</h4>
							<a href="{{ route('website.accounts.edit', ['site_name' => $site_name]) }}"
								class="btn btn-primary">{{__('account.edit')}}</a>
						</div>
						<div class="row">
							<div class="col-lg-12">
								@if(session('success'))
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
								@endif
							</div>
							<div class="col-lg-4 col-md-4">
								<div class="dashboard__form dashboard__form__margin">{{__('account.full_name')}}</div>
							</div>
							<div class="col-lg-8 col-md-8">
								<div class="dashboard__form dashboard__form__margin">{{ $item->name }}</div>
							</div>
							<div class="col-lg-4 col-md-4">
								<div class="dashboard__form dashboard__form__margin">{{__('account.email_address')}}</div>
							</div>
							<div class="col-lg-8 col-md-8">
								<div class="dashboard__form dashboard__form__margin">{{ $item->email }}</div>
							</div>
							<div class="col-lg-4 col-md-4">
								<div class="dashboard__form dashboard__form__margin">{{__('account.phone_number')}}</div>
							</div>
							<div class="col-lg-8 col-md-8">
								<div class="dashboard__form dashboard__form__margin">{{ $item->phone }}</div>
							</div>

							<div class="col-lg-4 col-md-4">
								<div class="dashboard__form dashboard__form__margin">{{__('account.status')}}</div>
							</div>
							<div class="col-lg-8 col-md-8">
								<div class="dashboard__form dashboard__form__margin">{!! $item->status_fm !!}</div>
							</div>

							<div class="col-lg-4 col-md-4">
								<div class="dashboard__form dashboard__form__margin">{{__('account.zip_code')}}</div>
							</div>
							<div class="col-lg-8 col-md-8">
								<div class="dashboard__form dashboard__form__margin">{{ $item->code }}</div>
							</div>

							<div class="col-lg-4 col-md-4">
								<div class="dashboard__form dashboard__form__margin">{{__('account.address')}}</div>
							</div>
							<div class="col-lg-8 col-md-8">
								<div class="dashboard__form dashboard__form__margin">{{ $item->address }}</div>
							</div>

							<div class="col-lg-4 col-md-4">
								<div class="dashboard__form dashboard__form__margin">{{__('account.city')}}</div>
							</div>
							<div class="col-lg-8 col-md-8">
								<div class="dashboard__form dashboard__form__margin">{{ $item->city }}</div>
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