@extends('layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Couse</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Couse</p>
                        </div>
                    </div>
                    <div class="buttons">

                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <style>
            #grade .grade-header {
                display: flex;
                justify-content: space-between;
            }

            #grade .grade-header {
                display: flex;
                justify-content: space-between;
            }

            #grade ul li {
                width: 100%;
                background-color: var(--color-main);
                padding: 10px 10px;
                color: #fff;
                display: flex;
                justify-content: space-between;
                margin-bottom: 10px
            }

            .item.dragging {
                opacity: 0.6;
            }

            .item.dragging :where(input) {
                opacity: 0;
                transform: scale(1.05);
            }
            </style>
        </div>
        <div id="grade">
            <div class="card">
                <div class="card-body">
                    <div class="grade-header">
                        <button class="btn btn-primary">Couse</button>
                        <button data-toggle="modal" data-target="#create" class="btn  btn-primary">Create
                            New</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <ul class='bg-light m-1 sortable-list'>
                            @foreach($items as $item)
                            <li id="item-{{ $item->id }}" class="item" draggable="true">
                                <div class="form-group d-flex justify-content-center align-item-center">
                                    <input class="form-control bg-primary courses" type="text"
                                        value="{{ $item->name }}">
                                    <a class="btn delete" data-id="{{ $item->id }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a class="btn">
                                        <i class="fa fa-arrows"></i>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Progress Table end -->
        </div>
        @include('contents.setting.courses.create');
    </div>
</div>
@endsection
@section('footer')
<script>
jQuery(function() {
    jQuery(".sortable-list").sortable({
        update: function(event, ui) {
            var data = $(this).sortable('serialize');

            // POST to server using $.post or $.ajax
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                type: 'POST',
                url: "{{ route('courses.position') }}"
            })
        }
    });
});
$(".delete").click(function(e) {
    e.preventDefault();
    var ele = $(this);
    var id = ele.attr("data-id");
    if (confirm("Are you sure?")) {
        var url = 'courses/' + id;
        $.ajax({
            url: url,
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                window.location.reload();
            }
        });
    }
});
</script>
@endsection