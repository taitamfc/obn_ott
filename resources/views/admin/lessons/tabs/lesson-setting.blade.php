<div class="row">
    <div class="col-lg-12">
        <div class="lesson-header">
            <h4>Lesson Information</h4>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group input-name">
            <label for="" class="col-form-label">Name <span>*</span></label>
            <input type="text" class="form-control" name="name" id="name"
                value="{{ old('name') ? old('name') : $item->name  }}">
            <div class="input-error text-danger">@error('name') {{ $message }} @enderror</div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group input-subject_id">
            <label for="" class="col-form-label">Subject <span>*</span></label>
            <div class="form-floating">
                <select name="subject_id" id="subject_id" class="form-control">
                    <option value="">Select subject</option>
                    @foreach($subjects as $subject)
                    <option @selected( $item->subject_id == $subject->id )
                        value='{{ $subject->id }}'>{{ $subject->name }} </option>
                    @endforeach
                </select>
                <div class="input-error text-danger">@error('subject_id') {{ $message }} @enderror</div>
            </div>
        </div>
        <div class="form-group input-course_id">
            <label for="" class="col-form-label">Couse <span>*</span></label>
            <div class="form-floating">
                <select name="course_id" id="course_id" class="form-control">
                    <option value="">Select course</option>
                    @foreach($courses as $course)
                    <option @selected( $item->course_id == $course->id ) value='{{ $course->id }}'>{{ $course->name }}
                    </option>
                    @endforeach
                </select>
                <div class="input-error text-danger">@error('course_id') {{ $message }} @enderror</div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="" class="col-form-label">Grade <span>*</span></label>
            <div class="form-floating input-grade_id">
                <select name="grade_id" id="grade_id" class="form-control">
                    <option selected>Select grade</option>
                    @foreach($grades as $grade)
                    <option @selected( $item->grade_id == $grade->id ) value='{{ $grade->id }}'>{{ $grade->name }}
                    </option>
                    @endforeach
                </select>
                <div class="input-error text-danger">@error('grade_id') {{ $message }} @enderror</div>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-form-label">Status <span>*</span></label>
            <div class="form-floating input-status">
                <select name="status" id="status" class="form-control">
                    <option @selected( $item->status == 0 ) value='0'>Inactive</option>
                    <option @selected( $item->status == 1 ) value='1'>Active</option>
                </select>
                <div class="input-error text-danger">@error('status') {{ $message }} @enderror</div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group input-description">
            <label for="" class="col-form-label">Description </label>
            <textarea id="description" name='description' cols="30" rows="5"
                class="form-control">{{ old('description') ? old('description') : $item->description  }}</textarea>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('description');
</script>