<div class="modal fade" id="modalUpdate" style="display: none;" aria-hidden="true">
    <form id="formUpdate" action="" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="input-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('admin-question.question')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group input-question-update">
                        <label for="price" class="col-form-label">{{__('admin-question.question')}}</label>
                        <input class="form-control" type="text" id="question" name='question' disabled>
                    </div>
                    <div class="form-group input-answer-update">
                        <label for="answer" class="col-form-label">Answer</label>
                        <textarea class="form-control" type="text" name='answer' id="answer"></textarea>
                        <div class="input-error text-danger">@error('answer') {{ $message }} @enderror</div>
                        <img src="" class="input-img-update" alt="" style="display:none;">
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
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('answer');
</script>