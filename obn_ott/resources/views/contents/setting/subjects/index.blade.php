@extends('layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Subject</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Subject</p>
                        </div>
                    </div>
                    <div class="buttons">

                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">

        </div>
        <div id="grade">
            <div class="card">
                <div class="card-body">
                    <div class="grade-header">
                        <button class="btn btn-primary">Subject</button>
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
                            <li id='item-{{ $item->id}}' class='item' draggable='true'>
                                <div class="form-group d-flex justify-content-center align-item-center">
                                    <input class="form-control bg-primary" type="text" value="{{ $item->name }}">
                                    <form action="{{ route('subjects.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type='submit' class='btn'>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="" class='btn'>
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
       @include('contents.setting.subjects.create')
    </div>
</div>
@endsection
@section('footer')
<script>
jQuery(function() {
    jQuery(".sortable-list").sortable({
        update: function(event, ui) {
            var data = $(this).sortable('serialize');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                type: 'POST',
                url: "{{ route('subjects.position') }}"
            });
        }
    });
});
</script>
@endsection