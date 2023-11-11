@extends('layouts.master')
@section('header')
<style>
select.form-control:not([size]):not([multiple]) {
    height: auto;
}
</style>
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Class</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Class</p>
                        </div>
                    </div>
                    <div class="buttons">

                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <div id="class">
                <div class="row">
                    <a class="btn btn-secondary mt-4 ml-3" href="{{ route('classes.index') }}">Back to list</a>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-left ">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Student ID</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Course</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($items as $item)
                                                <tr class="item" id='item-{{ $item->id}}'>
                                                    <th scope="row">{{ $item->id }}</th>
                                                    <td>{{ isset($item->student)? $item->student->name : '' }}</td>
                                                    <td>{{ isset($item->student)? $item->student->code : '' }}</td>
                                                    <td>{{ isset($item->student)? $item->student->email : '' }}</td>
                                                    <td>{{ isset($item->course)? $item->course->name : '' }}</td>
                                                    <td>{{ isset($item->student)? $item->student->created_at : '' }}
                                                    </td>
                                                    <td>{!! isset($item->student)? $item->statusDisplay() : '' !!}</td>
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3">
                                                                <a href="{{ route('classes.show',$item->id) }}"><i
                                                                        class="ti-eye"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;" class="text-danger delete-item"
                                                                    data-id="{{ $item->id }}">
                                                                    <i class="ti-trash"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="pagination" style="float:right">
                                            {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
$(".delete-item").click(function(e) {
    e.preventDefault();
    var ele = $(this);
    var id = ele.data("id");
    if (confirm("Are you sure?")) {
        var url = '/classes/' + id;
        $.ajax({
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
                window.location.reload(); // Xóa phần tử khỏi DOM
            }
        });
    }
});
</script>
@endsection