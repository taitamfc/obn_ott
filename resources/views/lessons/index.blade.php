@extends('layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
			<div class="col-md-12">
				<div class="d-flex justify-content-between flex-wrap">
					<div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
						<h5 class="mr-4 mb-0 font-weight-bold">My Lessons</h5>
					</div>
					<div class="buttons d-flex">
						<a class="btn btn-dark mr-1" href="{{ route('home') }}">{{ __('sys.back') }}</a>
						<a href="{{ route('lessons.create') }}" class="btn btn-primary">
							{{ __('sys.add_new') }}
                        </a>
					</div>
				</div>
			</div>
		</div>

        <div class="row">
			<div class="col-12">
				<div class="card lesson-table-results">
					<div class="text-center pt-5 pb-5">{{ __('sys.loading_data') }}</div>
				</div>
			</div>
		</div>
    </div>
</div>

@endsection
@section('footer')
<script>
jQuery(function() {
    var indexUrl = "{{ route('lessons.index') }}";
	var positionUrl = "{{ route('lessons.position') }}";
	var params = <?= json_encode(request()->query()); ?>;
	var wrapperResults = '.lesson-table-results';

    // Get all items
    getAjaxTable(indexUrl,wrapperResults,positionUrl,params);

    // Handle pagination
    jQuery('body').on('click',".page-link",function (e) {
        e.preventDefault();
        let url = jQuery(this).attr('href');
        getAjaxTable(url,wrapperResults,positionUrl);
    });

    // Handle Delete
    jQuery('body').on('click',".delete-item",function (e) {
        e.preventDefault();
        var ele = $(this);
        let action = ele.data('action');
        if (confirm("Are you sure?")) {
            handleDelete(action,ele);
        }
    });
});
</script>
@endsection