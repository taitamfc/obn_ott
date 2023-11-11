<div class="modal fade" id="modalCreate" style="display: none;" aria-hidden="true">
    <form id="formCreate" action="{{ route('groups.store') }}" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">

                    <div class="form-group input-name">
                        <label for="name" class="col-form-label">Name</label>
                        <input class="form-control" type="text" id="name" name='name'>
                        <div class="input-error text-danger">@error('name') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group">
                        <label for="role" class="col-form-label">Role</label>
                        @foreach ($roles as $role)
                        <div class="custom-control custom-checkbox primary-checkbox">
                            <input name="role_ids[]" value="{{ $role->id }}" type="checkbox" @checked(
                                in_array($role->id,$selected_roles) ) class="custom-control-input"
                            id="c-role-{{ $role->id }}">
                            <label class="custom-control-label" for="c-role-{{ $role->id }}">{{ $role->name }}</label>
                        </div>
                        @endforeach
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary add-item" type='button'>Save changes</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>