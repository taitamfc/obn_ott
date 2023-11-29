@extends('admin.layouts.master')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
@endsection
@section('content')
<div class="main-content page-content">
    @include('admin.homes.report')
    <div class="row">
        <div class="col-lg-12 m-3">
            <div class="container">
                <div class="response"></div>
                <div id='calendar' class="bg-white p-3"></div>
            </div>
        </div>
    </div>
    @include('admin.homes.question')
</div>
@endsection
@section('footer')
<!-- Sort Table -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
    var SITEURL = "{{url('/')}}";
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Calendar
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: SITEURL,
        displayEventTime: true,
        editable: true,
        eventRender: function(event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                jQuery.ajax({
                    url: SITEURL + "/fullcalendar/create",
                    data: {
                        'title': title,
                        'start': start,
                        'end': end
                    },
                    type: "POST",
                    success: function(data) {
                        showAlertSuccess('Added Success');
                    }
                });
                calendar.fullCalendar('renderEvent', {
                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay
                    },
                    true
                );
            }
            calendar.fullCalendar('unselect');
        },

        eventDrop: function(event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            jQuery.ajax({
                url: SITEURL + '/fullcalendar/update',
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
                    url: SITEURL + '/fullcalendar/delete',
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
                calendar.fullCalendar('renderEvent', {
                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay
                    },
                    true
                );
            }
        }

    });
});
</script>
@endsection