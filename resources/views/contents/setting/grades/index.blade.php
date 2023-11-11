@extends('layouts.master')
@section('content')
<div class="main-content page-content">
	<div class="main-content-inner" style="max-width: 100% !important;">
		<div class="row mb-4">
			<div class="col-md-12 grid-margin">
				<div class="d-flex justify-content-between flex-wrap">
					<div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
						<h5 class="mr-4 mb-0 font-weight-bold">My Grade</h5>
						<div class="d-flex align-items-baseline dashboard-breadcrumb">
							<p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
							<i class="mdi mdi-chevron-right mr-1 text-primary"></i>
							<p class="text-muted mb-0 mr-1 hover-cursor">My Grade</p>
						</div>
					</div>
					<div class="buttons">

					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="grade-header">
							<button class="btn btn-primary float-left">Grade</button>
							<button data-toggle="modal" data-target="#modalCreate" class="btn  btn-primary float-right">Create
								New</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<!-- Progress Table start -->
			<div class="col-12 mt-4">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="grade-table" class="table table-hover progress-table text-left ">
								<thead class="text-uppercase">
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Name</th>
										<th scope="col">Image</th>
										<th scope="col">Status</th>
										<th scope="col" class="text-center">Action</th>
									</tr>
								</thead>
								<tbody class="sortable-table grade-table-results">
									<tr> <td colspan="5" class="text-center">Loading data...</td> </tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						<div class="pagination float-right">
							
						</div>
					</div>
				</div>
			</div>
			<!-- Progress Table end -->
		</div>
		@include('contents.setting.grades.create')
		@include('contents.setting.grades.edit')
	</div>
</div>

@endsection

@section('footer')
<script>
	jQuery(document).ready(function() {
		function getGradeTable(){
			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'GET',
				url: "{{ route('grades.index') }}",
				success: function (res) {
					jQuery('.grade-table-results').html(res);
					sortableGrades();
				}
			});
		}

		function sortableGrades(){
			jQuery(".sortable-table").sortable({
				update: function (event, ui) {
					var data = $(this).sortable('serialize');
					// POST to server using $.post or $.ajax
					jQuery.ajax({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						data: data,
						type: 'POST',
						url: "{{ route('grades.position') }}"
					})
				}
			});
		}

		//Xu ly order item
		getGradeTable();

		// Xu ly xoa
		jQuery('body').on('click',".delete-item",function (e) {
			e.preventDefault();
			var ele = $(this);
			var id = ele.data("id");
			if (confirm("Are you sure?")) {
				var url = 'grades/' + id;
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: url,
					type: "POST",
					data: {
						_method: 'DELETE',
						_token: '{{ csrf_token() }}',
					},
					success: function (response) {
						ele.closest('.item').remove(); // Xóa phần tử khỏi DOM
					}
				});
			}
		});

		// Xu ly them moi
		jQuery('body').on('click',".add-item",function (e) {
			let formCreate = jQuery(this).closest('#formCreate');
			formCreate.find('.input-error').empty();
			var url = formCreate.prop('action');
			let formData = new FormData($('#formCreate')[0]);
			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: url,
				type: "POST",
				processData: false,
				contentType: false,
				data: formData,
				success: function (res) {
					if(res.has_errors) {
						for (const key in res.errors) {
							console.log(key);
							jQuery('.input-'+key).find('.input-error').html(res.errors[key][0]);
						}
					}
					if(res.success){
						getGradeTable();
					}

				}
			});
		});

		// Xu ly cap nhat
		jQuery('body').on('click',".edit-item",function (e) {
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
				success: function (res) {
					if(res.has_errors) {
						for (const key in res.errors) {
							jQuery('.input-'+key).find('.input-error').html(res.errors[key][0]);
						}
					}
					if(res.success){
						// Disable modal
						jQuery('#modalUpdate').modal('hide');
						// Recall items
						getGradeTable();
					}

				}
			});
		});

		// Xu ly form edit
		jQuery('body').on('click',".show-form-edit",function (e) {
			// Hien thi modal
			jQuery('#modalUpdate').modal('show');

			let formUpdate = jQuery('#formUpdate');

			// Lấy dữ liệu
			let id = jQuery(this).data('id');
			let action = jQuery(this).data('action');

			jQuery.ajax({
				url: action,
				type: "GET",
				dataType:'json',
				success: function (res) {
					if(res.success){
						let formData = res.data;

						formUpdate.prop('action',action);

						formUpdate.find('.input-id').val(formData.id);
						formUpdate.find('.input-name input').val(formData.name);

						if(formData.img){
							formUpdate.find('.input-img').attr('src',formData.img);
							formUpdate.find('.input-img').show();
						}
						formUpdate.find('.input-status input').prop('checked',false);
						if(formData.status ){
							formUpdate.find('.input-status .input-active').prop('checked',true);
						}else{
							formUpdate.find('.input-status .input-inactive').prop('checked',true);
						}
					}
				}
			});
		})
	});
</script>
@endsection