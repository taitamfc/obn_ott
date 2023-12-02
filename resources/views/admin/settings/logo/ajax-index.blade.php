@if(empty($item))
<form id="formCreate" action="{{ route('admin.settings.updateLogo') }}" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-centered" role="document">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group input-logo-create">
                    <label for="logo" class="col-form-label">Logo</label>
                    <input class="form-control" type="file" name='logo' id="logo">
                    <div class="input-error text-danger">@error('logo') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary add-item" type='button'>Save changes</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>
@else
<div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <img src="{{ asset($item->setting_value) }}" alt="logo" class="rounded">
            <div class="d-flex justify-content-center align-items-center mt-3">
                <a class='btn btn-primary show-form-edit w-50 text-white'>Update</a>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>
@endif