@extends('layouts.master')
@section('content')
<div class="main-content">
    <div class="main-content-inner">
        <div class="row mb-4">
			<div class="col-md-12">
				<div class="d-flex justify-content-between flex-wrap">
					<div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
						<h5 class="mr-4 mb-0 font-weight-bold">My Products</h5>
					</div>
					<div class="buttons d-flex">
						<a class="btn btn-dark mr-1" href="{{ route('home') }}">{{ __('sys.back') }}</a>
						<button data-toggle="modal" data-target="#modalCreate" class="btn btn-primary">
							{{ __('sys.add_new') }}
						</button>
					</div>
				</div>
			</div>
		</div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card product-table-results">
                    <div class="text-center pt-5 pb-5">{{ __('sys.loading_data') }}</div>
                </div>
            </div>
        </div>
        @include('stores.productmanagement.edit')
    </div>
</div>
@endsection

@section('footer')
<script>
var indexUrl = "{{ route('courses.products') }}";
var positionUrl = "";
var wrapperResults = '.product-table-results';
var params = <?= json_encode(request()->query()); ?>;
jQuery(document).ready(function() {
    getAjaxTable(indexUrl, wrapperResults, positionUrl, params);
    jQuery('body').on('click', ".page-link", function(e) {
        e.preventDefault();
        let url = jQuery(this).attr('href');
        getAjaxTable(url, wrapperResults, positionUrl);
    });
    jQuery(".edit-item").click(function(e) {
        let formUpdate = jQuery(this).closest('#formUpdate');
        formUpdate.find('.input-error').empty();
        var url = formUpdate.prop('action');
        let formData = new FormData($('#formUpdate')[0]);
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: function(res) {
                if (res.has_errors) {
                    for (const key in res.errors) {
                        jQuery('.input-' + key).find('.input-error').html(res.errors[key][
                            0
                        ]);
                    }
                }
                if (res.success) {
                    window.location.reload();
                }
            }
        });
    });
    jQuery('body').on('click', ".show-form-edit", function(e) {
        // Hien thi modal
        jQuery('#modalUpdate').modal('show');
        let formUpdate = jQuery('#formUpdate');
        // Lấy dữ liệu
        let id = jQuery(this).data('id');
        let action = jQuery(this).data('action');
        var url = '/courses/' + id;
        jQuery.ajax({
            url: url,
            type: "GET",
            dataType: 'json',
            success: function(res) {
                if (res.success) {
                    let formData = res.data;
                    formUpdate.prop('action', action);
                    formUpdate.find('.input-price input').val(formData.price);
                    formUpdate.find('#input-id').val(formData.id);
                }
            }
        });
    })
});
</script>
@endsection