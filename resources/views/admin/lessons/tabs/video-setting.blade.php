<div class="row">
    <div class="col-lg-12">
        <div class="lesson-header">
            <h4>Video Information <span>*</span></h4>
        </div>
        <div class="form-group">
            <div class="dropzone dropzone-light dz-clickable dz-started dz-max-files-reached input-video" id="">
                <div class="dz-default dz-message">
                    <span>
                        <input type="file" class='form-control' name='video'>
                    </span>
                </div>
                <div class="input-error text-danger">
                    @error('video') {{ $message }} @enderror
                </div>
            </div>
        </div>
        @if( $item->video )
        <div class="form-group">
            <video src="{{ asset($item->video) }}" style="width:100px">
        </div>
        @endif



    </div>
</div>