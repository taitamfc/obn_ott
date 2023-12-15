<div class="modal fade" id="modalCreate" style="display: none;" aria-hidden="true">
    <form id="formCreate" action="{{ route('admin.durations.store') }}" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('sys.create-new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group input-name-create">
                        <label for="name" class="col-form-label">{{ __('admin-duration.name') }}</label>
                        <input class="form-control" type="text" id="name" name='name'>
                        <div class="input-error text-danger">@error('name') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group input-number_days-create">
                        <label for="number_days" class="col-form-label">{{ __('admin-duration.number-day') }}</label>
                        <input class="form-control" type="number" id="number_days" name='number_days'>
                        <div class="input-error text-danger">@error('number_days') {{ $message }} @enderror</div>
                    </div>
                    <!-- <div class="form-group">
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
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary add-item" type='button'>{{ __('sys.save-changes') }}</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('sys.close') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>