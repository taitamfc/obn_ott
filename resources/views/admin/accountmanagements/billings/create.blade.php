<div class="modal fade" id="modalCreate" style="display: none;" aria-hidden="true">
    <form id="formCreate" action="{{ route('admin.userbank.store') }}" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('admin-account.enter-new-credit-card-info')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">


                    <div class="form-group input-bank_number">
                        <label for="bank_number" class="col-form-label">{{__('admin-account.credit-card-number')}}<span>*</span></label>
                        <input class="form-control" type="text" id="bank_number" name='bank_number'>
                        <div class="input-error text-danger">@error('bank_number') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group input-bank_owner">
                        <label for="bank_owner" class="col-form-label">{{__('admin-account.bank-owner')}} <span>*</span></label>
                        <input class="form-control" type="text" id="bank_owner" name='bank_owner'>
                        <div class="input-error text-danger">@error('bank_owner') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group input-bank_name">
                        <label for="bank_name" class="col-form-label">{{__('admin-account.bank-name')}} <span>*</span></label>
                        <input class="form-control" type="text" id="bank_name" name='bank_name'>
                        <div class="input-error text-danger">@error('bank_name') {{ $message }} @enderror</div>
                    </div>

                    <div class="form-group input-address">
                        <label for="address" class="col-form-label">{{__('admin-account.street-address')}}<span>*</span></label>
                        <input class="form-control" type="text" id="address" name='address'>
                        <div class="input-error text-danger">@error('address') {{ $message }} @enderror</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary add-item" type='button'>{{__('sys.save-changes')}}</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{__('sys.close')}}</button>
                </div>
            </div>
        </div>
    </form>
</div>