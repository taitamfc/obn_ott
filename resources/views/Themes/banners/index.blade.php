@extends('layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Plan</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Plan</p>
                        </div>
                    </div>
                    <div class="buttons">

                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <style>
            #theme_setting .btn-close {
                right: 10%;
                top: 10%;
                font-size: 25px;
                color: red;
                border: 1px solid red;
                border-radius: 50%;
                padding: 5px;

            }

            #theme_setting .button-control i {
                color: #fff
            }
            </style>
            <div id="theme_setting">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h6>Setting</h6>
                        <a href="#" class="btn btn-primary align-center d-flex " data-toggle="modal"
                            data-target="#modalCreate" style="align-items: center">New banner</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($items as $item)
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body d-flex justify-center align-center" class="position-relative">
                                        <video controls width="100%">
                                            <source src="{{ asset($item->video_url) }}">
                                        </video>
                                        <i class="fa fa-close position-absolute  z-10  btn-close"></i>
                                    </div>
                                    <div class="card-footer">
                                        <h6 class="mt-0 pb-0">Title</h6>
                                        <div class="button-control d-flex justify-content-end">

                                            <a href="javascript:;" data-id="{{ $item->id }}"
                                                data-action="{{ route('banners.update',$item->id) }}"
                                                class="pt-1 pb-1 pl-3 pr-3 bg-danger mr-2 show-form-edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:;"
                                                class="pt-1 pb-1 pl-3 pr-3 bg-warning mr-2 delete-item"
                                                data-id="{{ $item->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <form method="post" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Auth Page Background Image</h6>
                                        </div>

                                        <div class="card-body">
                                            <input type="file" class="form-control" name="auth_page_background_image"
                                                onchange="loadFile(event)">
                                            <img src="{{ asset($settings['auth_page_background_image']) }}" id="output"
                                                width="150px" />
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6>Body Background Color</h6>
                                                    <input type="color" class="form-control"
                                                        name="auth_page_body_background_color"
                                                        value="{{ $settings['auth_page_body_background_color'] }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6>Footer Background Color</h6>
                                                    <input type="color" class="form-control"
                                                        name="auth_page_footer_background_color"
                                                        value="{{ $settings['auth_page_footer_background_color'] }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Plan Page Background Image</h6>
                                        </div>
                                        <div class="card-body">
                                            <input type="file" class="form-control" name="plan_page_background_image"
                                                onchange="loadFile(event)">
                                            <img src="{{ asset($settings['plan_page_background_image']) }}" id="output"
                                                width="150px" />
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6>Body Background Color</h6>
                                                    <input type="color" class="form-control"
                                                        name="plan_page_header_background_color"
                                                        value="{{ $settings['plan_page_header_background_color'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6>Footer Background Color</h6>
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
                                    <button id="saveButton" class="btn btn-primary float-right">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            @include('themes.banners.create')
            @include('themes.banners.edit')

        </div>
    </div>

</div>
@endsection

@section('footer')
<script>
jQuery(document).ready(function() {

    // Xu ly xoa
    jQuery(".delete-item").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        var id = ele.data("id");
        if (confirm("Are you sure?")) {
            var url = 'banners/' + id;
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: "POST",
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    ele.closest('.col-sm-4').remove(); // Xóa phần tử khỏi DOM
                }
            });
        }
    });

    // Xu ly them moi
    jQuery(".add-item").click(function(e) {
        let formCreate = jQuery(this).closest('#formCreate');
        formCreate.find('.input-error').empty();
        var url = formCreate.prop('action');
        let formData = new FormData($('#formCreate')[0]);
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
                        console.log(key);
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
                    showAlertSuccess(res.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1200);
                }

            }
        });
    });

    // Xu ly form edit
    jQuery('.show-form-edit').click(function() {
        // alert(123)
        // Hien thi modal
        jQuery('#modalUpdate').modal('show');

        let formUpdate = jQuery('#formUpdate');

        // Lấy dữ liệu
        let id = jQuery(this).data('id');
        let action = jQuery(this).data('action');

        var url = 'banners/' + id;
        jQuery.ajax({
            url: url,
            type: "GET",
            dataType: 'json',
            success: function(res) {
                if (res.success) {
                    let formData = res.data;
                    console.log('formData:', formData);

                    formUpdate.prop('action', action);

                    formUpdate.find('.input-id').val(formData.id);
                    formUpdate.find('.input-name input').val(formData.name);
                    formUpdate.find('.textarea-description textarea').val(formData
                        .description);
                    formUpdate.find('.input-link input').val(formData.link);

                    // if (formData.img) {
                    //     formUpdate.find('.input-img').attr('src', formData.img);
                    //     formUpdate.find('.input-img').show();
                    // }
                    // if (formData.video_url) {
                    //     formUpdate.find('.input-video source').attr('src', formData.video_url);
                    //     formUpdate.find('.input-video').get(0).load(); 
                    //     formUpdate.find('.input-video').show();
                    // }
                    formUpdate.find('.input-status input').prop('checked', false);
                    if (formData.status) {
                        formUpdate.find('.input-status .input-active').prop('checked',
                            true);
                    } else {
                        formUpdate.find('.input-status .input-inactive').prop('checked',
                            true);
                    }
                }
            }
        });
    })
});
</script>
@endsection