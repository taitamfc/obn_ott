@extends('layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
			<div class="col-md-12">
				<div class="d-flex justify-content-between flex-wrap">
					<div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
						<h5 class="mr-4 mb-0 font-weight-bold">My Lessons</h5>
					</div>
					<div class="buttons d-flex">
						<a class="btn btn-dark mr-1" href="{{ route('home') }}">{{ __('sys.back') }}</a>
						<a href="{{ route('lessons.create') }}" class="btn btn-primary">
							{{ __('sys.add_new') }}
                        </a>
					</div>
				</div>
			</div>
		</div>

        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover progress-table text-center ">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Grade</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="sortable-table ">
                                    @foreach($items as $item)
                                    <tr class="item draggable" id='item-{{ $item->id}}'>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        @php
                                        $gradeName = isset($item->grade->name) ? $item->grade->name : '';
                                        $subjectName = isset($item->subject->name) ? $item->subject->name : '';
                                        $courseName = isset($item->course->name) ? $item->course->name : '';
                                        @endphp
                                        <td>{{ $gradeName }}</td>
                                        <td>{{ $subjectName }}</td>
                                        <td>{{ $courseName }}</td>
                                        <td>{!! $item->statusDisplay() !!}</td>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3">
                                                    <a href="{{ route('lessons.edit',$item->id) }}"
                                                        class="text-primary upload-item">
                                                        <i class="fa fa-edit"></i>
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
            <!-- Progress Table end -->
        </div>
    </div>
</div>

@endsection
@section('footer')
<script>
jQuery(function() {
    jQuery(".sortable-table").sortable({
        update: function(event, ui) {
            var data = $(this).sortable('serialize');
            // POST to server using $.post or $.ajax
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                type: 'POST',
                url: "{{ route('lessons.position') }}"
            })
        }
    });
});
$(".delete-item").click(function(e) {
    e.preventDefault();
    var ele = $(this);
    var id = ele.data("id");
    if (confirm("Are you sure?")) {
        var url = 'lessons/' + id;
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