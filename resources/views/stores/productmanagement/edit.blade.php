<div class="modal fade" id="modalUpdate" style="display: none;" aria-hidden="true">
    <form id="formUpdate" action="" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <input type="hidden" name="id" id="input-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group input-price">
                        <label for="price" class="col-form-label">Price</label>
                        <input class="form-control" type="text" id="price" name="price">
                        <div class="input-error text-danger">@error('price') {{ $message }} @enderror</div>
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
@section('footer')
<script>
jQuery(document).ready(function() {
    // Xu ly them moi
    jQuery(".edit-item").click(function(e) {
        let formUpdate = jQuery(this).closest('#formUpdate');
        formUpdate.find('.input-error').empty();
        var url = formUpdate.prop('action');
        let formData = new FormData($('#formUpdate')[0]);
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: function(res) {
                if (res.has_errors) {
                    for (const key in res.errors) {
                        jQuery('.input-' + key).find('.input-error').html(res.errors[key][
                            0
                        ]);
                    }
                }
                if (res.success) {
                    window.location.reload();
                }
            }
        });
    });
    jQuery('.show-form-edit').click(function() {
        // Hien thi modal
        jQuery('#modalUpdate').modal('show');

        let formUpdate = jQuery('#formUpdate');

        // Lấy dữ liệu
        let id = jQuery(this).data('id');
        let action = jQuery(this).data('action');
        var url = '/courses/' + id;
        jQuery.ajax({
            url: url,
            type: "GET",
            dataType: 'json',
            success: function(res) {
                if (res.success) {
                    let formData = res.data;
                    formUpdate.prop('action', action);
                    formUpdate.find('.input-price input').val(formData.price);
                    formUpdate.find('#input-id').val(formData.id);
                }
            }
        });
    })
});
</script>
@endsection