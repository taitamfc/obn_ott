<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover progress-table">
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
                                <a href="{{ route('lessons.edit',$item->id) }}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="btn btn-danger delete-item"
                                data-id="{{ $item->id }}" data-action="{{ route('lessons.destroy',$item->id) }}">
                                    <i class="ti-trash"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer">
{{ $items->appends(request()->query())->links() }}
</div>