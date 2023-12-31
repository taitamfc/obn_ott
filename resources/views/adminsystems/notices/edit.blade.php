<div class="modal fade" id="modalUpdate" style="display: none;" aria-hidden="true">
    <form id="formUpdate" action="" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="input-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Notices</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group input-title">
                        <label for="name" class="col-form-label">Title (*)</label>
                        <input class="form-control" type="text" id="title" name="title">
                        <div class="input-error text-danger">@error('title') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group input-content">
                        <label for="content" class="col-form-label">Description (*)</label>
                        <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                        <div class="input-error text-danger">@error('content') {{ $message }} @enderror</div>
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