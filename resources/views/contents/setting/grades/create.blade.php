<div class="modal fade" id="create" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('grades.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="col-form-label">Title</label>
                        <input class="form-control" type="text" id="title" name='name'>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="banner" class="col-form-label">Banner</label>
                        <input class="form-control" type="file" name='image' id="banner">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Status</label>
                        <div style="display: flex">
                            <div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
                                <input type="radio" checked="" id="active" name="status" class="custom-control-input"
                                    value='active'>
                                <label class="custom-control-label" for="active">Active</label>
                            </div>
                            <div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
                                <input type="radio" checked="" id="inactive" name="status" class="custom-control-input"
                                    value='inactive'>
                                <label class="custom-control-label" for="inactive">Inactive</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type='submit'>Save changes</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>