<div class="row">
    <div class="col-lg-12">
        <div class="lesson-header">
            <h4>Video Information <span>*</span></h4>
        </div>
        <div class="form-group">
            <div action="{{ route('admin.lessons.storeVideo') }}" class="ct-dropzone dropzone-primary" id="file-validation">
                <div class="dz-default dz-message">
                    <span><i class="ti-image"></i></span>
                </div>
                <input type="hidden" id="video" name='video'>
            </div>
            <div class="input-error text-danger">
                @error('video') {{ $message }} @enderror
            </div>
        </div>
    </div>
</div>