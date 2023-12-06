<div class="modal fade" id="modalEvent" style="display: none;" aria-hidden="true">
    <form id="formEvent" action="" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="input-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add event</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group input-title">
                        <label for="title" class="col-form-label">Title</label>
                        <input class="form-control" type="text" id="title" name='question' >
                    </div>
                    <div class="form-group input-description">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" type="text" name='description' id="description"></textarea>
                    </div>
                    <div class="form-group input-course_id">
                        <label for="description" class="col-form-label">Class</label>
                        <select class="form-control" name="course_id">
                            <option value=""> All Classes </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary edit-item" type='button'>Save changes</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>