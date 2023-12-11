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
                <div class="form-group input-duration">
                    <label for="duration" class="col-form-label">Duration <span>*</span></label>
                    <select name="duration" id="duration" class="form-control">
                        <option value="">Select Duration</option>
                        @foreach ($durations as $id => $durationName)
                        <option value="{{ $id }}">{{ $durationName }}</option>
                        @endforeach
                    </select>
                    <div class="input-error text-danger">@error('duration') {{ $message }} @enderror</div>
                   
                    <!-- <div class="buttons d-flex" style="margin-top: 20px">
                        <button data-toggle="modal" data-target="#modalCreate" class="btn btn-primary">
                            Add more Duration
                        </button>
                    </div> -->

                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group input-course">
                    <label for="course" class="col-form-label">Course <span>*</span></label>
                    <select name="course[]" id="course" class="form-control" multiple>
                        @foreach ($courses as $id => $courseName)
                        <option value="{{ $id }}">{{ $courseName }}</option>
                        @endforeach
                    </select>
                    <div class="input-error text-danger">@error('courses') {{ $message }} @enderror
                    </div>
                    <a href="#" class="btn btn-primary mt-4">Add more Courses</a>
                </div>
            </div>
        </div>
        <button class="btn btn-primary add-item float-right" type='button'>Save changes</button>
    </form>
</div>