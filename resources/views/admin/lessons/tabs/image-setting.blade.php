<div class="row">
    <div class="col-lg-12">
        <div class="lesson-header">
            <h4>{{__('admin-lesson.select-a-thumbnail')}}</h4>
        </div>
        <div class="form-group">
            <label for="" class="form-label">{{__('admin-lesson.thumb-image')}}</label>
            <input type="file" class="form-control" name="image" id="image" onchange="previewImage(event)">
        </div>
        @if( $item->image )
        <div class="form-group">
            <img src="{{ asset($item->image) }}" style="width:100px">
        </div>
        @endif
        <div class="form-group">
            <img id="preview" src="#" alt="" style="display:none; width:100px;">
        </div>
    </div>
</div>
<script>
function previewImage(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.getElementById('preview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>