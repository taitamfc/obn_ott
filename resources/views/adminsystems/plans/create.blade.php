<div class="modal fade" id="modalCreate" style="display: none;" aria-hidden="true">
    <form id="formCreate" action="{{ route('plans.store') }}" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Plan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">

                    <div class="form-group input-name">
                        <label for="name" class="col-form-label">Plan Name (*)</label>
                        <input class="form-control" type="text" id="name" name='name'>
                        <div class="input-error text-danger">@error('name') {{ $message }} @enderror</div>
                    </div>


                    <div class="form-group input-price">
                        <label for="price" class="col-form-label">Price (*)</label>
                        <input class="form-control" type="number" id="price" name='price'>
                        <div class="input-error text-danger">
                            @error('price')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group input-number_course">
                        <label for="number_course" class="col-form-label">Number Courses (*)</label>
                        <input class="form-control" type="number" id="number_course" name='number_course'>
                        <div class="input-error text-danger">@error('number_course') {{ $message }} @enderror
                        </div>
                    </div>

                    <div class="form-group input-number_admin">
                        <label for="number_admin" class="col-form-label">Number Admin (*)</label>
                        <input class="form-control" type="number" id="number_admin" name='number_admin'>
                        <div class="input-error text-danger">@error('number_admin') {{ $message }} @enderror
                        </div>
                    </div>

                    <div class="form-group input-description">
                        <label for="description" class="col-form-label">Description (*)</label>
                        <textarea class="form-control" id="description" name='description'></textarea>
                        <div class="input-error text-danger">
                            @error('description')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <!-- <div class="form-group input-price form-check">
                        <input class="form-check-input" type="checkbox" id="contactByEmail" name="is_contact">
                        <label class="form-check-label" for="contactByEmail">Enable Contact By Email</label>
                        <div class="input-error text-danger">
                            @error('is_contact')
                            {{ $message }}
                            @enderror
                        </div>
                    </div> -->
                    <div class="form-group input-is_contact">
                        <label for="is_contact" class="col-form-label">Enable Contact By Email</label>
                        <div style="display: flex">
                            <div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
                                <input type="radio" checked id="c-active" name="is_contact"
                                    class="custom-control-input input-active" value='1'>
                                <label class="custom-control-label" for="c-active">Active</label>
                            </div>
                            <div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
                                <input type="radio" id="c-inactive" name="is_contact"
                                    class="custom-control-input input-inactive" value='0'>
                                <label class="custom-control-label" for="c-inactive">Inactive</label>
                            </div>
                        </div>
                    </div>


                    

                    <!-- <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group input-number_days">
                                <label for="number_days" class="col-form-label">Number Days</label>
                                <input class="form-control" type="number" id="number_days" name='number_days'>
                                <div class="input-error text-danger">@error('number_days') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-number_lesson">
                                <label for="number_lesson" class="col-form-label">Number Lessons</label>
                                <input class="form-control" type="number" id="number_lesson" name='number_lesson'>
                                <div class="input-error text-danger">@error('number_lesson') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group input-number_course">
                                <label for="number_course" class="col-form-label">Number Courses</label>
                                <input class="form-control" type="number" id="number_course" name='number_course'>
                                <div class="input-error text-danger">@error('number_course') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-number_student">
                                <label for="number_student" class="col-form-label">Number Student</label>
                                <input class="form-control" type="number" id="number_student" name='number_student'>
                                <div class="input-error text-danger">@error('number_student') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group input-number_grade">
                                <label for="number_grade" class="col-form-label">Number Grades</label>
                                <input class="form-control" type="number" id="number_grade" name='number_grade'>
                                <div class="input-error text-danger">@error('number_grade') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-number_subject">
                                <label for="number_subject" class="col-form-label">Number Subjects</label>
                                <input class="form-control" type="number" id="number_subject" name='number_subject'>
                                <div class="input-error text-danger">@error('number_subject') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary add-item" type='button'>{{ __('sys.save-changes') }}</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('sys.close') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
