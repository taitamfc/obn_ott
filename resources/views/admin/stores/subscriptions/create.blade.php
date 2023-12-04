<div class="card-body">
    <form id="formCreate" action="{{ route('admin.subscriptions.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group input-name">
                    <label for="name" class="col-form-label">Name <span>*</span></label>
                    <input class="form-control" type="text" name="name" value="" id="name">
                    <div class="input-error text-danger">@error('name') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group input-price">
                    <label for="price" class="col-form-label">Price <span>*</span></label>
                    <input class="form-control" type="text" name="price" value="" id="price">
                    <div class="input-error text-danger">@error('price') {{ $message }} @enderror
                    </div>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="duration" class="col-form-label">Duration <span>*</span></label>
                    <select name="duration" id="duration" class="form-control">
                        <option value="Month">Month</option>
                        <option value="Year">Year</option>
                    </select>
                    <div class="input-error text-danger">@error('duration') {{ $message }} @enderror
                    </div>
                    <div class="input-error text-danger">@error('course') {{ $message }} @enderror</div>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="course" class="col-form-label">Course <span>*</span></label>
                    <select name="course[]" id="course" class="form-control" multiple>
                        <option value="">Select Course</option>
                        @foreach ($courses as $id => $courseName)
                        <option value="{{ $id }}">{{ $courseName }}</option>
                        @endforeach
                    </select>
                    <div class="input-error text-danger">@error('course') {{ $message }} @enderror
                    </div>
                    <a href="#" class="btn btn-primary mt-4">Add more Courses</a>
                </div>
            </div>

            <button class="btn btn-primary add-item" type='button'>Save changes</button>
        </div>
    </form>
</div>