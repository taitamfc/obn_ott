<div class="row">
    <div class="col-lg-12">
        <div class="lesson-header">
            <h4>{{__('admin-lesson.video-information')}}<span>*</span></h4>
        </div>
        <div class="form-group">
            <div action="{{ route('admin.lessons.storeVideo') }}" class="ct-dropzone dropzone-primary" id="file-validation">
                <div class="dz-default dz-message">
                    <span><i class="ti-image"></i></span>
                </div>
                <input type="hidden" id="video_url" name='video' value="{{ old('video_url')  }}">
            </div>
            
            <p class="help-text mt-2 mb-1">{{__('admin-lesson.video-uploaded:')}} 
                <a id="video_preview" href="/{{ @$item->video_url }}" target="_blank">{{ @$item->video_url }}</a >
            </p>
            @if($item->videoId)
            <p class="help-text">{{__('admin-lesson.video-uploaded:')}} {{ $item->videoId }} - Processed: {{ $item->encodeProgress }}%</p>
            @endif
            <div class="input-error text-danger">
                @error('video') {{ $message }} @enderror
            </div>
        </div>
    </div>
</div>