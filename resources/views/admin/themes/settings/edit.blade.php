<form method="post" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="row mt-4">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h6>{{__('admin-themes.auth-page-background-image')}}</h6>
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="auth_page_background_image"
                                onchange="loadFile(event)">
                            <img src="{{ asset($settings['auth_page_background_image']) }}" id="output" width="150px" />
                            <div class="input-error text-danger">@error('auth_page_background_image') {{ $message }}
                                @enderror</div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6>{{__('admin-themes.body-background-color')}}</h6>
                                    <input type="color" class="form-control" name="auth_page_body_background_color"
                                        value="{{ $settings['auth_page_body_background_color'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6>{{__('admin-themes.footer-background-color')}}</h6>
                                    <input type="color" class="form-control" name="auth_page_footer_background_color"
                                        value="{{ $settings['auth_page_footer_background_color'] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h6>{{__('admin-themes.plan-page-background-image')}}</h6>
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="plan_page_background_image"
                                onchange="loadFile(event)">
                            <img src="{{ asset($settings['plan_page_background_image']) }}" id="output" width="150px" />
                            <div class="input-error text-danger">@error('plan_page_background_image') {{ $message }}
                                @enderror</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6>{{__('admin-themes.body-background-color')}}</h6>
                                    <input type="color" class="form-control" name="plan_page_header_background_color"
                                        value="{{ $settings['plan_page_header_background_color'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6>{{__('admin-themes.footer-background-color')}}</h6>
                                    <input type="color" class="form-control"
                                        name="plan_page_event_section_background_color"
                                        value="{{ $settings['plan_page_event_section_background_color'] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-4 ">
                <div class="col-sm-12">
                    <button id="saveButton" class="btn btn-primary float-right">{{__('admin-themes.save')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>