<div class="modal fade" id="modalCreate" style="display: none;" aria-hidden="true">
    <form id="formCreate" action="{{ route('notices.store') }}" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Notices</h5>
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
                    <button class="btn btn-primary add-item" type='button'>{{ __('sys.save-changes') }}</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('sys.close') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>