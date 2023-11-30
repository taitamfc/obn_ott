<div class="modal fade" id="modalUpdateAvatar" style="display: none;" aria-hidden="true">
    <form id="formUpdateAvatar" action="" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <input type="hidden" name="id" id="input-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group input-image">
                        <label for="image" class="col-form-label">Avatar<span>*</span></label>
                        <input class="form-control" type="file" id="image" name='image'>
                        <div class="input-error text-danger">@error('image') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary edit-avatar" type='button'>Save changes</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>