<div class="card-body">
    <form id="formUpdate" action="{{ route('admin.subscriptions.update', $item->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group input-name">
                    <label for="name" class="col-form-label">Name</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name', $item->name) }}"
                        id="name">
                    <div class="input-error text-danger">@error('name') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group input-price">
                    <label for="price" class="col-form-label">Price</label>
                    <input class="form-control" type="text" name="price" value="{{ old('price', $item->price) }}"
                        id="price">
                    <div class="input-error text-danger">@error('price') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="duration" class="col-form-label">Duration</label>
                    <select name="duration" id="duration" class="form-control">
                        <option value="">Select Course</option>
                        @foreach ($durations as $duration)
                        <option @selected( in_array($duration->id,explode(',', $item->duration_id)))
                            value="{{ $duration->id }}">{{ $duration->name }}</option>
                        @endforeach
                    </select>
                    <div class="input-error text-danger">@error('duration') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="course" class="col-form-label">Course</label>
                    <select name="course[]" id="course" class="form-control" multiple>
                        <option value="">Select Course</option>
                        @foreach ($courses as $course)
                        <option @selected( in_array($course->id,$selected_courses) )
                            value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    <span class="btn btn-primary mt-4">Add more Courses</span>
                </div>
            </div>
        </div>
        <a class="btn btn-secondary mr-3 float-left" href="{{ route('admin.subscriptions.index') }}">Back to list</a>
        <button class="btn btn-primary edit-item float-right" type='button'>Save changes</button>
    </form>
</div>