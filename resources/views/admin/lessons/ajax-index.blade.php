<div class="card-body">
    <div class="row">
        <div class="col mb-3">
            <form action="" method="GET" id="form-search">
                <div class="row">
                    <div class="col">
                        <input name="searchLesson" value="{{ request('searchLesson') }}" class="form-control"
                            type="text" placeholder="Lesson..." />
                    </div>
                    <div class="col">
                        <select name="searchGrade" class="form-control">
                            <option value="">Select grade....</option>
                            @foreach($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select name="searchSubject" class="form-control">
                            <option value="">Select subject....</option>
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select name="searchCourse" class="form-control">
                            <option value="">Select course....</option>
                            @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-secondary" type="submit">Tìm Kiếm</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover progress-table">
                <thead class="text-uppercase">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Course</th>
                        <th scope="col">View Count</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="sortable-table ">
                    @foreach($items as $item)
                    <tr class="item draggable" id='item-{{ $item->id}}'>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->getGrade() }}</td>
                        <td>{{ $item->getSubject() }}</td>
                        <td>{{ $item->getCourse() }}</td>
                        <td>{{ $item->lessoncourse_count }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{!! $item->statusDisplay() !!}</td>
                        <td>
                            <ul class="d-flex justify-content-center">
                                <li class="mr-3">
                                    <a href="{{ route('admin.lessons.edit',$item->id) }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" class="btn btn-danger delete-item" data-id="{{ $item->id }}"
                                        data-action="{{ route('admin.lessons.destroy',$item->id) }}">
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
</div>