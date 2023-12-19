@if(empty($item))
<form id="formCreate" action="{{ route('admin.settings.updatePopup') }}" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-centered" role="document">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('admin-setting.creaate-new')}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group input-popup-create">
                    <label for="popup" class="col-form-label">{{__('admin-setting.popup')}}</label>
                    <textarea class="form-control" name='popup' id="popup"></textarea>
                    <div class="input-error text-danger">@error('popup') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary add-item" type='button'>{{__('sys.save-changes')}}</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">{{__('sys.close')}}</button>
            </div>
        </div>
    </div>
</form>
@else
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card text-center">
                {!!$item->setting_value!!}
            </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <a class='btn btn-primary show-form-edit w-50 text-white'
                    data-action="{{ route('admin.settings.showPopup') }}">{{__('admin-setting.update')}}</a>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endif
<script>
CKEDITOR.replace('popup');
</script>