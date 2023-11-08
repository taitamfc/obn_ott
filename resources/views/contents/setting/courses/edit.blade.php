<div class="modal fade" id="modalUpdate" style="display: none;" aria-hidden="true">
	<form id="formUpdate"  action="" method="post" enctype="multipart/form-data">
		<div class="modal-dialog modal-dialog-centered" role="document">
			@csrf
			@method('PUT')
			<input type="hidden" name="id" id="input-id">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Update</h5>
					<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
				</div>
				<div class="modal-body">

					<div class="form-group input-name">
						<label for="name" class="col-form-label">Title</label>
						<input class="form-control" type="text" id="name" name='name'>
						<div class="input-error text-danger">@error('name') {{ $message }} @enderror</div>
					</div>

					<div class="form-group input-price">
						<label for="price" class="col-form-label">Price</label>
						<input class="form-control" type="text" id="price" name='price'>
						<div class="input-error text-danger">@error('price') {{ $message }} @enderror</div>
					</div>

					<div class="form-group">
						<label for="image" class="col-form-label">Banner</label>
						<input class="form-control" type="file" name='image' id="image">
						<div class="input-error text-danger">@error('image') {{ $message }} @enderror</div>
						<img src="" class="input-img" alt="" style="display:none;">
					</div>

					<div class="form-group input-status">
						<label for="status" class="col-form-label">Status</label>
						<div style="display: flex">
							<div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
								<input type="radio" checked id="e-active" name="status" class="custom-control-input input-active"
									value='1'>
								<label class="custom-control-label" for="e-active">Active</label>
							</div>
							<div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
								<input type="radio" id="e-inactive" name="status" class="custom-control-input input-inactive"
									value='0'>
								<label class="custom-control-label" for="e-inactive">Inactive</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary edit-item" type='button'>Save changes</button>
					<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>