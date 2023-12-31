<div class="modal fade" id="modalUpdate" style="display: none;" aria-hidden="true">
    <form id="formUpdate" action="{{ route('admin.settings.updatePopup') }}" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('admin-setting.update-popup')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group input-popup-update">
                        <label for="popup" class="col-form-label">{{__('admin-setting.popup')}}</label>
                        <textarea class="form-control" name='popup' id="popup"></textarea>
                        <div class="input-error text-danger">@error('popup') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary edit-item" type='button'>{{__('sys.save-changes')}}</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{__('sys.close')}}</button>
                </div>
            </div>
        </div>
    </form>
</div>