<div class="modal fade" id="modalCreate" style="display: none;" aria-hidden="true">
	<form id="formCreate"  action="{{ route('plans.store') }}" method="post" enctype="multipart/form-data">
		<div class="modal-dialog modal-dialog-centered" role="document">
			@csrf
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Create Plan</h5>
					<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
				</div>
				<div class="modal-body">

					<div class="form-group input-name">
						<label for="name" class="col-form-label">name</label>
						<input class="form-control" type="text" id="name" name='name'>
						<div class="input-error text-danger">@error('name') {{ $message }} @enderror</div>
					</div>

					<div class="form-group input-price">
						<label for="price" class="col-form-label">price</label>
						<input class="form-control" type="text" id="price" name='price'>
						<div class="input-error text-danger">@error('price') {{ $message }} @enderror</div>
					</div>

					<div class="form-group input-duration">
						<label for="duration" class="col-form-label">duration</label>
						<input class="form-control" type="text" id="duration" name='duration'>
						<div class="input-error text-danger">@error('duration') {{ $message }} @enderror</div>
					</div>

					<div class="form-group input-number_days">
						<label for="number_days" class="col-form-label">number_days</label>
						<input class="form-control" type="text" id="number_days" name='number_days'>
						<div class="input-error text-danger">@error('number_days') {{ $message }} @enderror</div>
					</div>

				</div>
				<div class="modal-footer">
					<button class="btn btn-primary add-item" type='button'>{{__('sys.save-changes')}}</button>
					<button type="button" class="btn btn-light" data-dismiss="modal">{{__('sys.close')}}</button>
				</div>
			</div>
		</div>
	</form>
</div>