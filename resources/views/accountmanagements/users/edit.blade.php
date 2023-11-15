<div class="modal fade" id="modalUpdate" style="display: none;" aria-hidden="true">
    <form id="formUpdate" action="" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="input-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">

                    <div class="form-group input-name">
                        <label for="name" class="col-form-label">Name</label>
                        <input class="form-control" type="text" id="name" name='name'>
                        <div class="input-error text-danger">@error('name') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group input-email">
                        <label for="email" class="col-form-label">Email</label>
                        <input class="form-control" type="text" id="email" name='email'>
                        <div class="input-error text-danger">@error('email') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group input-password">
                        <label for="password" class="col-form-label">Password</label>
                        <input class="form-control" type="password" id="password" name='password'>
                        <div class="input-error text-danger">@error('password') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group input-group_id">
                        <label for="group_id" class="col-form-label">Account Type</label>
                        <select class="form-control" id="group_id" name='group_id'>
                            <option value="" selected disabled>Select Account Type</option>
                            @foreach($groups as $group)
                            <option value="{{ $group->id }}" >{{ $group->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-error text-danger">@error('group_id') {{ $message }} @enderror</div>
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