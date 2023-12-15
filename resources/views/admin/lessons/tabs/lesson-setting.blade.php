<div class="row">
    <div class="col-lg-12">
        <input type="hidden" id="ajax_grade_id" value="{{$item->grade_id}}">
        <input type="hidden" id="ajax_subject_id" value="{{$item->subject_id}}">
        <div class="lesson-header">
            <h4>{{__('admin-lesson.lesson-video-information')}}</h4>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group input-name">
            <label for="" class="col-form-label">{{__('admin-lesson.name')}} <span>*</span></label>
            <input type="text" class="form-control" name="name" id="name"
                value="{{ old('name') ? old('name') : $item->name  }}">
            <div class="input-error text-danger">@error('name') {{ $message }} @enderror</div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group input-grade_id">
            <label for="" class="col-form-label">{{__('admin-lesson.grade')}} <span>*</span></label>
            <div class="form-floating">
                <select name="grade_id" id="grade_id" class="form-control">
                    <option selected>{{__('admin-lesson.select-grade')}}</option>
                    @foreach($grades as $grade)
                    <option @selected( $item->grade_id == $grade->id ) value='{{ $grade->id }}'>{{ $grade->name }}
                    </option>
                    @endforeach
                </select>
                <div class="input-error text-danger">@error('grade_id') {{ $message }} @enderror</div>
            </div>
        </div>
        <div class="form-group input-course_id mt-3">
            <label for="" class="col-form-label">{{__('admin-lesson.course')}}<span>*</span></label>
            <div class="form-floating">
                <select name="course_id" id="course_id" class="form-control">
                    <option value="">{{__('admin-lesson.select-course')}}</option>
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
        <div class="form-group input-subject_id">
            <label for="" class="col-form-label">{{__('admin-lesson.subject')}} <span>*</span></label>
            <div class="form-floating">
                <select name="subject_id" id="subject_id" class="form-control">
                    <option value="">{{__('admin-lesson.select-sub')}}</option>
                </select>
                <div class="input-error text-danger">@error('subject_id') {{ $message }} @enderror</div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-form-label">{{__('admin-lesson.status')}} <span>*</span></label>
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
            <label for="" class="col-form-label">{{__('admin-lesson.description')}} </label>
            <textarea id="description" name='description' cols="30" rows="5"
                class="form-control">{{ old('description') ? old('description') : $item->description  }}</textarea>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
CKEDITOR.replace('description');
var url = "{{ route('admin.lessons.getSubject') }}";
$(document).ready(function() {
    $('body').on('change', "#grade_id", function() {
        var grade_id = $(this).val();
        if (grade_id) {
            getSubjects(grade_id);
        }
    });

    if ($('#ajax_grade_id').val()) {
        var ajax_grade_id = $('#ajax_grade_id').val();
        var ajax_subject_id = $('#ajax_subject_id').val();
        getSubjects(ajax_grade_id, ajax_subject_id)
    }

    function getSubjects(grade_id, selected = 0) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            method: 'post',
            dataType: "json",
            data: {
                grade_id: grade_id
            },
            success: function(res) {
                $('#subject_id').empty();
                $.each(res.data, function(i, subject) {
                    // Change 'data' to 'res.data'
                    var option = $('<option>', {
                        value: subject.id,
                        text: subject.name
                    });

                    // Check if subject.id is equal to selected
                    if (subject.id == selected) {
                        option.attr('selected', 'selected');
                    }

                    $('#subject_id').append(option);
                });
            }
        });
    }
});
</script>