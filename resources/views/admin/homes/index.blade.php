@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.home') }}
@endsection
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner">
        @include('admin.homes.includes.report')
        <div class="row mt-3 p-3">
            <div class="col-lg-12 bg-white">
                <div id='calendar' class="pt-3 pb-3"></div>
            </div>
        </div>
    </div>
</div>
@include('admin.homes.includes.modal-event')
@endsection
@section('footer')
<!-- Calendar Init -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
    integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="{{ asset('assets/js/init/full-calendar.js') }}"></script>
<script>
jQuery(document).ready(function() {

    $('#dataTable').DataTable({
        paging: false,
        searching: false,
        info: false
    });
    var SITEURL = "{{ route('admin.home') }}";
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Calendar
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: SITEURL, // Đảm bảo rằng SITEURL là một URL hợp lệ hoặc thay thế bằng một mảng các sự kiện
        displayEventTime: true,
        selectable: true,
        selectHelper: true,
        eventRender: function(event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        select: function(start, end, allDay) {
            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
            jQuery('#modalEvent').modal('show');
            jQuery('#modalEvent').find('#ev-start').val(start);
            jQuery('#modalEvent').find('#ev-end').val(end);
        },
        eventDrop: function(event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            jQuery.ajax({
                url: "{{ route('admin.fullcalendar.update') }}",
                data: {
                    'title': event.title,
                    'start': start,
                    'end': end,
                    'id': event.id
                },
                type: "POST",
                success: function(response) {
                    showAlertSuccess('Updated Success');
                }
            });
        },
        eventClick: function(event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                jQuery.ajax({
                    type: "POST",
                    url: "{{ route('admin.fullcalendar.destroy') }}",
                    data: {
                        'id': event.id
                    },
                    success: function(response) {
                        if (parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            showAlertSuccess('Deleted Success');
                        }
                    }
                });
            }
        },
    });

    jQuery('#save-event').on('click', function() {
        let formEvent = jQuery(this).closest('#formEvent');
        formEvent.find('.input-error').empty();
        var url = formEvent.prop('action');
        let formData = new FormData($('#formEvent')[0]);
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            type: "POST",
            dataType: 'json',
            success: function(res) {
                if (res.has_errors) {
                    for (const key in res.errors) {
                        console.log(key);
                        jQuery('.input-' + key).find('.input-error').html(res
                            .errors[key][
                                0
                            ]);
                    }
                    showAlertError('Has Problems, Please Try Again!');
                }
                if (res.success) {
                    jQuery('#modalEvent').modal('hide');
                    showAlertSuccess(res.message);
                    // $('#calendar').fullCalendar('renderEvent', {
                    //         title: jQuery('#ev-title').val(),
                    //         start: jQuery('#ev-start').val(),
                    //         end: jQuery('#ev-end').val(),
                    //         allDay: true
                    //     },
                    //     true
                    // );
                    setTimeout(() => {
                        window.location.reload(); // Làm mới trang sau 1 giây
                    }, 1000);
                }

            }
        });
    });
});
</script>
@endsection