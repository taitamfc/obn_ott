<div class="modal fade" id="modalUpdate" style="display: none;" aria-hidden="true">
    <form id="formUpdate" action="" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="input-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Admin</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">

                    <div class="form-group input-name">
                        <label for="name" class="col-form-label">Name</label>
                        <input class="form-control" type="text" id="name" name='name'>
                        <div class="input-error text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group input-email">
                        <label for="email" class="col-form-label">Email</label>
                        <input class="form-control" type="email" id="email" name='email'>
                        <div class="input-error text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group input-password">
                        <label for="password" class="col-form-label">Password</label>
                        <input class="form-control" type="password" id="password" name='password'>
                        <div class="input-error text-danger">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group input-phone">
                                <label for="phone" class="col-form-label">Phone</label>
                                <input class="form-control" type="text" id="phone" name='phone'>
                                <div class="input-error text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-status">
                                <label for="status" class="col-form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="active" value="1">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="inactive" value="0">
                                    <label class="form-check-label" for="inactive">Inactive</label>
                                </div>
                                <div class="input-error text-danger">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary edit-item" type='button'>{{ __('sys.save-changes') }}</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('sys.close') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
