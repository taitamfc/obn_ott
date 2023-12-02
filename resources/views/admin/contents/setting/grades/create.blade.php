<div class="modal fade" id="modalCreate" style="display: none;" aria-hidden="true">
	<form id="formCreate"  action="{{ route('admin.grades.store') }}" method="post" enctype="multipart/form-data">
		<div class="modal-dialog modal-dialog-centered" role="document">
			@csrf
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Create New</h5>
					<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
				</div>
				<div class="modal-body">

					<div class="form-group input-name">
						<label for="name" class="col-form-label">Title</label>
						<input class="form-control" type="text" id="name" name='name'>
						<div class="input-error text-danger">@error('name') {{ $message }} @enderror</div>
					</div>

					<div class="form-group input-image">
						<label for="image" class="col-form-label">Banner</label>
						<input class="form-control" type="file" name='image' id="image">
						<div class="input-error text-danger">@error('image') {{ $message }} @enderror</div>
					</div>

					<div class="form-group">
						<label for="status" class="col-form-label">Status</label>
						<div style="display: flex">
							<div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
								<input type="radio" checked id="c-active" name="status" class="custom-control-input"
									value='1'>
								<label class="custom-control-label" for="c-active">Active</label>
							</div>
							<div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
								<input type="radio" id="c-inactive" name="status" class="custom-control-input"
									value='0'>
								<label class="custom-control-label" for="c-inactive">Inactive</label>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button class="btn btn-primary add-item" type='button'>Save changes</button>
					<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>