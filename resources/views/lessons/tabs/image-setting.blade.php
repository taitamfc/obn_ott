<div class="row">
    <div class="col-lg-12">
        <div class="lesson-header">
            <h4>Thumb Information</h4>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Thumb Image</label>
            <input type="file" class="form-control" name='image' id='image'>
        </div>
        @if( $item->image )
        <div class="form-group">
            <img src="{{ asset($item->image) }}" style="width:100px">
        </div>
        @endif
    </div>
</div>