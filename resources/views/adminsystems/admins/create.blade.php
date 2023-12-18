<div class="modal fade" id="modalCreate" style="display: none;" aria-hidden="true">
	<form id="formCreate"  action="{{ route('admins.store') }}" method="post" enctype="multipart/form-data">
		<div class="modal-dialog modal-dialog-centered" role="document">
			@csrf
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Create Admin</h5>
					<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
				</div>
				<div class="modal-body">

					<div class="form-group input-name">
						<label for="name" class="col-form-label">name</label>
						<input class="form-control" type="text" id="name" name='name'>
						<div class="input-error text-danger">@error('name') {{ $message }} @enderror</div>
					</div>

					<div class="form-group input-code">
						<label for="code" class="col-form-label">code</label>
						<input class="form-control" type="text" id="code" name='code'>
						<div class="input-error text-danger">@error('code') {{ $message }} @enderror</div>
					</div>

					<div class="form-group input-email">
						<label for="email" class="col-form-label">email</label>
						<input class="form-control" type="text" id="email" name='email'>
						<div class="input-error text-danger">@error('email') {{ $message }} @enderror</div>
					</div>

					<div class="form-group input-phone">
						<label for="phone" class="col-form-label">phone</label>
						<input class="form-control" type="text" id="phone" name='phone'>
						<div class="input-error text-danger">@error('phone') {{ $message }} @enderror</div>
					</div>

					<div class="form-group input-status">
						<label for="status" class="col-form-label">status</label>
						<input class="form-control" type="text" id="status" name='status'>
						<div class="input-error text-danger">@error('status') {{ $message }} @enderror</div>
					</div>

					<div class="form-group input-password">
						<label for="password" class="col-form-label">password</label>
						<input class="form-control" type="text" id="password" name='password'>
						<div class="input-error text-danger">@error('password') {{ $message }} @enderror</div>
					</div>

					<div class="form-group input-address">
						<label for="address" class="col-form-label">address</label>
						<input class="form-control" type="text" id="address" name='address'>
						<div class="input-error text-danger">@error('address') {{ $message }} @enderror</div>
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