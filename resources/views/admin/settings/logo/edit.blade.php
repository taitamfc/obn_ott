<div class="modal fade" id="modalUpdate" style="display: none;" aria-hidden="true">
    <form id="formUpdate" action="{{ route('admin.settings.updateLogo') }}" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('admin-setting.update-logo')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group input-logo-update">
                        <label for="logo" class="col-form-label">{{__('admin-setting.logo')}}</label>
                        <input class="form-control" type="file" name='logo' id="logo">
                        <div class="input-error text-danger">@error('logo') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary edit-item" type='button'>{{__('sys.save-changes')}}</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{__('sys.save-changes')}}</button>
                </div>
            </div>
        </div>
    </form>
</div>