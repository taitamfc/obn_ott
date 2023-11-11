<div class="modal fade" id="modalCreate" style="display: none;" aria-hidden="true">
    <form id="formCreate" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
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
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-error text-danger">@error('group_id') {{ $message }} @enderror</div>
                    </div>


                    <div class="form-group input-parent_id">
                        <label for="parent_id" class="col-form-label">Parent</label>
                        <input class="form-control" type="text" id="parent_id" name='parent_id'>
                        <div class="input-error text-danger">@error('parent_id') {{ $message }} @enderror</div>
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