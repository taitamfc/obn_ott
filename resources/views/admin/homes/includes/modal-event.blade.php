<div class="modal fade" id="modalEvent" style="display: none;" aria-hidden="true">
    <form id="formEvent" action="{{ route('admin.fullcalendar.store') }}" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <input type="hidden" name="id" id="input-id">
            <input type="hidden" name="start" id="ev-start">
            <input type="hidden" name="end" id="ev-end">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('home.add-event')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group input-title">
                        <label for="title" class="col-form-label">{{__('home.title')}}</label>
                        <input class="form-control" type="text" id="ev-title" name='title'>
                        <div class="input-error text-danger">@error('title') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group input-description">
                        <label for="description" class="col-form-label">{{__('home.content')}}</label>

                        <textarea class="form-control" type="text" name='content' id="ev-content"></textarea>
                        <div class="input-error text-danger">@error('content') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group input-course_id">
                        <label for="description" class="col-form-label">{{__('home.class')}}</label>
                        <select class="form-control" name="course_id" id="ev-course_id">
                            <option value=""> All Classes </option>
                            @foreach( $courses as $course )
                            <option value="{{ $course->id }}"> {{ $course->name }} </option>
                            @endforeach
                        </select>
                        <!-- <div class="input-error text-danger">@error('name') {{ $message }} @enderror</div> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="save-event" class="btn btn-primary" type='button'>{{__('sys.save-changes')}}</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{__('sys.close')}}</button>
                </div>
            </div>
        </div>
    </form>
</div>